<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App;
use Validator;
use App\Menu;
use App\Products;

class MenuController extends Controller
{

    public function getMenu($language)
    {
        $menu = Menu::select('id', 'parent_id AS parent', 'weight', 'name')->orderBy('weight', 'asc')->get();
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
        $item = Menu::select('id', 'name', 'slug')->where('id', $id)->first();

        if (empty($item)) {
            return response()->json(['status' => 'bad', 'message' => 'Пункт меню не найден.']);
        } else {
            return response()->json(['status' => 'ok', 'data' => $item]);
        }
    }

    public function actionMenu(Request $request)
    {
        $id = $request->input('menu-id');
        $data = $request->all();
        $data['slug'] = str_slug($data['slug'], '-');

        if (empty($id)) {
            $menu = new Menu();

            $validator = Validator::make($data, [
                'slug' => 'required|unique:menu,slug',
            ]);
        } else {
            $menu = Menu::where('id', $id)->first();

            if (empty($menu)) {
                session()->flash('error', 'Каталог не найден.');
                return redirect()->back();
            }

            $validator = Validator::make($data, [
                'slug' => 'required|unique:blog,slug,'.$id,
            ]);
        }

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            $this->throwValidationException($request, $validator);
        }

        $array['en'] = $data['menu-en'];
        $array['ru'] = $data['menu-ru'];
        $array['uk'] = $data['menu-uk'];

        $menu->name = json_encode($array, JSON_UNESCAPED_UNICODE);
        $menu->slug = str_slug($data['slug'], '-');

        if ($menu->save()) {
            Menu::formingAdditionalData();

            session()->flash('success', 'Каталог сохранен.');
        } else {
            session()->flash('error', 'Возникла ошибка при добавлении пункта каталога.');
        }

        return redirect()->back();
    }

    public function sortMenu(Request $request)
    {
        $id     = $request->input('id');
        $weight = $request->input('weight');
        $parent = $request->input('parent');
        $array  = [];


        if (empty($id) || empty($weight)) {
            return response()->json(['status' => 'bad', 'message' => 'Данные для сортировки отсутствуют.']);
        }

        for ($i = 0; $i < count($id); $i++) {
            $array[$id[$i]]['parent'] = $parent[$i];
            $array[$id[$i]]['weight'] = $weight[$i];
        }

        $menu = Menu::all();

        foreach ($menu as $item) {
            $item->parent_id = $array[$item->id]['parent'];
            $item->weight = $array[$item->id]['weight'];
            $item->update();
        }

        Menu::formingAdditionalData();

        return response()->json(['status' => 'ok', 'message' => 'Сортировка сохранена.']);
    }

    public function deleteMenu(Request $request)
    {
        $id = $request->input('id');

        $menu = Menu::where('id', $id)->firstOrFail();

        if ($menu->parent_exist) {
            session()->flash('warning', 'Не возможно удалить категорию, в нем есть подкатегории.');

            return redirect(url()->previous());
        }

        if ($menu->products->count() == 0) {
            if ($menu->delete()) {
                Menu::formingAdditionalData();

                session()->flash('success', 'Категория успешно удалена.');
            } else {
                session()->flash('error', 'Возникла ошибка при удалинеии категории.');
            }
        } else {
            session()->flash('warning', 'Не возможно удалить категорию, так как за ней закреплена продукция.');
        }

        return redirect(url()->previous());
    }

    public function cleanPrice($id)
    {
        $menu = Menu::findOrFail($id);
        $count = $menu->products()->count();

        if ($menu->products()->delete()) {
            session()->flash('success', 'Было удалено: '.$count.' записей.');
        } else {
            session()->flash('warning', 'Возникла ошибка при удалении подукции.');
        }

        return redirect()->back();
    }
}