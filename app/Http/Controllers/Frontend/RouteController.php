<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App;
use App\Menu;
use App\Metatags;
use App\Office;
use App\Orders;
use App\Products;

class RouteController extends Controller
{
    public function index(Request $request, $slug)
    {
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

        $item = ($item = Menu::where('full_path_slug', $slug)->first()) ? $item->toArray() : null;

        if (null === $item) {
            $slug = array_pop($part);

            $product = Products::where('slug', $slug)->first();

            if (empty($product)) {
                abort(404);
            } else {

                $menu = Menu::getBreadcrumbs($product['menu_id']);
                $product = Products::toArrayProduct($product);

                $metatags = Metatags::where([['type', 'product'], ['slug', $slug]])->first();
                $metatags = Metatags::getViewData($metatags);

                if (in_array(App::getLocale(), ['en', 'uk'])) {
                    $locale = '/'.App::getLocale();
                } else {
                    $locale = '';
                }

                return view('frontend.products.view', [
                    'product'  => $product,
                    'menu'     => $menu,
                    'metatags' => $metatags,
                    'locale'   => $locale,
                ]);
            }
        }

        $offices = Office::select('id', 'city')->get();
        $ordersLocked = Orders::isLocked();
        $filterOffice = $ordersLocked ? $ordersLocked : Office::getOfficeId($request->get('city'));

        $format = 'list';
        if (empty($request->get('format')) || ($request->get('format') == 'cards')) {
            $format = 'cards';
        }

        $menu  = Menu::all();
        $array = $this->getCatalogId($item['id'], $menu->toArray());

        $products = Products::whereIn('menu_id', $array)->where([['office_id', $filterOffice], ['show_my', 1]])->orderBy('rating', 'DESC')->paginate(9);
        $result   = Products::viewDataJson($products);

        $metatags = Metatags::where([['type', 'menu'], ['slug', $slug]])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.products.index', [
            'products' => $products,
            'result'   => $result,
            'offices'  => $offices,
            'menu_id'  => $item['id'],
            'format'   => $format,
            'metatags' => $metatags,
            'filterCity'   => $filterOffice,
            'ordersLocked' => $ordersLocked,
            'query' => $request->except('page'),
            'offPaginate' => false,
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
