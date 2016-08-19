<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App;
use Auth;
use JsValidator;
use App\Admin;
use App\User;
use App\Office;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function view()
    {
        $user = Auth::guard('admin')->user();
        return view('backend.admin.home', ['user' => $user]);
    }

    public function moderators()
    {
        $result = [];
        $moderators = Admin::all();
        $role = Admin::getRoleTable();
        $roleForm = Admin::getRole();
        $status = Admin::getStatus();
        $offices = Office::getOffices();

        $addValidator = JsValidator::make(
                            [
                                'username' => 'required|string|min:3',
                                'email' => 'required|email|unique:admins,email',
                                'password' => 'required|min:6',
                            ],
                            [],
                            [],
                            "#form-add-moderator"
                        );

        foreach ($moderators as $moderator) {
            $moderator->roleId = $moderator->role;
            $moderator->office = json_decode($moderator->office->city, true)[App::getLocale()];
            $moderator->role = $role[$moderator->role];
            $moderator->statusId = $moderator->status;
            $moderator->status = empty($moderator->status) ? '<i class="text-danger">(нет данных)</i>' : $status[$moderator->status];
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

    public function clients()
    {
        $clients = User::all();

        return view('backend.admin.clients', [
            'clients' => $clients
        ]);
    }

}