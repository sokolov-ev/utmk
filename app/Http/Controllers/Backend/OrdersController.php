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
use App\Office;

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
            if ($isAdmin) {
                $temp["user"] = '<a href="/administration/clients?id='.$order->user_id.'" title="'.$order->user.'">'.$order->user.'</a>';
            } else {
                $temp["user"] = $order->user;
            }
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

    public function view($id)
    {
        $order = Orders::findOrFail($id);
        $products = $order->products()->get();
        $products = Products::viewDataAll($products);
        $isAdmin  = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;

        if ($order->manager_id) {
            $office = Office::find($order->manager->office_id);
        } else {
            $office = '<i class="text-danger">(нет данных)</i>';
        }

        return view('backend.site.order-view', [
            'order' => $order,
            'products' => $products,
            'isAdmin' => $isAdmin,
            'office'  => $office,
        ]);
    }

    public function accept($id)
    {
        $order = Orders::findOrFail($id);

        if ( ($order->status == Orders::STATUS_NOT_ACCEPTED) && ($order->manager_id == 0) ) {
            $order->manager_id = Auth::guard('admin')->user()->id;
            $order->status = Orders::STATUS_ACCEPTED;

            if ($order->update()) {
                session()->flash('success', 'Заказ принят.');
            } else {
                session()->flash('error', 'Возникла ошибка при принятии заказа.');
            }

            return redirect()->back();
        } else {
            return response()->view('errors.403', [], 403);
        }
    }

    public function closed($id)
    {
        $order = Orders::findOrFail($id);
        $isAdmin = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;

        if ( ( ($order->status == Orders::STATUS_ACCEPTED) && ($order->manager_id == Auth::guard('admin')->user()->id) ) || ($isAdmin) ) {
            $order->status = Orders::STATUS_CLOSED;

            if ($order->update()) {
                session()->flash('success', 'Заказ закрыт.');
            } else {
                session()->flash('error', 'Возникла ошибка при закрытии заказа.');
            }

            return redirect()->back();
        } else {
            return response()->view('errors.403', [], 403);
        }
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

        $order = Orders::where([['id', $id], ['formed', 1]])->where($where)->first();

        if (empty($order) || empty($bonds) || empty($count)) {
            return response()->json(['status' => 'bad', 'message' => 'Заказ не найден.']);
        }

        $order->total_cost = $sum;
        $attitude = $order->attitude()->where('id', $bonds)->first();

        if (empty($attitude)) {
            return response()->json(['status' => 'bad', 'message' => 'Заказ не найден.']);
        }

        $attitude->quantity = $count;

        if ($attitude->update() && $order->update()) {
            return response()->json(['status' => 'ok']);
        } else {
            return response()->json(['status' => 'bad']);
        }
    }

    public function deleteProduct($id, $bonds)
    {
        if (Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN) {
            $where = [];
        } else {
            $where = ['manager_id', Auth::guard('admin')->user()->id];
        }

        $order = Orders::where([['id', $id], ['formed', 1]])->where($where)->first();

        if (empty($order)) {
            session()->flash('error', 'Заказ не найден.');
            return redirect()->back();
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

            session()->flash('error', 'Продукт успешно удален из заказа.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении продукции из заказа.');
        }

        return redirect()->back();
    }
}