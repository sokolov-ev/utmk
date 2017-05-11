<?php

namespace App\Helpers;

use App;

class SchemaOrg
{
    public static function breadcrumbProduct($data, $locale)
    {
        $jsonLD = [
            "@context" => "http://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "item" => [
                        "@id"  => route('products-index'),
                        "name" => trans('index.menu.products')
                    ]
                ]
            ]
        ];

        foreach ($data as $key => $item) {
            $chit = [
                    "@type" => "ListItem",
                    "position" => $key + 2,
                    "item" => [
                        "@id"  => url($locale . $item['slug']),
                        "name" => $item['name']
                    ]
                ];

            $jsonLD["itemListElement"][] = $chit;
        }

        return $jsonLD;
    }

    public static function product($product, $rating)
    {
        $availability = $product['in_stock'] ? "http://schema.org/InStock" : "http://schema.org/OutOfStock";

        $jsonLD = [
            "@context" => "http://schema.org",
            "@type" => "Product",
            "name" => $product['title'],
            "image" => url('/') . $product['images'][0],
            "aggregateRating" => [
                "@type" => "AggregateRating",
                "bestRating" => 5,
                "worstRating" => 0,
                "ratingValue" => $rating['appraisal'],
                "reviewCount" => $rating['count'],
            ],
            "offers" => [],
        ];

        foreach ($product['prices'] as $price) {
            $cost = ($price['type_view'] != 'agreed') ? $price['price'] : 0;

            $chit = [
                "@type" => "Offer",
                "availability" => $availability,
                "price" => $cost,
                "priceCurrency" => "UAH"
            ];

            $jsonLD["offers"][] = $chit;
        }

        return $jsonLD;
    }
}