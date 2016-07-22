<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use App\Admin;
use App\User;

class Service extends Controller
{


    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getModerators(Request $request)
    {
        if (Auth::guard()->) {

        }
        $user = Auth::guard('admin')->user();
        return view('admin.home', ['user' => $user]);
    }

    public function moderators()
    {
        $moderators = Admin::all();
        return view('admin.moderators', ['moderators' => $moderators]);
    }

    public function moderatorsAdd()
    {
        return view('admin.home');
    }

    public function moderatorsEdit()
    {
        return view('admin.home');
    }

    public function clients()
    {
        return view('admin.home');
    }
}