<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Mail;
use Validator;
use JsValidator;


use App\Office;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.site.index');
    }

    public function aboutUs()
    {
        return view('frontend.site.about-us');
    }

    public function companyProfile()
    {
        return view('frontend.site.company-profile');
    }

//---------------------------------------------------------------------

    public function metallokonstruktsii()
    {
        return view('frontend.information.metallokonstruktsii');
    }

    public function modulnyeSoorujeniya()
    {
        return view('frontend.information.modulnye-soorujeniya');
    }

    public function otsinkovannyeRulony()
    {
        return view('frontend.information.otsinkovannye-rulony');
    }

    public function metallIzEvropy()
    {
        return view('frontend.information.metall-iz-evropy');
    }

//---------------------------------------------------------------------

    public function salesNetwork()
    {
        $offices = Office::getOfficesContacts();

        return view('frontend.site.sales-network', [
            'offices' => $offices,
        ]);
    }

    public function contacts()
    {
        $addValidator = JsValidator::make([
                'username' => 'string|min:3',
                'company'  => 'required|string|min:3',
                'email'    => 'required|email',
                'phone'    => 'required|string',
                'message'  => 'string',
            ],
            [],
            [],
            "#contacts-form"
        );

        return view('frontend.site.contacts', [
            'validator' => $addValidator,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'username' => 'string|min:3',
            'company'  => 'required|string|min:3',
            'email'    => 'required|email',
            'phone'    => 'required|string',
            'message'  => 'string',
        ]);

        if ($validator->fails()) {
            session()->flash('error', trans('index.contacts.error-send'));

            $this->throwValidationException(
                $request, $validator
            );
        }

        $data['msg'] = $data['message'];

        $sent = Mail::send('emails.contacts', $data, function($message) use ($data)
        {
            $message->to('sokolov_ev@ukr.net')->subject('Связатся с нами - '.$data['company']);
        });

        if ($sent) {
            session()->flash('info', trans('index.contacts.success-send'));
        } else {
            session()->flash('error', trans('index.contacts.error-send'));
        }

        return redirect(url()->previous());
    }

    public function testing(Request $request)
    {
        // $response = new Response();
        // $response->withCookie('language', 'uk', 6000);
        // var_dump($response);

        // $response = new Response('Hello World');
        // $response->withCookie(cookie('language', 'value', 90));

        // $response = new Response();
        // $response->withCookie(cookie('language', 'en', 90));

        // var_dump(cookie('language', 'uk', 90));

        // Cookie::queue(Cookie('language', 'uk', 90));

        var_dump($request->cookie('language'));
    }
}