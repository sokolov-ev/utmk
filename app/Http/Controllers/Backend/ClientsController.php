<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use JsValidator;
use App\User;
use App\DataTable;

class ClientsController extends Controller
{
    public function clients()
    {
        return view('backend.admin.clients');
    }

    public function commentClients($id)
    {
        if (empty($id)) {
            return response()->json(["status" => "bad", "message" => "Клиент не найден."]);
        }

        $user = User::find($id);

        if (empty($user)) {
            return response()->json(["status" => "bad", "message" => "Клиент не найден."]);
        } else {
            $comment = empty($user->note_user) ? '<i class="text-danger">(комментарии отсутствуют)</i>' : $user->note_user;
            return response()->json(["status" => "ok", "message" => $comment]);
        }
    }

    public function deleteClients(Request $request)
    {
        if (User::destroy($request->input('id'))) {
            session()->flash('success', 'Клиент успешно удален.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении клиента.');
        }

        return redirect(url()->previous());
    }

    public function filteringClients(Request $request)
    {
        $count = empty($request->get("length")) ? 10 : $request->get("length");
        $page  = $count * $request->get("start");

        list($orderName, $orderDir) = DataTable::getOrderClients($request->all());
        $where = DataTable::getSearchClients($request->all());

        $clients = User::where($where)
                       ->orderBy($orderName, $orderDir)
                       ->take($count)
                       ->skip($page)
                       ->get();

        $result = [];
        $totalData = User::count();
        $totalFiltered = $totalData;

        foreach ($clients as $client) {
            $temp['id'] = $client->id;
            $temp['username'] = $client->username;
            $temp['company'] = $client->company;
            $temp['email'] = $client->email;
            $temp['phone'] = $client->phone;
            $temp['comments'] = empty($client->note_user) ? e('<i class="text-danger">(комментарии отсутствуют)</i>') : $client->note_user;
            $temp['edit_comments'] = $client->note_user;
            $temp['activity'] = empty($client->activity) ? "<i class='text-danger'>(нет данных)</i>" : date("Y-m-d H:i", $client->activity->getTimestamp());
            $temp['created_at'] = empty($client->created_at) ? "<i class='text-danger'>(нет данных)</i>" : date("Y-m-d H:i", $client->created_at->getTimestamp());

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