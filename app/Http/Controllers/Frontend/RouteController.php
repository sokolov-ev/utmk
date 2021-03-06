<?php

namespace App\Http\Controllers\Frontend;

use App;
use SchemaOrg;
use App\Menu;
use App\Images;
use App\Metatags;
use App\Products;
use App\Redirects;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class RouteController extends Controller
{
    public function index(Request $request, $slug)
    {
        $redirect = Redirects::where('old', 'LIKE', '%utmk.com.ua/' . $slug)->first();

        if ($redirect) {
            return redirect($redirect['new'], 301);
        }

        $part = explode('/', $slug);

        if ($part[0] == 'index.php') {
            return redirect('/', 301);
        }

        if (in_array($part[0], ['en', 'ru', 'uk'])) {
            App::setLocale($part[0]);

            $slug = '/'.substr($slug, 3, strlen($slug));

            if ($part[0] == 'ru') {
                return redirect($slug, 301);
            }
        } else {
            App::setLocale('ru');

            $slug = '/'.$slug;
        }

        if (in_array(App::getLocale(), ['en', 'uk'])) {
            $locale = '/'.App::getLocale();
        } else {
            $locale = '';
        }

        $data = [
            'steel_grade',
            'standard',
            'sawing',
            'diameter',
            'height',
            'width',
            'thickness',
            'section',
            'coating',
            'view',
            'brinell_hardness',
            'class',
        ];

        $item = ($item = Menu::where('full_path_slug', $slug)->first()) ? $item->toArray() : null;

        if (null === $item) {
            $slug = array_pop($part);

            $product = Products::where('slug', $slug)->firstOrFail();

            $menu = Menu::getBreadcrumbs($product->menu_id);
            $schemaBreadcrumb = SchemaOrg::breadcrumbProduct($menu, $locale);

            $rating  = Rating::getRating($product->id);
            $schemaProduct = SchemaOrg::product($product, $rating);

            $metatags = Metatags::where([['type', 'product'], ['slug', $slug]])->first();
            $metatags = Metatags::getViewData($metatags);

            $product = $product->getViewData();

            return view('frontend.products.view', [
                'data'             => $data,
                'product'          => $product,
                'menu'             => $menu,
                'metatags'         => $metatags,
                'locale'           => $locale,
                'rating'           => $rating,
                'schemaProduct'    => $schemaProduct,
                'schemaBreadcrumb' => $schemaBreadcrumb,
            ]);
        }

        $format = 'list';
        if (empty($request->get('format')) || ($request->get('format') == 'cards')) {
            $format = 'cards';
        }

        $page  = $request->get('page');

        $menu  = Menu::all();
        $array = $this->getCatalogId($item['id'], $menu->toArray());

        $products = Products::whereIn('menu_id', $array)
                            ->where('show_my', 1)
                            ->orderBy('rating', 'DESC')
                            ->paginate(9);

        $result = Products::getViewProducts($products);

        $slug = array_pop($part);

        $metatags = Metatags::where([['type', 'menu'], ['slug', $slug]])->first();
        $metatags = Metatags::getViewData($metatags);

        $breadcrumbs = Menu::getBreadcrumbs($item['id']);
        $jsonLD  = SchemaOrg::breadcrumbProduct($breadcrumbs, $locale);

        $banersSmall = Images::where('type', 'slider-small')->orderBy('weight', 'ASC')->get();
        $banersSmall = Images::viewDataArray($banersSmall);

        $banersLarge = Images::where('type', 'slider-large')->orderBy('weight', 'ASC')->get();
        $banersLarge = Images::viewDataArray($banersLarge);

        return view('frontend.products.index', [
            'data'        => $data,
            'products'    => $products,
            'result'      => $result,
            'menu_id'     => $item['id'],
            'format'      => $format,
            'metatags'    => $metatags,
            'query'       => $request->except('page'),
            'offPaginate' => false,
            'breadcrumbs' => $breadcrumbs,
            'locale'      => $locale,
            'jsonLD'      => $jsonLD,
            'page'        => $page,
            'banersSmall' => $banersSmall,
            'banersLarge' => $banersLarge,
        ]);
    }

    protected function getCatalogId($id, $catalog)
    {
        $menu[] = $id;

        $child = array_filter($catalog, function($innerArray) use ($id) {
            return $innerArray['parent_id'] == $id;
        });

        foreach ($child as $value) {
            $temp = $this->getCatalogId($value['id'], $catalog);

            array_push($menu, $temp);
        }

        return $this->wat($menu);
    }

    protected function wat(array $menu)
    {
        $result = [];

        foreach ($menu as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->wat($value));
            } else {
                $result[] = $value;
            }
        }

        return $result;
    }
}
