<?php

namespace App\Http\Controllers\Backend;

use App;
use Auth;
use Validator;
use App\Rating;
use App\Menu;
use App\Admin;
use App\Office;
use App\Prices;
use App\Products;
use App\DataTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProductsController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('language');
    }

    public function index()
    {
        $menu      = [];
        $city      = [];
        $isAdmin   = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;
        $office_id = Auth::guard('admin')->user()->office_id;

        $result = Menu::select('id', 'name')->get();
        $menu   = [];

        foreach ($result as $item) {
            $menu[$item->id] = json_decode($item->name, true)[App::getLocale()];
        }

        if ($isAdmin) {
            $result = Office::select('id', 'city')->get();
        } else {
            $result = Office::select('id', 'city')->where('id', $office_id)->get();
        }
        $city   = [];

        foreach ($result as $item) {
            $city[$item->id] = json_decode($item->city, true)[App::getLocale()];
        }

        return view('backend.site.products', [
            'menu'    => $menu,
            'city'    => $city,
            'isAdmin' => $isAdmin,
        ]);
    }

    public function filtering(Request $request)
    {
        $count   = empty($request->get("length")) ? 10 : $request->get("length");
        $page    = $request->get("start");
        $isAdmin = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;

        list($orderName, $orderDir) = DataTable::getOrderProducts($request->all());
        $where = DataTable::getSearchProducts($request->all());

        if (!$isAdmin) {
            $where[] = ["products.office_id", Auth::guard('admin')->user()->office_id];
        }

        $products = Products::with('menu', 'office', 'moderator')
                            ->where($where)
                            ->orderBy($orderName, $orderDir)
                            ->take($count)
                            ->skip($page)
                            ->get();

        $count = Products::with('menu', 'office', 'moderator')
                         ->where($where)
                         ->count();

        $result = [];
        $totalData = $count;
        $totalFiltered = count($products);

        foreach ($products as $product) {
            $temp['id']   = (string) $product->id;
            $temp['menu'] = json_decode($product->menu->name, true)[App::getLocale()];

            if ($isAdmin) {
                $cityName = json_decode($product->office->city, true)[App::getLocale()];
                $temp['office']  = '<a href="/administration/offices/index/'.$product->office_id.'" title="'.$cityName.'">'.$cityName.'</a>';

                $temp['creator'] = '<a href="/administration/moderators/'.$product->creator_id.'" title="'.$product->moderator->username.'">'.$product->moderator->username.'</a>';
            } else {
                $temp['creator'] = $product->moderator->username;
            }

            $temp['title']      = str_limit(json_decode($product->title, true)[App::getLocale()], 27, '...');
            $temp['rating']     = $product->rating;
            $temp['show_my']    = $product->show_my ? 'Да' : 'Нет';
            $temp['created_at'] = empty($product->created_at) ? '<i class="text-danger">(нет данных)</i>' : date('Y-m-d H:i', $product->created_at->timestamp);

            $result[] = $temp;
        }

        return response()->json([
            'status'          => 'ok',
            'draw'            => $request->get('draw'),
            'recordsTotal'    => (string) $totalFiltered,
            'recordsFiltered' => (string) $totalData,
            'data'            => $result
        ]);
    }

    public function create()
    {
        $menu      = Menu::select('id', 'name AS text')->where('parent_exist', 0)->orderBy('weight', 'ASC')->get();
        $isAdmin   = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;
        $priceType = Prices::getMeasures();
        $offices   = null;

        if ($isAdmin) {
            $offices = Office::select('id', 'title AS text')->get();
        } else {
            $offices = Auth::guard('admin')->user()->office_id;
        }

        return view('backend.site.product-add', [
            'menu'      => $menu,
            'offices'   => $offices,
            'isAdmin'   => $isAdmin,
            'priceType' => $priceType,
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request, 'add', null);

        $product = new Products();
        $product->creator_id = Auth::guard('admin')->user()->id;
        $product->setData($request->all());

        if (!$product->save()) {
            session()->flash('error', 'Возникла ошибка при добавлении продукции.');
            return redirect()->back();
        }

        $product->addImage($request->file('images'));
        $product->addPrice($request->input('price'), $request->input('price_type'));

        session()->flash('success', 'Продукция добавлена');
        return redirect('/administration/products');
    }

    public function edit($products)
    {
        $product = Products::findOrFail($products);
        $product->getEditData();

        $menu      = Menu::select('id', 'name AS text')->where('parent_exist', 0)->orderBy('weight', 'ASC')->get();
        $isAdmin   = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;
        $prices    = $product->getEditPrices();
        $priceType = Prices::getMeasures();

        $offices   = null;

        if ($isAdmin) {
            $offices = Office::select('id', 'title AS text')->get();
        } else {
            if ($product->office_id != Auth::guard('admin')->user()->office_id) {
                return response()->view('errors.403');
            }

            $offices = Auth::guard('admin')->user()->office_id;
        }

        return view('backend.site.product-edit', [
            'product'   => $product,
            'menu'      => $menu,
            'isAdmin'   => $isAdmin,
            'prices'    => $prices,
            'priceType' => $priceType,
            'offices'   => $offices,
        ]);
    }

    public function update(Request $request, $products)
    {
        if (Auth::guard('admin')->user()->role != Admin::ROLE_ADMIN) {
            if ($request->input('office_id') != Auth::guard('admin')->user()->office_id) {
                return response()->view('errors.403');
            }
        }

        $this->validator($request, 'edit', $products);

        $data = $request->all();

        $product = Products::findOrFail($products);
        $product->setData($data);

        if (!$product->save()) {
            session()->flash('error', 'Возникла ошибка при изменении данных продукции');
            return redirect()->back();
        }

        if ($request->file('images')[0]) {
            $product->addImage($request->file('images'));
        }

        $product->editPrice($request->only('price_id', 'price', 'price_type'));

        session()->flash('success', 'Данные продукции изменены');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        if (Auth::guard('admin')->user()->role != Admin::ROLE_ADMIN) {
            if ($product->office_id != Auth::guard('admin')->user()->office_id) {
                return response()->view('errors.403');
            }
        }

        $product = Products::findOrFail($request->input('id'));

        if ($product->delete()) {
            session()->flash('success', 'Продукция удалена');
            return redirect('/administration/products');
        }

        session()->flash('error', 'Возникла ошибка при удалении продукции');
        return redirect()->back();
    }

    protected function validator($request, $action, $id)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['slug'], '-');

        $validator = Validator::make($data, [
            'images.*'     => 'image',
            'menu_id'      => 'required|exists:menu,id',
            'slug'         => 'required|unique:products,slug,' . $id,
            'title.en'     => 'string|min:3',
            'title.ru'     => 'string|min:3',
            'title.uk'     => 'string|min:3',
            'price.*'      => 'required|numeric',
            'rating'       => 'integer',
            'price_type.*' => 'required_with:' . Prices::listMeasures(),
        ]);

        $validator->after(function($validator) use ($request, $action) {
            if ( ($action == 'add') && empty($request->file('images')[0])) {
                $validator->errors()->add('images.0', 'Загрузите хотя бы одно изображение');
            }

            if ( empty($request->input('title.en')) && empty($request->input('title.ru')) && empty($request->input('title.uk')) )  {
                $validator->errors()->add('title.ru', 'Поле "Заголовок" обязательно для заполнения');
            }
        });

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            $this->throwValidationException($request, $validator);
        }
    }

    public function show($id)
    {
        $product = Products::findOrFail($id);
        $product = $product->getViewData();
        $rating  = Rating::getRating($product['id']);

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

        return view('backend.products.product-view', [
            'data'    => $data,
            'rating'  => $rating,
            'product' => $product,
        ]);
    }

}
