<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
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
}