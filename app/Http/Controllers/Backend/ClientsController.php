<?php

namespace App\Http\Controllers\Backend;

use Validator;
use App\User;
use App\DataTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClientsController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->input('id');
        return view('backend.admin.clients', ['id' => $id]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $data = $request->all();

        $validator = Validator::make($data, [
            'id'        => 'exists:users,id',
            'username'  => 'required|max:255',
            'company'   => 'required|max:255|unique:users,company,' . $id . ',deleted_at,NULL',
            'email'     => 'required|email|max:255|unique:users,email,' . $id . ',deleted_at,NULL',
            'phone'     => 'required|max:255|unique:users,phone,' . $id . ',deleted_at,NULL',
            'note_user' => 'string',
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Возникла ошибка при обновлении данных клиента.');

            $this->throwValidationException(
                $request, $validator
            );
        }

        $client = User::find($id);
        $client->username  = $data['username'];
        $client->company   = $data['company'];
        $client->email     = $data['email'];
        $client->phone     = $data['phone'];
        $client->note_user = $data['note_user'];

        if (! empty($data['password'])) {
            $client->password = bcrypt($data['password']);
        }

        if ($client->update()) {
            session()->flash('success', 'Данные клиента успешно обновлены.');
        } else {
            session()->flash('error', 'Возникла ошибка при обновлении данных клиента 1.');
        }

        return redirect(url()->previous());
    }

    public function delete(Request $request)
    {
        if (User::destroy($request->input('id'))) {
            session()->flash('success', 'Клиент успешно удален.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении клиента.');
        }

        return redirect(url()->previous());
    }

    public function filtering(Request $request)
    {
        $count = empty($request->get("length")) ? 10 : $request->get("length");
        $page  = $request->get("start");

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
            $temp['id']            = (string) $client->id;
            $temp['username']      = $client->username;
            $temp['company']       = $client->company;
            $temp['email']         = $client->email;
            $temp['phone']         = $client->phone;
            $temp['comments']      = empty($client->note_user) ? e('<i class="text-danger">(комментарии отсутствуют)</i>') : $client->note_user;
            $temp['edit_comments'] = $client->note_user;
            $temp['activity']      = empty($client->activity) ? "<i class='text-danger'>(нет данных)</i>" : date("Y-m-d H:i", $client->activity);
            $temp['created_at']    = empty($client->created_at) ? "<i class='text-danger'>(нет данных)</i>" : date("Y-m-d H:i", $client->created_at->getTimestamp());

            $result[] = $temp;
        }

        $totalFiltered = count($result);

        return response()->json([
            "draw"   => $request->get("draw"),
            "data"   => $result,
            "status" => "ok",
            "recordsTotal"    => (string) $totalFiltered,
            "recordsFiltered" => (string) $totalData,
        ]);
    }
}