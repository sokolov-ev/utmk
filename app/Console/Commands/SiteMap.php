<?php

namespace App\Console\Commands;

use App\Articles;
use App\Office;
use App\Menu;
use App\Products;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class SiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create sitema.xml';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // начало карты сайта
        $sitemap  = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';

        $articles = Articles::all();
        $offices  = Office::getOfficesContacts();
        $menu = Menu::select('id', 'slug', 'updated_at')->where('parent_exist', 0)->orderBy('weight', 'ASC')->get();
        $products = Products::select('slug_menu', 'slug', 'id', 'updated_at', 'title')->where([['show_my', '1']])->orderBy('rating', 'DESC')->get();

        foreach ($articles->toArray() as $article) {
            $url = '';

            if ($article['slug'] == 'home') {
                $url .= '<url><loc>'.url('/').'</loc>';
                $url .= '<lastmod>'.date(DATE_W3C, $article['updated_at']).'</lastmod>';
                $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';
            } else {
                $url .= '<url><loc>'.url('/').'/'.$article['slug'].'</loc>';
                $url .= '<lastmod>'.date(DATE_W3C, $article['updated_at']).'</lastmod>';
                $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';
            }

            $sitemap .= $url;
        }

        foreach ($offices as $office) {
            $url = '';

            $url .= '<url><loc>'.url('/').'/office/'.$office['city'].'/'.$office['id'].'</loc>';
            $url .= '<lastmod>'.date(DATE_W3C, $office['updated_at']).'</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        foreach ($menu as $item) {
            if ($item->products->count() > 0) {
                $url   = '';
                $title = json_decode($item->metatags['title'], true);
                $link  = url('/').'/catalog/products/'.$item->slug.'/'.$item->id;

                $url .= '<url><loc>'.$link.'</loc>';
                $url .= empty($title['en']) ? '' : '<xhtml:link rel="alternate" hreflang="en" href="'.$link.'?lang=en" />';
                $url .= empty($title['uk']) ? '' : '<xhtml:link rel="alternate" hreflang="uk" href="'.$link.'?lang=uk" />';
                $url .= '<lastmod>'.date(DATE_W3C, $item->updated_at->getTimestamp()).'</lastmod>';
                $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

                $sitemap .= $url;
            }
        }

        foreach ($products->toArray() as $product) {
            $url   = '';
            $title = json_decode($product['title'], true);
            $link  = url('/').'/catalog/details/'.$product['slug_menu'].'/'.$product['slug'].'/'.$product['id'];

            $url .= '<url><loc>'.$link.'</loc>';
            $url .= empty($title['en']) ? '' : '<xhtml:link rel="alternate" hreflang="en" href="'.$link.'?lang=en" />';
            $url .= empty($title['uk']) ? '' : '<xhtml:link rel="alternate" hreflang="uk" href="'.$link.'?lang=uk" />';
            $url .= '<lastmod>'.date(DATE_W3C, $product['updated_at']).'</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        $sitemap .= '</urlset>';

        // file_put_contents('public/sitemap.xml', $sitemap);
        file_put_contents('/home/metallvs/metallvsem.com.ua/www/public/sitemap.xml', $sitemap);

        return true;
    }
}
