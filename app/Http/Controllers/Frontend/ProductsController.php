<?php

namespace App\Http\Controllers\Frontend;

use App;
use Session;
use Validator;
use App\Menu;
use App\Images;
use App\Rating;
use App\Orders;
use App\Products;
use App\Metatags;
use App\OrdersProducts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name');

        $format = 'list';
        if (empty($request->get('format')) || ($request->get('format') == 'cards')) {
            $format = 'cards';
        }

        $count = 9;
        $offPaginate = false;

        // поиск по названию
        if (!empty($name)) {
            $products = Products::where([['show_my', 1], ['title', 'LIKE', '%' . $name . '%']])->orderBy('rating', 'DESC')->paginate($count);
        } else {
            $products = Products::where('show_my', 1)->orderBy('rating', 'DESC')->take($count)->get();
            $offPaginate = true;
        }
        $result   = Products::getViewProducts($products);

        $metatags = Metatags::where([['type', 'menu'], ['slug', 'products']])->first();
        $metatags = Metatags::getViewData($metatags);

        $banersSmall = Images::where('type', 'slider-small')->orderBy('weight', 'ASC')->get();
        $banersSmall = Images::viewDataArray($banersSmall);

        $banersLarge = Images::where('type', 'slider-large')->orderBy('weight', 'ASC')->get();
        $banersLarge = Images::viewDataArray($banersLarge);

        $data = [
            'steel_grade',
            'standard',
            'sawing',
            'diameter',
            'height',
            'width',
            'thickness',
            'section',
            'coating',
            'view',
            'brinell_hardness',
            'class',
        ];

        return view('frontend.products.index', [
            'data'        => $data,
            'products'    => $products,
            'result'      => $result,
            'menu_id'     => null,
            'format'      => $format,
            'metatags'    => $metatags,
            'query'       => $request->except('page'),
            'offPaginate' => $offPaginate,
            'banersSmall' => $banersSmall,
            'banersLarge' => $banersLarge,
        ]);
    }

    public function getMenu()
    {
        $result = [];
        $menu = Menu::select('id', 'parent_id AS parent', 'name', 'full_path_slug')->orderBy('weight', 'ASC')->get()->toArray();

        foreach ($menu as $item) {
            $item['name'] = json_decode($item['name'], true)[App::getLocale()];
            $item['slug'] = $item['full_path_slug'];

            $result[] = $item;
        }

        if (empty($result)) {
            return response()->json(['status' => 'bad', 'message' => trans('products.products-missing')]);
        } else {
            return response()->json(['status' => 'ok', 'data' => $result]);
        }
    }

    public function getCatalog(Request $request)
    {
        $menu = $request->get('menu');
        $name = $request->get('name');
        $page = $request->get('page')-1;

        $count = 9;
        $page  = empty($page) ? 0 : $count * $page;

        $h1Title = '';
        // top products
        $where = [['show_my', 1]];

        // выгребаем по разделу меню
        if (!empty($menu)) {
            $where[] = ['menu_id', $menu];

            $menu = Menu::where('id', $menu)->first();

            if (!empty($menu)) {
                $metatags = Metatags::where([['type', 'menu'], ['slug', $menu->slug]])->first();
                $metatags = Metatags::getViewData($metatags);
                $h1Title = $metatags['h1'];
            }
        }
        // поиск по названию
        if (!empty($name)) {
            $where[] = ['title', 'LIKE', '%'.$name.'%'];
        }

        if (empty($menu) && empty($name)) {
            $total = $count;
        } else {
            $total = Products::where($where)->count();
        }

        $products = Products::where($where)
                            ->orderBy('rating', 'DESC')
                            ->take($count)
                            ->skip($page)
                            ->get();

        $products = Products::getViewProducts($products);

        if (empty($products)) {
            return response()->json(['status' => 'bad', 'message' => trans('products.products-missing')]);
        } else {
            return response()->json(['status' => 'ok', 'data' => $products, 'count' => $total, 'h1' => $h1Title]);
        }
    }

    public function setToCart(Request $request)
    {
        if (!Auth::guard(null)->check()) {
            return response()->json(['status' => 'bad', 'error' => 'auth', 'message' => trans('auth.not-auth')]);
        }

        $id = $request->input('id');
        $product = Products::where('id', $id)->first();

        if (empty($product)) {
            return response()->json(['status' => 'bad', 'error' => 'empty', 'message' => trans('products.products-missing')]);
        }

        $order = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 0]])->first();

        if (empty($order)) {
            $order = new Orders();
            $order->user_id   = Auth::guard(null)->user()->id;
            $order->status    = Orders::STATUS_NOT_ACCEPTED;
            $order->office_id = $product->office_id;
        }

        if (!$order->save()) {
            return response()->json(['status' => 'bad', 'error' => 'empty', 'message' => trans('products.order-not-found')]);
        }

        $price = $product->prices->first();

        $ordersProducts = new OrdersProducts();
        $ordersProducts->order_id   = $order->id;
        $ordersProducts->product_id = $id;
        $ordersProducts->quantity   = 1;
        $ordersProducts->price_id   = $price->id;

        if ($ordersProducts->save()) {
            $countProducts = OrdersProducts::where('order_id', $order->id)->count();
            return response()->json(['status' => 'ok', 'data' => $countProducts, 'message' => '', 'button' => trans('products.in-shopping-cart')]);
        } else {
            return response()->json(['status' => 'bad', 'error' => 'empty', 'message' => trans('products.order-not-found')]);
        }
    }

    public function getShoppingCart()
    {
        if (Auth::guard(null)->check()) {

            $order = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 0]])->first();

            if (empty($order)) {
                return response()->json(['status' => 'ok', 'data' => []]);
            }

            $products = $order->products()->get();
            $products = Products::getViewProducts($products);

            return response()->json(['status' => 'ok', 'data' => $products]);
        } else {
            return response()->json(['status' => 'bad', 'message' => trans('auth.not-auth'), 'auth' => true]);
        }
    }

    public function countProductCart(Request $request)
    {
        if (Auth::guard(null)->check()) {

            $order = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 0]])->first();

            $id    = $request->input('id');
            $count = $request->input('count');
            $price = $request->input('price');

            if (empty($order) || empty($id) || empty($count) || empty($price)) {
                return response()->json(['status' => 'bad', 'message' => trans('products.order-not-found')]);
            }

            $attitude = $order->attitude()->where('id', $id)->first();

            if (empty($attitude)) {
                return response()->json(['status' => 'bad', 'message' => trans('products.order-not-found')]);
            }

            $attitude->quantity = $count;
            $attitude->price_id = $price;

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
                $count = $order->attitude()->count();
                if ($count == 0) {
                    $order->office_id = 0;
                    $order->save();
                }

                return response()->json(['status' => 'ok', 'data' => $count]);
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

            $prices = $order->prices()->get();
            $sum = 0;

            foreach ($prices as $price) {
                $sum += $price->price * $price->pivot->quantity;
            }

            $order->formed     = 1;
            $order->status     = Orders::STATUS_NOT_ACCEPTED;
            $order->wish       = $request->input('wish');
            $order->contacts   = $request->input('contacts');
            $order->total_cost = $sum;
            $order->created_at = time();

            if ($order->save()) {
                session()->flash('success', trans('products.order-complete'));
            } else {
                session()->flash('error', trans('products.order-error-complete'));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('auth.not-auth'));
            return redirect()->back();
        }
    }

    public function getRating(Request $request, $id)
    {
        $data = Rating::getRating($id);

        return response()->json([
            'data' => $data
        ]);
    }

    public function setRating(Request $request, $id)
    {
        $rating = $request->input('data');

        if (empty($rating)) {
            return response()->json([
                'success' => false,
                'data' => 1
            ]);
        }

        if (Rating::setRating($id, $rating)) {
            return response()->json([
                'success' => true,
                'data' => 2
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => 3
            ]);
        }
    }
}