<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App;
use App\Reference;
use App\ReferenceSection;
use App\Metatags;

class ReferenceController extends Controller
{
    public function index()
    {
        $index    = Reference::viewReference();
        $metatags = Metatags::where([['type', 'reference'], ['slug', 'index']])->first();
        $metatags = Metatags::getViewData($metatags);
        $sections = ReferenceSection::allView();

        return view('frontend.reference.index', [
            'index' => $index,
            'metatags' => $metatags,
            'sections' => $sections,
        ]);
    }

    public function view($slug)
    {
        $count = 3;

        $slug = explode('/', $slug);
        $slug = array_pop($slug);

        $section  = ReferenceSection::getView($slug);
        $metatags = Metatags::where([['type', 'reference'], ['slug', $slug]])->first();
        $metatags = Metatags::getViewData($metatags);

        $jsonLD = [
            "@context" => "http://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "item" => [
                        "@id"  => route('index-page'),
                        "name" => trans('index.menu.home')
                    ]
                ],
                [
                    "@type" => "ListItem",
                    "position" => 2,
                    "item" => [
                        "@id"  => route('spravka'),
                        "name" => trans('index.menu.reference_book')
                    ]
                ]
            ]
        ];

        if (!empty($section['parent'])) {
            $jsonLD['itemListElement'][] = [
                "@type" => "ListItem",
                "position" => 3,
                "item" => [
                    "@id"  => url('/spravka'.$section['parent']['slug']),
                    "name" => $section['parent']['name']
                ]
            ];

            $count = 4;
        }

        $jsonLD['itemListElement'][] = [
            "@type" => "ListItem",
            "position" => $count,
            "item" => [
                "@id"  => url('/spravka'.$section['slug']),
                "name" => $section['title']
            ]
        ];

        return view('frontend.reference.view', [
            'section'  => $section,
            'metatags' => $metatags,
            'jsonLD'   => $jsonLD,
        ]);
    }

    public function referenceSection()
    {
        $sections = ReferenceSection::allView();

        return response()->json($sections);
    }
}
