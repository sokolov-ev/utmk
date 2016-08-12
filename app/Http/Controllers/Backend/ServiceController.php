<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use App\Admin;
use App\User;

class ServiceController extends Controller
{
    // отключил AJAX загрузку списка модераторов
    // public function getModerators()
    // {
    //     $result = [];
    //     $role = Admin::getRoleTable();
    //     $status = Admin::getStatus();
    //     $moderators = Admin::all();

    //     foreach ($moderators as $key => $moderator) {
    //         $moderator->buttons  = '
    //             <button class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>
    //             <button class="btn btn-danger btn-sm"
    //                     data-target=".delete-moderator"
    //                     data-toggle="modal"
    //                     data-id="'.$moderator->id.'"
    //                     data-name="'.$moderator->username.'">
    //                 <i class="fa fa-trash-o" aria-hidden="true"></i>
    //             </button>';
    //         $moderator->role = $role[$moderator->role];
    //         $moderator->status = empty($moderator->status) ? '<i class="text-danger">(нет данных)</i>' : $status[$moderator->status];
    //         $moderator->activity = empty($moderator->activity) ? '<i class="text-danger">(нет данных)</i>' : date('H:i d-m-Y', +$moderator->activity);
    //         $moderator->date_created = date('d-m-Y', $moderator->created_at->getTimestamp());
    //         $result[] = $moderator;
    //     }

    //     return '{"data":'.json_encode($result, JSON_UNESCAPED_UNICODE).'}';
    // }
}