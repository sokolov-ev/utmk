<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App;
use App\Menu;

class MenuController extends Controller
{

    public function getMenu($language)
    {
        $menu = Menu::select('id', 'parent_id AS parent', 'weight', 'name')->orderBy('weight', 'ASC')->get();
        $result = [];

        foreach ($menu->toArray() as $item) {
            $name = json_decode($item['name'], true);
            $item['name'] = $name[$language];
            $result[] = $item;
        }

        if (empty($result)) {
            return '{"status": "bad", "message": "Нет пунтктов меню."}';
        } else {
            return '{"status": "ok", "data": '.json_encode($result, JSON_UNESCAPED_UNICODE).'}';
        }
    }

    public function getMenuItem($id)
    {
        $item = Menu::select('id', 'name')->where('id', $id)->first();

        if (empty($item)) {
            return '{"status": "bad", "message": "Пункт меню не найден."}';
        } else {
            return '{"status": "ok", "data": '.json_encode($item, JSON_UNESCAPED_UNICODE).'}';
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

    public function editMenu(Request $request)
    {
        $id = $request->input('menu-id');

        $item = Menu::where('id', $id)->first();

        if (empty($item)) {
            return '{"status": "bad", "message": "Пункт меню не найден."}';
        }

        $array['en'] = $request->input('menu-en');
        $array['ru'] = $request->input('menu-ru');
        $array['uk'] = $request->input('menu-uk');

        $item->name = json_encode($array, JSON_UNESCAPED_UNICODE);

        if ($item->update()) {
            return '{"status": "ok", "message": "Пункт меню изменен."}';
        } else {
            return '{"status": "bad", "message": "Возникла ошибка при редактировании пункта меню."}';
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
            $item = Menu::where('id', $id[$i])->first();

            if (!empty($item)) {
                $item->parent_id = $parent[$i];
                $item->weight = $weight[$i];
                $item->update();
            }
        }

        return '{"status": "ok", "message": "Сортировка сохранена."}';
    }

    public function deleteMenu(Request $request)
    {
        $id = $request->input('id');

        $item = Menu::where('id', $id)->firstOrFail();

        if ($item->delete()) {
            session()->flash('success', 'Пункт меню успешно удален.');
        } else {
            session()->flash('error', 'Возникла ошибка удаления пункта меню.');
        }

        return redirect(url()->previous());
    }
}