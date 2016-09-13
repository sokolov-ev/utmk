<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use DB;
use Auth;
use App\Office;

class UserCartComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Auth::guest()) {
            $view->with('user_cart', 0);
        } else {
            $cartProducts = DB::table('orders_products')
                              ->join('orders', 'orders_products.order_id', '=', 'orders.id')
                              ->where([['orders.formed', 0], ['orders.user_id', Auth::guard(null)->user()->id]])
                              ->count();

            $view->with('user_cart', $cartProducts);
        }
    }
}