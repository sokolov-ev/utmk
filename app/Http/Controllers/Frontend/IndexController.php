<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Office;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.site.index');
    }

    public function salesNetwork()
    {
        $offices = Office::getOfficesContacts();

        return view('frontend.site.sales-network', [
            'offices' => $offices,
        ]);
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