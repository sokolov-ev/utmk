<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use App\Admin;
use App\User;

class ServiceController extends Controller
{
    public function getModerators()
    {
        $result = [];
        $moderators = Admin::all();

        foreach ($moderators as $key => $moderator) {
            $moderator->buttons  = '<button class="btn btn-danger btn-sm pull-right clearfix" data-target=".delete-moderator" data-toggle="modal" type="button" data-id="';
            $moderator->buttons .= $moderator->id.'"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';

            $moderator->buttons .= '<button class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>';
            $moderator->activity = date('H:i d-m-Y', +$moderator->activity);
            $moderator->date_created = date('d-m-Y', $moderator->created_at->getTimestamp());
            $result[] = $moderator;
        }

        return '{"data":'.json_encode($result, JSON_UNESCAPED_UNICODE).'}';
    }

    // public function moderators()
    // {
    //     $moderators = Admin::all();
    //     return view('admin.moderators', ['moderators' => $moderators]);
    // }

    // public function moderatorsAdd()
    // {
    //     return view('admin.home');
    // }

    // public function moderatorsEdit()
    // {
    //     return view('admin.home');
    // }

    // public function clients()
    // {
    //     return view('admin.home');
    // }
}