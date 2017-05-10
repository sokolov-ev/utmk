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
        $page  = $request->get("start");

        $isAdmin = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;
        $orderStatus = Orders::getStatus();

        list($orderName, $orderDir) = DataTable::getOrderOrders($request->all());
        $where = DataTable::getSearchOrders($request->all());

        if (!$isAdmin) {
            $where[] = ['orders.office_id', Auth::guard('admin')->user()->office_id];
        }

        $orders = Orders::with('user', 'manager', 'office')
                         ->where($where)
                         ->where('formed', 1)
                         ->orderBy($orderName, $orderDir)
                         ->take($count)
                         ->skip($page)
                         ->get();

        $total = Orders::with('user', 'manager', 'office')
                       ->where($where)
                       ->where('formed', 1)
                       ->count();

        $result = [];
        $totalData = $total;
        $totalFiltered = count($orders);
        // ;..(
        foreach ($orders as $order) {
            $temp["id"]   = (string) $order->id;

            if ($isAdmin) {
                $temp["user"] = '<a href="/administration/clients?id=' . $order->user_id . '" title="' . $order->user->username . '">' . $order->user->username . '</a>';
            } else {
                $temp["user"] = $order->user->username;
            }

            $temp["total_cost"] = $order->total_cost;
            $temp["status"] = trans('orders.status.'.$orderStatus[$order->status]);

            $cityName = json_decode($order->office->city, true)[App::getLocale()];

            if ($isAdmin) {
                $temp["office"] = '<a href="/administration/offices/index/' . $order->office_id . '" title="' . $cityName . '">' . $cityName . '</a>';
                
                if (empty($order->manager->username)) {
                    $temp["moderator"] = '<i class="text-danger">(нет данных)</i>';
                } else {
                    $temp["moderator"] = '<a href="/administration/moderators/' . $order->manager_id . '" title="' . $order->manager->username . '">' . $order->manager->username . '</a>';
                }
            } else {
                $temp["office"] = $cityName;

                if (empty($order->manager->username)) {
                    $temp["moderator"] = '<i class="text-danger">(нет данных)</i>';
                } else {
                    $temp["moderator"] = $order->manager->username;
                }
            }

            if (empty($cityName)) {
                $temp["office"] = '<i class="text-danger">(нет данных)</i>';
            }

            $result[] = $temp;
        }

        return response()->json([
            "status"          => "ok",
            "draw"            => $request->get("draw"),
            "recordsTotal"    => (string) $totalFiltered,
            "recordsFiltered" => (string) $totalData,
            "data"            => $result,
        ]);
    }

    public function view($id)
    {
        $order   = Orders::findOrFail($id);
        $manager = Auth::guard('admin')->user();
        $isAdmin = $manager->role == Admin::ROLE_ADMIN;

        if ((!$isAdmin) && ($order->office_id != Auth::guard('admin')->user()->office_id)) {
            return response(view('errors.403'), 403);
        }

        $products = $order->products()->get();
        $products = Products::getViewProducts($products);

        if ($order->manager_id) {
            $office = Office::find($order->manager->office_id);
        } else {
            $office = '<i class="text-danger">(нет данных)</i>';
        }

        $isEditable = false;

        if ( ( (1 == $order->status) || (2 == $order->status) )  && ( ($order->manager_id == Auth::guard('admin')->user()->id) || $isAdmin ) ) {
            $isEditable = true;
        }

        return view('backend.site.order-view', [
            'order'    => $order,
            'products' => $products,
            'isAdmin'  => $isAdmin,
            'office'   => $office,
            'manager'  => $manager,
            'isEditable' => $isEditable,
        ]);
    }

    public function changeProduct(Request $request)
    {
        $orderId = $request->input('order');
        $bonds   = $request->input('bonds');

        $count   = $request->input('count');
        $priceId = $request->input('price');

        if (Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN) {
            $where = [['id', $orderId], ['formed', 1]];
        } else {
            $where = [['id', $orderId], ['formed', 1], ['manager_id', Auth::guard('admin')->user()->id]];
        }

        $order = Orders::where($where)->first();

        if (empty($order) || empty($bonds) || empty($count) || empty($priceId)) {
            return response()->json(['status' => 'bad', 'message' => 'Заказ не найден.']);
        }

        $attitude = $order->attitude()->where('id', $bonds)->first();

        if (empty($attitude)) {
            return response()->json(['status' => 'bad', 'message' => 'Продукция не найдена.']);
        }

        $attitude->quantity = $count;
        $attitude->price_id = $priceId;

        if ($attitude->update()) {
            $order = $this->calculateSum($order);
            $order->save();

            return response()->json(['status' => 'ok', 'data' => $order->total_cost]);
        } else {
            return response()->json(['status' => 'bad']);
        }
    }

    protected function calculateSum($order)
    {
        $sum = 0;
        $prices = $order->prices()->get();

        foreach ($prices as $price) {
            $sum += $price->price * $price->pivot->quantity;
        }

        $order->total_cost = $sum;

        return $order;
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

    public function deleteProduct(Request $request)
    {
        $orderId = $request->input('order');
        $bonds   = $request->input('bonds');

        if (Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN) {
            $where = [];
        } else {
            $where = ['manager_id', Auth::guard('admin')->user()->id];
        }

        $order = Orders::where([['id', $orderId], ['formed', 1]])->where($where)->first();

        if (empty($order)) {
            return response()->json(['status' => 'bad', 'message' => 'Заказ не найден.']);
        }

        $attitude = $order->attitude()->where('id', $bonds)->first();

        if (!empty($attitude) && $attitude->delete()) {
            $order = $this->calculateSum($order);

            if ($order->save()) {
                return response()->json(['status' => 'ok', 'data' => $order->total_cost]);
            }
        }

        return response()->json(['status' => 'bad', 'message' => 'Возникла ошибка при удалении продукции из заказа.']);
    }
}