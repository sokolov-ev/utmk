<?php

namespace App\Console\Commands;

use App\Articles;
use App\Office;
use App\Menu;
use App\Products;
use App\Metatags;
use App\ReferenceSection;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use DB;
use Log;

class SiteMap extends Command
{
    protected $signature = 'sitemap';

    protected $description = 'Create sitema.xml';

    public function handle()
    {

        Log::info('Start');

        $sitemap  = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';

        $articles = DB::select("SELECT * FROM `metatags` LEFT JOIN `articles` ON `articles`.`slug` = `metatags`.`slug` WHERE `metatags`.`type` = 'article' AND `articles`.`id` IS NOT NULL");
        $offices = DB::select("SELECT `metatags`.*, `offices`.`slug` AS `office_slug`  FROM `metatags` LEFT JOIN `offices` ON `offices`.`slug` = `metatags`.`slug` WHERE `metatags`.`type` = 'office' AND `offices`.`id` IS NOT NULL");
        $catalog = DB::select("SELECT `metatags`.*, `menu`.`full_path_slug` AS `menu_slug` FROM `metatags` LEFT JOIN `menu` ON `menu`.`slug` = `metatags`.`slug` WHERE `type` = 'menu' AND `menu`.`id` IS NOT NULL");
        $blogIndex = DB::table('metatags')->where([['type', 'blog'], ['slug', 'blog']])->first();
        $blogNews = DB::select("SELECT `metatags`.*, `blog`.`slug` AS `blog_slug` FROM `metatags` LEFT JOIN `blog` ON `blog`.`slug` = `metatags`.`slug` WHERE `type` = 'blog' AND `blog`.`slug` IS NOT NULL");
        $referenceIndex = DB::table('metatags')->where([['type', 'reference'], ['slug', 'index']])->first();
        $referenceSection = DB::select("SELECT `metatags`.*, `reference_section`.`slug_full_path` AS `refence_slug` FROM `metatags` LEFT JOIN `reference_section` ON `reference_section`.`slug` = `metatags`.`slug` WHERE `metatags`.`type` = 'reference' AND `reference_section`.`id` IS NOT NULL");

        foreach ($articles as $article) {
            $url = '';

            if ($article->slug == 'home') {
                $url .= '<url><loc>' . url('/') . '</loc>';
            } else {
                $url .= '<url><loc>' . url('/') . '/' . $article->slug . '</loc>';
            }

            $url .= '<lastmod>' . date(DATE_W3C, $article->updated_at) . '</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        foreach ($offices as $office) {
            $title = json_decode($office->title, true);

            $url = '';

            $url .= '<url><loc>' . url('/') . '/office/' . $office->slug . '</loc>';
            $url .= empty($title['en']) ? '' : '<xhtml:link rel="alternate" hreflang="en" href="' . url('/') . '/en/office/' . $office->slug . '" />';
            $url .= empty($title['uk']) ? '' : '<xhtml:link rel="alternate" hreflang="uk" href="' . url('/') . '/uk/office/' . $office->slug . '" />';
            $url .= '<lastmod>' . date(DATE_W3C, $office->updated_at) . '</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        foreach ($catalog as $item) {
            $title = json_decode($item->title, true);

            $url  = '';
            $link = $item->menu_slug;

            $url .= '<url><loc>' . url('/') . $link . '</loc>';
            $url .= empty($title['en']) ? '' : '<xhtml:link rel="alternate" hreflang="en" href="' . url('/') . '/en' . $link . '" />';
            $url .= empty($title['uk']) ? '' : '<xhtml:link rel="alternate" hreflang="uk" href="' . url('/') . '/uk' . $link . '" />';
            $url .= '<lastmod>' . date(DATE_W3C, $item->updated_at) . '</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        if (!empty($blogIndex)) {
            $url  = '';

            $url .= '<url><loc>' . url('/') . '/blog' . '</loc>';
            $url .= '<lastmod>' . date(DATE_W3C, $blogIndex->updated_at) . '</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        foreach ($blogNews as $news) {
            $url  = '';

            $url .= '<url><loc>' . url('/') . '/blog/' . $news->blog_slug . '</loc>';
            $url .= '<lastmod>' . date(DATE_W3C, $news->updated_at) . '</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        if (!empty($referenceIndex)) {
            $title = json_decode($referenceIndex->title, true);

            $url  = '';

            $url .= '<url><loc>' . url('/') . '/spravka' . '</loc>';
            $url .= empty($title['en']) ? '' : '<xhtml:link rel="alternate" hreflang="en" href="' . url('/') . '/en/spravka' . '" />';
            $url .= empty($title['uk']) ? '' : '<xhtml:link rel="alternate" hreflang="uk" href="' . url('/') . '/uk/spravka' . '" />';
            $url .= '<lastmod>' . date(DATE_W3C, $referenceIndex->updated_at) . '</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        foreach ($referenceSection as $section) {
            $title = json_decode($section->title, true);

            $url  = '';
            $link = $section->refence_slug;

            $url .= '<url><loc>' . url('/') . '/spravka' . $link . '</loc>';
            $url .= empty($title['en']) ? '' : '<xhtml:link rel="alternate" hreflang="en" href="' . url('/') . '/en/spravka' . $link . '" />';
            $url .= empty($title['uk']) ? '' : '<xhtml:link rel="alternate" hreflang="uk" href="' . url('/') . '/uk/spravka' . $link . '" />';
            $url .= '<lastmod>' . date(DATE_W3C, $section->updated_at) . '</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        $products = DB::select("SELECT `metatags`.*, `products`.`slug` AS `product_slug`, `menu`.`full_path_slug` AS `menu_slug` FROM `metatags` LEFT JOIN `products` ON `products`.`slug` = `metatags`.`slug` LEFT JOIN `menu` ON `menu`.`id` = `products`.`menu_id` WHERE `type` = 'product' AND `products`.`id` IS NOT NULL AND `products`.`show_my` = true");

        foreach ($products as $product) {
            $title = json_decode($product->title, true);

            $url   = '';
            $link  = $product->menu_slug . '/' . $product->product_slug;

            $url .= '<url><loc>' . url('/') . $link . '</loc>';
            $url .= empty($title['en']) ? '' : '<xhtml:link rel="alternate" hreflang="en" href="' . url('/') . '/en' . $link . '" />';
            $url .= empty($title['uk']) ? '' : '<xhtml:link rel="alternate" hreflang="uk" href="' . url('/') . '/uk' . $link . '" />';
            $url .= '<lastmod>' . date(DATE_W3C, $product->updated_at) . '</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        $sitemap .= '</urlset>';

        Log::info('End');

        // $result = file_put_contents('public/sitemap.xml', $sitemap);
        $result = file_put_contents('/home/metallvs/utmk.com.ua/www/public/sitemap.xml', $sitemap);

        Log::info('Result: '.$result);

        return true;
    }
}
