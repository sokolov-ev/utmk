<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index()
    {

    }

    public function salesNetwork()
    {
        return view('frontend.site.sales-network');
    }
}