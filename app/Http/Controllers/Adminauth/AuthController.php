<?php

namespace App\Http\Controllers\Adminauth;

use App;
use App\Office;
use App\Admin;
use Validator;
use JsValidator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new admins, as well as the
    | authentication of existing admins. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect admins after login / registration.
     *
     * @var string
     */

    protected $redirectTo = '/administration';
    protected $guard = 'admin';

    public function moderators($id = null)
    {
        if (empty($id)) {
            $moderators = Admin::all();
        } else {
            $moderators = Admin::where('id', $id)->get();
        }

        $result = [];
        $role     = Admin::getRoleTable();
        $roleForm = Admin::getRole();
        $status   = Admin::getStatus();
        $offices  = Office::select('id', 'city')->get();

        $addValidator = JsValidator::make([
                'username' => 'required|string|min:3',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|min:6',
            ],
            [],
            [],
            "#form-add-moderator"
        );

        foreach ($moderators as $moderator) {
            $moderator->roleId   = $moderator->role;
            $moderator->office   = json_decode($moderator->office->city, true)[App::getLocale()];
            $moderator->role     = $role[$moderator->role];
            $moderator->statusId = $moderator->status;
            $moderator->status   = empty($moderator->status) ? '<i class="text-danger">(нет данных)</i>' : $status[$moderator->status];
            $moderator->activity = empty($moderator->activity) ? '<i class="text-danger">(нет данных)</i>' : date('H:i d-m-Y', +$moderator->activity);
            $moderator->date_created = date('d-m-Y', $moderator->created_at->getTimestamp());

            $result[] = $moderator;
        }

        return view('backend.admin.moderators', [
            'moderators'   => $result,
            'status'       => $status,
            'addValidator' => $addValidator,
            'roleForm'     => $roleForm,
            'role'         => $role,
            'offices'      => $offices,
        ]);
    }

    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/administration');
        }

        $validator = JsValidator::make([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        return view('backend.admin.login', ['validator' => $validator]);
    }


    public function logined(Request $request)
    {
        $this->validateLogin($request);

        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    // регал админа
    // public function showRegistrationForm()
    // {
    //     return view('auth.register');
    // }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/administration/login');
    }

    // обязательные методы для стнадарной авторизации!!!
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins,email',
            'role' => 'required_with:Moderator,SeniorModerator',
            'status' => 'required_with:10,1,0',
            'password' => 'required|min:6',
        ]);
    }

    // обязательные методы для стнадарной авторизации!!!
    protected function create(array $data)
    {
        return Admin::create([
            'role' => $data['role'],
            'office_id' => $data['office_id'],
            'username' => $data['username'],
            'status' => $data['status'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function createModerator(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());

            $this->throwValidationException(
                $request, $validator
            );
        }

        if ($this->create($request->all())) {
            session()->flash('success', 'Новый менеджер успешно добавлен.');
        } else {
            session()->flash('error', 'Возникла ошибка при добавлении нового менеджера.');
        }

        return redirect(url()->previous());
    }

    public function editModerator(Request $request)
    {
        $id = $request->input('edit_id');
        $data = $request->all();

        $validator = Validator::make($data, [
                        'edit_id' => 'exists:admins,id',
                        'edit_username' => 'required|max:255',
                        'edit_email' => 'required|email|max:255|unique:admins,email,'.$id,
                        'edit_role' => 'required_with:Moderator,SeniorModerator',
                        'edit_status' => 'required_with:10,1,0',
                    ]);

        if ($validator->fails()) {
            session()->flash('error', 'Возникла ошибка при обновлении данных менеджера.');

            $this->throwValidationException(
                $request, $validator
            );
        }

        $admin = Admin::find($id);
        if ($admin->role != Admin::ROLE_ADMIN) {
            $admin->role = $data['edit_role'];
        }
        $admin->office_id = $data['edit_office_id'];
        $admin->username = $data['edit_username'];
        $admin->status = $data['edit_status'];
        $admin->email = $data['edit_email'];
        if (!empty($data['edit_password'])) {
            $admin->password = bcrypt($data['edit_password']);
        }

        if ($admin->save()) {
            session()->flash('success', 'Данные менеджера успешно обновлены.');
        } else {
            session()->flash('error', 'Возникла ошибка при обновлении данных менеджера.');
        }

        return redirect(url()->previous());
    }

    public function deleteModerator(Request $request)
    {
        if (Admin::destroy($request->input('id'))) {
            session()->flash('success', 'Менеджер успешно удален.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении менеджера.');
        }

        return redirect(url()->previous());
    }
}
