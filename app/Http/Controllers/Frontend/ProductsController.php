<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;

use App;
use Session;
use App\Menu;
use App\Products;
use App\Office;
use App\Orders;
use App\OrdersProducts;

class ProductsController extends Controller
{
    public function index(Request $request, $slug = null, $id = null)
    {
        if (empty($request->get('format')) || ($request->get('format') == 'cards')) {
            $format = 'cards';
            $count  = 20;
        } else {
            $format = 'list';
            $count  = 9;
        }

        $page = $request->input('page')-1;
        $page = empty($page) ? 0 : $count*$page;

        if (empty($id)) {
            $products = Products::where([['show_my', '1']])->orderBy('rating', 'DESC')->take($count)->get();
        } else {
            $products = Products::where([['show_my', '1'], ['menu_id', $id]])
                                ->orderBy('rating', 'DESC')
                                ->take($count)
                                ->skip($page)
                                ->get();
        }

        // преобразование данных для отображения
        $result  = Products::viewDataAll($products);
        $offices = Office::getOffices();

        return view('frontend.products.index', [
            'products' => $result,
            'offices'  => $offices,
            'menu_id'  => $id,
            'format'   => $format,
        ]);
    }

    public function view($slug_menu, $slug_product, $id)
    {
        // преобразование данных для отображения
        $product = Products::viewData($id);

        if (empty($product)) {
            return response()->view('errors.404', [], 404);
        }

        $menu = Menu::select('id', 'parent_id AS parent', 'name', 'slug')
                    ->where('id', $product['menu_id'])
                    ->first();

        $menu = $menu->toArray();
        $menu['name'] = json_decode($menu['name'], true)[App::getLocale()];

        return view('frontend.products.view', [
            'product' => $product,
            'menu' => $menu,
        ]);
    }

    public function getMenu()
    {
        $result = [];
        $menu = Menu::select('id', 'parent_id AS parent', 'name', 'slug')
                    ->orderBy('weight', 'ASC')
                    ->get();

        foreach ($menu->toArray() as $item) {
            $item['name'] = json_decode($item['name'], true)[App::getLocale()];
            $result[] = $item;
        }

        if (empty($result)) {
            return response()->json(['status' => 'bad', 'message' => trans('products.products-missing')]);
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

        $count = 9;
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
        $products = Products::viewDataJson($products);

        // var_dump($products);

        if (empty($products)) {
            return response()->json(['status' => 'bad', 'message' => trans('products.products-missing')]);
        } else {
            return response()->json(['status' => 'ok', 'data' => $products, 'count' => $total]);
        }
    }

    public function productToCart(Request $request)
    {
        if (Auth::guard(null)->check()) {
            $id = $request->input('id');
            $count = 1;

            if (empty($id) || !Products::where('id', $id)->exists()) {
                return response()->json(['status' => 'bad', 'message' => 'empty product']);
            }

            $order = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 0]])->first();

            if (empty($order)) {
                $order = new Orders();
                $order->user_id = Auth::guard(null)->user()->id;
                $order->status  = Orders::STATUS_NOT_ACCEPTED;

                $order->save();
            }

            $ordersProducts = new OrdersProducts();
            $ordersProducts->order_id   = $order->id;
            $ordersProducts->product_id = $id;
            $ordersProducts->quantity   = $count;

            if ($ordersProducts->save()) {
                $countProducts = OrdersProducts::where('order_id', $order->id)->count();

                return response()->json(['status' => 'ok', 'data' => $countProducts, 'message' => trans('products.in-shopping-cart')]);
            } else {
                return response()->json(['status' => 'bad', 'message' => 'fail add cart']);
            }

        } else {
            return response()->json(['status' => 'bad', 'message' => trans('auth.not-auth'), 'auth' => true]);
        }
    }

    public function getProductsCart()
    {
        if (Auth::guard(null)->check()) {

            $order = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 0]])->first();

            if (empty($order)) {
                $order = new Orders();
                $order->user_id = Auth::guard(null)->user()->id;
                $order->formed = 0;
                $order->save();

                return response()->json(['status' => 'ok', 'data' => 0]);
            }

            $products = $order->products()->get();
            $products = Products::viewDataJson($products);
            $result = [];

            return response()->json(['status' => 'ok', 'data' => $products]);
        } else {
            return response()->json(['status' => 'bad', 'message' => trans('auth.not-auth'), 'auth' => true]);
        }
    }

    public function countProductCart(Request $request)
    {
        if (Auth::guard(null)->check()) {

            $order = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 0]])->first();

            $id = $request->input('id');
            $count = $request->input('count');

            if (empty($order) || empty($id) || empty($count)) {
                return response()->json(['status' => 'bad', 'message' => trans('products.order-not-found')]);
            }

            $attitude = $order->attitude()->where('id', $id)->first();

            if (empty($attitude)) {
                return response()->json(['status' => 'bad', 'message' => trans('products.order-not-found')]);
            }

            $attitude->quantity = $count;

            if ($attitude->update()) {
                return response()->json(['status' => 'ok']);
            } else {
                return response()->json(['status' => 'bad']);
            }
        } else {
            return response()->json(['status' => 'bad', 'message' => trans('auth.not-auth'), 'auth' => true]);
        }
    }

    public function deleteProductCart(Request $request)
    {
        if (Auth::guard(null)->check()) {

            $order = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 0]])->first();
            $id = $request->input('id');

            if (empty($order) || empty($id)) {
                return response()->json(['status' => 'bad', 'message' => trans('products.order-not-found')]);
            }

            $attitude = $order->attitude()->where('id', $id)->first();

            if (empty($attitude)) {
                return response()->json(['status' => 'bad', 'message' => trans('products.order-not-found')]);
            }

            if ($attitude->delete()) {
                return response()->json(['status' => 'ok', 'data' => $order->attitude()->count()]);
            } else {
                return response()->json(['status' => 'bad']);
            }
        } else {
            return response()->json(['status' => 'bad', 'message' => trans('auth.not-auth'), 'auth' => true]);
        }
    }

    public function formedOrder(Request $request)
    {
        if (Auth::guard(null)->check()) {

            $order = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 0]])->first();

            if (empty($order)) {
                session()->flash('error', trans('products.order-error-complete'));
                return redirect(url()->previous());
            }

            $products = $order->products()->get();
            $sum = 0;

            foreach ($products as $product) {
                $sum += $product->price * $product->pivot->quantity;
            }

            $order->formed   = 1;
            $order->status   = 1;
            $order->wish     = $request->input('wish');
            $order->contacts = $request->input('contacts');
            $order->total_cost = $sum;
            $order->created_at = time();

            if ($order->update()) {
                session()->flash('success', trans('products.order-complete'));
            } else {
                session()->flash('error', trans('products.order-error-complete'));
            }

            return redirect(url()->previous());
        } else {
            session()->flash('error', trans('auth.not-auth'));
            return redirect(url()->previous());
        }
    }
}