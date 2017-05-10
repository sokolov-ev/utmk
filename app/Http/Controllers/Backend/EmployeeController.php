<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use App\Admin;
use App\Office;
use App\Contacts;

class EmployeeController extends Controller
{
    public function view(Request $request)
    {
        $id = $request->query('id');
        $isAdmin  = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;

        if (empty($id)) {
            $user = Auth::guard('admin')->user();
        } elseif ($isAdmin) {
            $user = Admin::findOrFail($id);
        }

        $office   = Office::parseData($user->office_id);

        return view('backend.admin.home', [
            'office'   => $office,
            'user'     => $user,
            'isAdmin'  => $isAdmin,
        ]);
    }
}