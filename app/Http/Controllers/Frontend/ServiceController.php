<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use Mail;
use Validator;
use JsValidator;

use TurboSms;
use App\Sendsms;

use App\Office;
use App\Metatags;
use App\FilePrice;

class ServiceController extends Controller
{
    public function contacts()
    {
        $addValidator = JsValidator::make([
                'mail_username' => 'string|min:3',
                'mail_company'  => 'required|string|min:3',
                'mail_email'    => 'required|email',
                'mail_phone'    => 'required|string',
                'mail_message'  => 'string',
            ],
            [],
            [],
            "#contacts-form"
        );
        $metatags = Metatags::where([['type', 'article'], ['slug', 'contacts']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.contacts', [
            'validator' => $addValidator,
            'metatags' => $metatags,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'mail_username' => 'string|min:3',
            'mail_company'  => 'required|string|min:3',
            'mail_email'    => 'required|email',
            'mail_phone'    => 'required|string',
            'mail_message'  => 'string',
        ]);

        if ($validator->fails()) {
            session()->flash('error', trans('index.contacts.error-send'));

            return redirect(url()->previous())->withErrors($validator)->withInput();
        }

        $data['msg'] = $data['message'];

        $sent = Mail::send('emails.contacts', $data, function($message) use ($data){
            $message->to('metallvsem@ukr.net')->subject('Связатся с нами - '.$data['company']);
        });

        if ($sent) {
            session()->flash('info', trans('index.contacts.success-send'));
        } else {
            session()->flash('error', trans('index.contacts.error-send'));
        }

        return redirect(url()->previous());
    }

    public function sendSms(Request $request)
    {
        $text = $request->input('call-phone');

        $text = preg_replace('~\D~', '', $text);

        if (!empty($text) && strlen($text) < 25) {
            $status = TurboSms::send('Перезвоните мне: '.$text, '380989371555');

            $sms = new Sendsms();
            $sms->date_sent = date('Y-m-d H:i');
            $sms->text      = $text;
            $sms->phone     = '380989371555';

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

    public function prices()
    {
        $files = FilePrice::all();
        $metatags = Metatags::where([['type', 'article'], ['slug', 'price']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.prices', [
            'files' => $files,
            'metatags' => $metatags,
        ]);
    }

    public function priceDownload($id)
    {
        $file = FilePrice::where('id', $id)->first();

        if (empty($file)) {
            return redirect()->back();
        }

        $path = "./files/".$file->slug;

        if (file_exists($path)) {
            $headers = ['Content-Type: application/file'];
            return response()->download($path, $file->name, $headers);
        } else {
            return redirect()->back();
        }
    }
}
