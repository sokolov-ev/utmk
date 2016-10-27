<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App;
use TurboSms;
use App\Sendsms;

class ServiceController extends Controller
{
    public function sendSms(Request $request)
    {
        $text = $request->input('call-phone');

        $text = preg_replace('~\D~', '', $text);

        if (!empty($text) && strlen($text) < 25) {
            $status = TurboSms::send('Перезвоните мне: '.$text, '380930877809');

            $sms = new Sendsms();
            $sms->date_sent = date('Y-m-d H:i');
            $sms->text      = $text;
            $sms->phone     = '380930877809';

            if ($status === true) {
                $sms->message = 'Сообщение успешно отправлено.';
                $sms->status = 1;
                session()->flash('info', trans('index.contacts.success-send'));
            } else {
                $sms->message = $status['status'];
                $sms->status = 0;
                session()->flash('error', $status['status']);
            }

            $sms->save();
        } else {
            session()->flash('error', trans('index.contacts.error-send'));
        }

        return redirect(url()->previous());
    }
}