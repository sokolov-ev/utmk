<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App;

class RouteController extends Controller
{
    public function index($slug)
    {
        dd($slug);
    }
}