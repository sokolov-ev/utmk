<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use DB;
use App;
use Auth;
use App\Admin;
use App\Orders;
use App\DataTable;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::where('formed', 1)->orderBy('created_at', 'DESC')->get();

        return view('backend.site.orders');
    }

    public function filtering(Request $request)
    {
        $count = empty($request->get("length")) ? 10 : $request->get("length");
        $page  = $count * $request->get("start");
        $isAdmin = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;
        $orderStatus = Orders::getStatus();

        list($orderName, $orderDir) = DataTable::getOrderOrders($request->all());
        $where = DataTable::getSearchOrders($request->all());

        if (!$isAdmin) {
            $where[] = ["products.office_id", Auth::guard('admin')->user()->office_id];
        }

        $orders = DB::table('orders')
                      ->select('orders.*', 'users.username AS user', 'admins.username AS moderator', 'offices.city AS office') //
                      ->join('users', 'users.id', '=', 'orders.user_id')
                      ->leftJoin('offices', 'offices.id', '=', 'orders.office_id')
                      ->leftJoin('admins', 'admins.id', '=', 'orders.manager_id')
                      ->where($where)
                      ->orderBy($orderName, $orderDir)
                      ->take($count)
                      ->skip($page)
                      ->get();

        // return response()->json(["data" => $orders]);
        // exit;

        $result = [];
        $totalData = Orders::count();
        $totalFiltered = $totalData;

        foreach ($orders as $order) {
            $temp["id"]   = (string) $order->id;
            $temp["user"] = $order->user;
            $temp["total_cost"] = $order->total_cost;
            $temp["status"] = trans('orders.status.'.$orderStatus[$order->status]);

            $cityName = json_decode($order->office, true)[App::getLocale()];

            if ($isAdmin) {
                $temp["office"]    = '<a href="/administration/offices/index/'.$order->office_id.'" title="'.$cityName.'">'.$cityName.'</a>';
                $temp["moderator"] = '<a href="/administration/moderators/'.$order->manager_id.'" title="'.$order->moderator.'">'.$order->moderator.'</a>';
            } else {
                $temp["office"]    = $cityName;
                $temp["moderator"] = $order->moderator;
            }

            $temp["actions"] = '<button class="btn btn-default btn-sm view-order" data-id="'.$order->id.'"><i class="fa fa-eye" aria-hidden="true"></i></button> ';

            if ($order->status == Orders::STATUS_NOT_ACCEPTED) {

                $temp["actions"] .= ' <a class="btn btn-primary btn-sm" href="/administration/orders/action/'.$order->id.'" alt="Принять" title="Принять">';
                $temp["actions"] .= '<i class="fa fa-check-square-o" aria-hidden="true"></i> Принять</a>';

            } else if ( ($order->status == Orders::STATUS_ACCEPTED) && ( ($order->manager_id == Auth::guard('admin')->user()->id) || (Admin::ROLE_ADMIN == Auth::guard('admin')->user()->role) ) ) {

                $temp["actions"] .= ' <a class="btn btn-warning btn-sm" href="/administration/orders/action/'.$order->id.'" alt="Закрыть" title="Закрыть">';
                $temp["actions"] .= '<i class="fa fa-check-square-o" aria-hidden="true"></i> Закрыть</a>';

            }

            $result[] = $temp;
        }

        $totalFiltered = count($result);

        return response()->json([
            "status" => "ok",
            "draw" => $request->get("draw"),
            "recordsTotal" => (string) $totalData,
            "recordsFiltered" => (string) $totalFiltered,
            "data" => $result,
        ]);
    }
}