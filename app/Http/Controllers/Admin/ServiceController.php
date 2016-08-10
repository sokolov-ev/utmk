<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use App\Admin;
use App\User;
use App\Menu;

class ServiceController extends Controller
{
    public function getModerators()
    {
        $result = [];
        $role = Admin::getRoleTable();
        $status = Admin::getStatus();
        $moderators = Admin::all();

        foreach ($moderators as $key => $moderator) {
            $moderator->buttons  = '
                <button class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm"
                        data-target=".delete-moderator"
                        data-toggle="modal"
                        data-id="'.$moderator->id.'"
                        data-name="'.$moderator->username.'">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>';
            $moderator->role = $role[$moderator->role];
            $moderator->status = empty($moderator->status) ? '<i class="text-danger">(нет данных)</i>' : $status[$moderator->status];
            $moderator->activity = empty($moderator->activity) ? '<i class="text-danger">(нет данных)</i>' : date('H:i d-m-Y', +$moderator->activity);
            $moderator->date_created = date('d-m-Y', $moderator->created_at->getTimestamp());
            $result[] = $moderator;
        }

        return '{"data":'.json_encode($result, JSON_UNESCAPED_UNICODE).'}';
    }

    public function getMenu(Request $request)
    {
        $menu = Menu::all();
        $result = [];

        foreach ($menu->toArray() as $item) {
            $name = json_decode($item['name'], true);
            $item['name'] = $name[$request->get('language')];
            $result[] = $item;
        }

        if (empty($result)) {
            return '{"status": "bad", "message": "Нет пунтктов меню."}';
        } else {
            return '{"status": "ok", "data": '.json_encode($result, JSON_UNESCAPED_UNICODE).'}';
        }

    }

    public function addMenu(Request $request)
    {
        $array['en'] = $request->input('menu-en');
        $array['ru'] = $request->input('menu-ru');
        $array['uk'] = $request->input('menu-uk');

        $menu = Menu::create([
            'name' => json_encode($array, JSON_UNESCAPED_UNICODE),
        ]);

        if ($menu) {
            return json_encode(['status' => 'ok', 'message' => 'Пункт меню добавлен.'], JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(['status' => 'ok', 'message' => 'Возникла ошибка при добавлении пункта меню.'], JSON_UNESCAPED_UNICODE);
        }
    }

    public function sortMenu(Request $request)
    {

        $id     = $request->input('id');
        $weight = $request->input('weight');
        $parent = $request->input('parent');

        if (empty($id) || empty($weight)) {
            return '{"status": "bad", "message": "Данные для сортировки отсутствуют."}';
        }

        for ($i = 0; $i < count($weight); $i++) {
            $item = Menu::where("id", $id[$i])->first();

            if (!empty($item)) {
                $item->parent_id = $parent[$i];
                $item->weight = $weight[$i];
                $item->update();
            }
        }

        return '{"status": "ok", "message": "Сортировка сохранена."}';
    }


    // public function moderatorsEdit()
    // {
    //     return view('admin.home');
    // }

    // public function clients()
    // {
    //     return view('admin.home');
    // }
}