<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App;
use Session;
use App\Menu;
use App\Products;
use App\Office;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::where([['show_my', '1']])->orderBy('rating', 'DESC')->take(20)->get();
        // преобразование данных для отображения
        $result   = Products::viewDataAll($products);
        $offices  = Office::getOffices();

        return view('frontend.products.index', [
            'products' => $result,
            'offices'  => $offices,
        ]);
    }

    public function view($slug, $id)
    {
        // преобразование данных для отображения
        $product = Products::viewData($id);

        if (empty($product)) {
            return response()->view('errors.404', [], 404);
        }

        return view('frontend.products.view', [
            'product' => $product,
        ]);
    }

    public function getMenu()
    {
        $result = [];
        $menu = Menu::select('id', 'parent_id AS parent', 'name')
                    ->orderBy('weight', 'ASC')
                    ->get();

        foreach ($menu->toArray() as $item) {
            $item['name'] = json_decode($item['name'], true)[App::getLocale()];
            $result[] = $item;
        }

        if (empty($result)) {
            return response()->json(['status' => 'bad', 'message' => trans('products.catalog-enpty')]);
        } else {
            return response()->json(['status' => 'ok', 'data' => $result]);
        }
    }

    public function catalogProducts(Request $request)
    {
        $menu = $request->input('menu');
        $name = $request->input('name');
        $city = $request->input('city');
        $page = $request->input('page')-1;

        $count = 2;
        $page  = empty($page) ? 0 : $count*$page;
        // top products
        $where = [['show_my', '1']];

        // выгребаем по разделу меню
        if (!empty($menu)) {
            $where[] = ['menu_id', $menu];
        }
        // поиск по названию
        if (!empty($name)) {
            $where[] = ['title', 'LIKE', '%'.$name.'%'];
            // поиск по названию и городу
            if (!empty($city)) {
                $where[] = ['office_id', $city];
            }
        }

        $total = Products::where($where)->count();

        $products = Products::where($where)
                            ->orderBy('rating', 'DESC')
                            ->take($count)
                            ->skip($page)
                            ->get();

        // преобразование данных для отображения
        $products = Products::viewDataAll($products);

        if (empty($products)) {
            return response()->json(['status' => 'bad', 'message' => trans('products.products-missing')]);
        } else {
            return response()->json(['status' => 'ok', 'data' => $products, 'count' => $total]);
        }
    }
}