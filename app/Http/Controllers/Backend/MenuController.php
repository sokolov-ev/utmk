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
            $item['name'] = json_decode($item['name'], true)[$language];
            $result[] = $item;
        }

        if (empty($result)) {
            return response()->json(['status' => 'bad', 'message' => 'Нет пунтктов меню.']);
        } else {
            return response()->json(['status' => 'ok', 'data' => $result]);
        }
    }

    public function getMenuItem($id)
    {
        $item = Menu::select('id', 'name')->where('id', $id)->first();

        if (empty($item)) {
            return response()->json(['status' => 'bad', 'message' => 'Пункт меню не найден.']);
        } else {
            return response()->json(['status' => 'ok', 'data' => $item]);
        }
    }

    public function addMenu(Request $request)
    {
        $array['en'] = $request->input('menu-en');
        $array['ru'] = $request->input('menu-ru');
        $array['uk'] = $request->input('menu-uk');

        $menu = Menu::create([
            'name' => json_encode($array, JSON_UNESCAPED_UNICODE),
            'slug' => str_slug($array['en'], '_'),
        ]);

        if ($menu) {
            return response()->json(['status' => 'ok', 'message' => 'Пункт меню добавлен.']);
        } else {
            return response()->json(['status' => 'ok', 'message' => 'Возникла ошибка при добавлении пункта меню.']);
        }
    }

    public function editMenu(Request $request)
    {
        $id = $request->input('menu-id');

        $item = Menu::where('id', $id)->first();

        if (empty($item)) {
            return response()->json(['status' => 'bad', 'message' => 'Пункт меню не найден.']);
        }

        $array['en'] = $request->input('menu-en');
        $array['ru'] = $request->input('menu-ru');
        $array['uk'] = $request->input('menu-uk');

        $item->name = json_encode($array, JSON_UNESCAPED_UNICODE);
        $item->slug = str_slug($array['en'], '_');

        if ($item->update()) {
            return response()->json(['status' => 'ok', 'message' => 'Пункт меню изменен.']);
        } else {
            return response()->json(['status' => 'bad', 'message' => 'Возникла ошибка при редактировании пункта меню.']);
        }
    }

    public function sortMenu(Request $request)
    {
        $id     = $request->input('id');
        $weight = $request->input('weight');
        $parent = $request->input('parent');

        if (empty($id) || empty($weight)) {
            return response()->json(['status' => 'bad', 'message' => 'Данные для сортировки отсутствуют.']);
        }

        for ($i = 0; $i < count($weight); $i++) {
            $item = Menu::where('id', $id[$i])->first();

            if (!empty($item)) {
                $item->parent_id = $parent[$i];
                $item->weight = $weight[$i];
                $item->update();
            }
        }

        Menu::checkParent();

        return response()->json(['status' => 'ok', 'message' => 'Сортировка сохранена.']);
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

        Menu::checkParent();

        return redirect(url()->previous());
    }
}