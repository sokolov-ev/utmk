<?php

namespace App\Http\Controllers\Adminauth;

use App\Admin;
use Validator;
use JsValidator;
use App\Http\Controllers\Controller;
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

    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }

        $validator = JsValidator::make([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        return view('admin.login', ['validator' => $validator]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/administration/login');
    }

    // обязательные методы!!!
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Admin::create([
            'role' => 'Admin',
            'region' => 1,
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
