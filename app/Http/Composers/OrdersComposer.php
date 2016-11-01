<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use DB;
use Auth;
use App\Orders;
use App\Admin;

class OrdersComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN) {
            $where = [['formed', 1], ['status', Orders::STATUS_NOT_ACCEPTED]];
        } else {
            $where = [['formed', 1], ['status', Orders::STATUS_NOT_ACCEPTED], ['orders.office_id', Auth::guard('admin')->user()->office_id]];
        }

        $orders = Orders::where($where)->count();

        $view->with('unprocessed_orders', $orders);
    }
}