<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App;
use App\Sendsms;
use App\DataTable;

class ServiceController extends Controller
{
    public function sms()
    {
        $sms = Sendsms::all();

        return view('backend.admin.sms', [
            'sms' => $sms,
        ]);
    }

    public function smsFiltering(Request $request)
    {
        $count = empty($request->get("length")) ? 10 : $request->get("length");
        $page  = $request->get("start");

        list($orderName, $orderDir) = DataTable::getOrderSms($request->all());
        $where = DataTable::getSearchSms($request->all());

        $sendsms = Sendsms::where($where)->orderBy($orderName, $orderDir)->take($count)->skip($page)->get();

        $result = [];
        $totalData = Sendsms::count();
        $totalFiltered = $totalData;

        foreach ($sendsms as $sms) {
            $temp['id'] = (string) $sms->id;
            $temp['date_sent'] = $sms->date_sent;
            $temp['text'] = $sms->text;
            $temp['message'] = $sms->message;
            $temp['status'] = $sms->status ? 'Да' : 'Нет';

            $result[] = $temp;
        }

        $totalFiltered = count($result);

        return response()->json([
            "status" => "ok",
            "draw" => $request->get("draw"),
            "recordsTotal" => (string) $totalFiltered,
            "recordsFiltered" => (string) $totalData,
            "data" => $result,
        ]);
    }
}