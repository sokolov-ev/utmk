<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use App\Office;

class OfficesController extends Controller
{
    public function __construct()
    {
        $this->middleware('language');
    }

    public function getAll(Request $request)
    {
        if (in_array($request->language, ['en', 'ru', 'uk'])) {
            $language = $request->language;
        } else {
            $language = 'ru';
        }

        $result = [];
        $offices = Office::all();

        foreach ($offices as $office) {
            $office->description = json_decode($office->description, true)[$language];
            $result[] = $office;
        }

        return view('backend.site.offices', [
            'offices' => $result,
        ]);
    }

    public function addOffice()
    {
        $officeType = Office::getType();

        return view('backend.site.office-add', [
            'officeType' => $officeType,
        ]);
    }
}