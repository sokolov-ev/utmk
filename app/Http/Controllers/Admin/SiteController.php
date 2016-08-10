<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use App\Admin;
use App\User;
use JsValidator;

class SiteController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin');
    }

    public function editMenu()
    {
        return view('site.menu');
    }

}