<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App;
use Auth;
use Session;

use App\Orders;
use App\Products;

class UserController extends Controller
{
    public function cart()
    {
        $order = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 0]])->first();
        $result = [];

        if (!empty($order)) {
            $products = $order->products()->get();

            if (!empty($products)) {
                $result = Products::viewDataJson($products);
            }
        }

        return view('frontend.user.cart', [
            'products' => $result,
        ]);
    }

    public function formedOrders()
    {
        $orders = Orders::where([['user_id', Auth::guard(null)->user()->id], ['formed', 1]])->get();
        $orderStatus = Orders::getStatus();
        $orders = Orders::parseData($orders);

        return view('frontend.user.formed-orders', [
            'orders' => $orders,
            'orderStatus' => $orderStatus,
        ]);
    }
}