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
use App\Products;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');
        $orderStatus = Orders::getStatus();

        return view('backend.site.orders', [
            'orderStatus' => $orderStatus,
            'status' => $status,
        ]);
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
                      ->where('formed', 1)
                      ->orderBy($orderName, $orderDir)
                      ->take($count)
                      ->skip($page)
                      ->get();

        $result = [];
        $totalData = Orders::count();
        $totalFiltered = $totalData;

        foreach ($orders as $order) {
            $temp["id"]   = (string) $order->id;
            $temp["user"] = '<a href="/administration/clients?id='.$order->user_id.'" title="'.$order->user.'">'.$order->user.'</a>';
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

            if (empty($cityName)) {
                $temp["office"] = '<i class="text-danger">(нет данных)</i>';
            }

            if (empty($order->moderator)) {
                $temp["moderator"] = '<i class="text-danger">(нет данных)</i>';
            }

            $temp["actions"] = '<button class="btn btn-default btn-sm view-order" data-id="'.$order->id.'"><i class="fa fa-eye" aria-hidden="true"></i></button> ';

            if ($order->status == Orders::STATUS_NOT_ACCEPTED) {
                $temp["actions"] .= ' <button class="btn btn-primary btn-sm order-action" data-id="'.$order->id.'">';
                $temp["actions"] .= '<i class="fa fa-check-square-o" aria-hidden="true"></i> Принять</button>';
            } else if ( ($order->status == Orders::STATUS_ACCEPTED) && ( ($order->manager_id == Auth::guard('admin')->user()->id) || ($isAdmin) ) ) {
                $temp["actions"] .= ' <button class="btn btn-success btn-sm order-action" data-id="'.$order->id.'">';
                $temp["actions"] .= '<i class="fa fa-check-square-o" aria-hidden="true"></i> Закрыть</button>';
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

    public function getOrderProducts($id)
    {
        $order = Orders::find($id);

        if (empty($order)) {
            return response()->json(['status' => 'bad', 'message' => 'Заказ не найден.']);
        }

        $products = $order->products()->get();
        $products = Products::viewDataAll($products);
        $result   = [];
        $isAdmin  = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;
        $userOffice = Auth::guard('admin')->user()->office_id;

        foreach ($products as $key => $product) {
            $temp['work_id'] = $key;
            $temp['work_price'] = $product['price'] * $product['quantity'];
            $temp['work_order'] = $order->id;

            $temp['city'] = json_decode($product['office']['city'], true)[App::getLocale()];

            if ( ($userOffice == $product['office']['id']) || ($isAdmin) ) {
                $temp['title'] = '<a class="" href="/administration/products?id='.$product['id'].'" title="'.$product['title'].'">'.$product['title'].'</a>';
            } else {
                $temp['title'] = $product['title'];
            }

            $temp['price'] = $product['price'];
            $temp['quantity'] = $product['quantity'];
            $temp['bonds'] = $product['bonds'];

            $result[] = $temp;
        }

        $edit = false;
        if ( ($order->status == Orders::STATUS_ACCEPTED) && ( ($order->manager_id == Auth::guard('admin')->user()->id) || ($isAdmin) ) ) {
            $edit = true;
        }

        return response()->json(['status' => 'ok', 'data' => $result, 'contacts' => $order->contacts, 'wish' => $order->wish, 'edit' => $edit]);
    }

    public function changeCountProduct(Request $request)
    {
        $id    = $request->input('id');
        $bonds = $request->input('bonds');
        $count = $request->input('count');
        $sum   = $request->input('sum');

        if (Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN) {
            $where = [];
        } else {
            $where = ['manager_id', Auth::guard('admin')->user()->id];
        }

        $order = Orders::where([['id', $id], ['status', Orders::STATUS_ACCEPTED]])
                       ->where($where)
                       ->first();

        if (empty($order) || empty($bonds) || empty($count)) {
            return response()->json(['status' => 'bad', 'message' => 'Заказ не найден.']);
        }

        $order->total_cost = $sum;
        $attitude = $order->attitude()->where('id', $bonds)->first();

        if ($order->update() && empty($attitude)) {
            return response()->json(['status' => 'bad', 'message' => 'Заказ не найден.']);
        }

        $attitude->quantity = $count;

        if ($attitude->update()) {
            return response()->json(['status' => 'ok']);
        } else {
            return response()->json(['status' => 'bad']);
        }
    }

    public function deleteProduct(Request $request)
    {
        $id = $request->input('id');
        $bonds = $request->input('bonds');

        if (Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN) {
            $where = [];
        } else {
            $where = ['manager_id', Auth::guard('admin')->user()->id];
        }

        $order = Orders::where([['id', $id], ['status', Orders::STATUS_ACCEPTED]])
                       ->where($where)
                       ->first();

        if (empty($order) || empty($bonds)) {
            return response()->json(['status' => 'bad', 'message' => 'Заказ не найден.']);
        }

        $attitude = $order->attitude()->where('id', $bonds)->first();

        if (!empty($attitude) && $attitude->delete()) {

            $products = $order->products()->get();
            $sum = 0;

            foreach ($products as $product) {
                $sum += $product->price * $product->pivot->quantity;
            }

            $order->total_cost = $sum;
            $order->update();

            return response()->json(['status' => 'ok', 'data' => $sum]);
        } else {
            return response()->json(['status' => 'bad']);
        }
    }

    public function action(Request $request)
    {
        $id = $request->input('id');
        $isAdmin = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;

        $order = Orders::find($id);

        if (empty($order)) {
            return response()->json(['status' => 'bad', 'message' => 'Заказ не найден.']);
        }

        if ($order->status == Orders::STATUS_NOT_ACCEPTED) {
            $order->status = Orders::STATUS_ACCEPTED;

            $button  = ' <button class="btn btn-success btn-sm order-action" data-id="'.$order->id.'">';
            $button .= '<i class="fa fa-check-square-o" aria-hidden="true"></i> Закрыть</button>';
        } else if ( ($order->status == Orders::STATUS_ACCEPTED) && ( ($order->manager_id == Auth::guard('admin')->user()->id) || ($isAdmin) ) ) {
            $order->status = Orders::STATUS_CLOSED;

            $button = '';
        }

        if ($order->update()) {
            return response()->json(['status' => 'ok', 'message' => 'Статус заказа изменен.', 'data' => $button]);
        } else {
            return response()->json(['status' => 'bad', 'message' => 'Возникла ошибка при изменении статуса заказа.']);
        }
    }
}