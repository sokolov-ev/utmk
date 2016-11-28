<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;

class TestController extends Controller
{

    public function index()
    {
        \libxml_use_internal_errors(true);

$sxe = \simplexml_load_string("<?xml version='1.0'><broken><tag/></broken>");

if ($sxe === false) {
    echo "Failed loading XML\n";
    foreach (libxml_get_errors() as $error) {
        echo "\t", $error->message;
    }
}
    }

}
