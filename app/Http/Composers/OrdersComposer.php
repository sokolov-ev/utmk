<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use DB;
use Auth;
use App\Orders;

class OrdersComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $orders = Orders::where([['formed', 1], ['status', Orders::STATUS_NOT_ACCEPTED]])->count();

        $view->with('unprocessed_orders', $orders);
    }
}