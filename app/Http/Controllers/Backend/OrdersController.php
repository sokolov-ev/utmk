<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App;
use App\Orders;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::where('formed', 1)->get();

        return view('backend.site.orders', [
            'orders' => $orders,
        ]);
    }
}