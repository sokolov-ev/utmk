<?php

namespace App\Console\Commands;

use App\Articles;
use App\Office;
use App\Menu;
use App\Products;
use App\Metatags;
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
        $metatagsMenu = Metatags::where('type', 'menu')->orderBy('slug', 'ASC')->get();
        $metatagsBlog = Metatags::where('type', 'blog')->orderBy('slug', 'ASC')->get();
        $products = Products::where([['show_my', '1']])->orderBy('rating', 'DESC')->get();

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
            $url .= '<xhtml:link rel="alternate" hreflang="en" href="'.url('/').'/en/office/'.$office['city'].'/'.$office['id'].'" />';
            $url .= '<xhtml:link rel="alternate" hreflang="uk" href="'.url('/').'/uk/office/'.$office['city'].'/'.$office['id'].'" />';
            $url .= '<lastmod>'.date(DATE_W3C, $office['updated_at']).'</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        foreach ($metatagsMenu as $item) {
            $title = json_decode($item->title, true);

            if (!empty($title['ru']) || !empty($title['uk']) || !empty($title['en'])) {
                $url  = '';
                $link = $item->menu->full_path_slug;

                $url .= '<url><loc>'.url('/').$link.'</loc>';
                $url .= empty($title['en']) ? '' : '<xhtml:link rel="alternate" hreflang="en" href="'.url('/').'/en'.$link.'" />';
                $url .= empty($title['uk']) ? '' : '<xhtml:link rel="alternate" hreflang="uk" href="'.url('/').'/uk'.$link.'" />';
                $url .= '<lastmod>'.date(DATE_W3C, $item->updated_at->getTimestamp()).'</lastmod>';
                $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

                $sitemap .= $url;
            }
        }

        foreach ($metatagsBlog as $news) {
            $title = json_decode($news->title, true);

            if (!empty($title['ru']) || !empty($title['ru']) || !empty($title['ru'])) {
                $url  = '';

                $url .= '<url><loc>'.url('/').'/'.$news->slug.'</loc>';
                $url .= '<lastmod>'.date(DATE_W3C, $news->updated_at->getTimestamp()).'</lastmod>';
                $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

                $sitemap .= $url;
            }
        }

        foreach ($products as $product) {
            $url   = '';
            $title = json_decode($product->title, true);
            $link  = $product->menu->full_path_slug.'/'.$product->slug;

            $url .= '<url><loc>'.url('/').$link.'</loc>';
            $url .= empty($title['en']) ? '' : '<xhtml:link rel="alternate" hreflang="en" href="'.url('/').'/en'.$link.'" />';
            $url .= empty($title['uk']) ? '' : '<xhtml:link rel="alternate" hreflang="uk" href="'.url('/').'/uk'.$link.'" />';
            $url .= '<lastmod>'.date(DATE_W3C, $product->updated_at->getTimestamp()).'</lastmod>';
            $url .= '<changefreq>weekly</changefreq><priority>0.9</priority></url>';

            $sitemap .= $url;
        }

        $sitemap .= '</urlset>';

        file_put_contents('public/sitemap.xml', $sitemap);
        file_put_contents('/home/metallvs/metallvsem.com.ua/www/public/sitemap.xml', $sitemap);

        return true;
    }
}
