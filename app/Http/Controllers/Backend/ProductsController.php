<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

use DB;
use App;
use Auth;
use Validator;

use App\Menu;
use App\Admin;
use App\Locale;
use App\Office;
use App\Images;
use App\Prices;
use App\Products;
use App\DataTable;

class ProductsController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('language');
    }

    public function index(Request $request)
    {
        $id = $request->input('id');
        $menu = [];
        $city = [];
        $isAdmin = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;

        if ($isAdmin) {
            $products = Products::all();
        } else {
            $products = Products::where('office_id', Auth::guard('admin')->user()->office_id)->get();
        }

        foreach ($products as $key => $product) {
            $menu[$product->menu_id]   = json_decode($product->menu->name, true)[App::getLocale()];
            $city[$product->office_id] = json_decode($product->office->city, true)[App::getLocale()];
        }

        $menu = array_unique($menu);
        $city = array_unique($city);

        return view('backend.site.products', [
            'id'      => $id,
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

    public function addForm()
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

    public function add(Request $request)
    {
        $this->validator($request, 'add');

        if ($product = Products::actionProductNew(null, $request->all())) {
            Images::addImages($product->id, $request->file('images'));
            Prices::createPrice($product->id, $request->input('price'), $request->input('price_type'));
            session()->flash('success', "Продукция добавлена.");
            return redirect('/administration/products');
        }

        session()->flash('error', 'Возникла ошибка при добавлении продукции.');
        return redirect()->back();
    }

    public function editForm($id)
    {
        $product   = Products::getEditData($id);
        $menu      = Menu::select('id', 'name AS text')->where('parent_exist', 0)->orderBy('weight', 'ASC')->get();
        $isAdmin   = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;
        $priceType = Prices::getMeasures();
        $prices    = Prices::parseData($product["id"]);
        $offices   = null;

        if ($isAdmin) {
            $offices = Office::select('id', 'title AS text')->get();
        } else {
            if ($product['office_id'] != Auth::guard('admin')->user()->office_id) {
                return response()->view('errors.403');
            }

            $offices = Auth::guard('admin')->user()->office_id;
        }

        return view('backend.site.product-edit', [
            'menu'      => $menu,
            'offices'   => $offices,
            'product'   => $product,
            'isAdmin'   => $isAdmin,
            'priceType' => $priceType,
            'prices'    => $prices,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->validator($request, 'edit');

        if ( Auth::guard('admin')->user()->role != Admin::ROLE_ADMIN ) {
            if ( $request->input('office_id') != Auth::guard('admin')->user()->office_id ) {
                return response()->view('errors.403');
            }
        }

        if ($product = Products::actionProductNew($id, $request->all())) {
            Images::addImages($product->id, $request->file('images'));
            Prices::editPrices($product->id, $request->all());
            session()->flash('success', "Данные продукции изменены.");
        } else {
            session()->flash('error', 'Возникла ошибка при изменении данных продукции.');    
        }

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $user    = Auth::guard('admin')->user();
        $product = Products::find($request->input('id'));

        if (empty($product)) {
            session()->flash('error', 'Продукция не найдена.');
        }

        if ( ($user->role == Admin::ROLE_ADMIN) || ($product->office_id == $user->office_id) ) {
            if ($product->delete()) {
                session()->flash('success', 'Продукция удалена.');
            } else {
                session()->flash('error', 'Возникла ошибка при удалении продукции.');
            }
        } else {
            session()->flash('warning', 'Нет доступа.');
        }

        return redirect('/administration/products');
    }

    protected function validator($request, $action)
    {
        $id = $request->input('id');
        $data = $request->all();
        $data['slug'] = str_slug($data['slug'], '-');

        $validator = Validator::make($data, [
            'images.*' => 'image',

            'slug' => 'required|unique:products,slug,'.$id,

            'title.en' => 'string|min:3',
            'title.ru' => 'string|min:3',
            'title.uk' => 'string|min:3',

            'price.*' => 'required|numeric',
            'price_type.*' => 'required_with:'.Prices::listMeasures(),

            'rating' => 'integer',
        ]);

        $validator->after(function($validator) use ($request, $action) {
            if ( ($action == 'add') && empty($request->file('images')[0])) {
                $validator->errors()->add('images.0', 'Загрузите хотя бы одно изображение.');
            }

            if ( empty($request->input('title.en')) && empty($request->input('title.ru')) && empty($request->input('title.uk')) )  {
                $validator->errors()->add('title.ru', 'Поле "Заголовок" обязательно для заполнения.');
            }
        });

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());

            $this->throwValidationException(
                $request, $validator
            );
        }
    }

    public function downloadImg($id)
    {
        $img = Images::find($id);

        if ( empty($img) ) {
            session()->flash('error', 'Изображение не найдено.');
            return redirect()->back();
        }

        return response()->download('images/products/'.$img->name);
    }

    public function sortImg(Request $request)
    {
        if (empty($request->input('id')) || empty($request->input('weight'))) {
            return response()->json(['status' => 'bad', 'message' => 'Недостаточно данных для сортировки.']);
        }

        $weight = $request->input('weight');

        foreach ($request->input('id') as $key => $id) {
            Images::where('id', $id)->update(['weight' => $weight[$key]]);
        }

        return response()->json(['status' => 'ok', 'message' => 'ok.']);
    }

    public function deleteImg(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $img  = Images::find($request->input('id'));

        if (empty($img)) {
            return response()->json(['status' => 'bad', 'message' => 'Изображение не найдено.']);
        }

        if ( Images::where('product_id', $img->product_id)->count() == 1 ) {
            return response()->json(['status' => 'bad', 'message' => 'Невозможно удалить последнее изображение.']);
        }

        if ( ($user->role == Admin::ROLE_ADMIN) || ($img->office_id == $user->office_id) ) {
            if ($img->delete()) {
                return response()->json(['status' => 'ok', 'message' => 'Изображение удалено.']);
            } else {
                return response()->json(['status' => 'bad', 'message' => 'Возникла ошибка при удалении изображения.']);
            }
        } else {
            return response()->json(['status' => 'bad', 'message' => 'Нет доступа.']);
        }
    }

    public function getProduct($id)
    {
        $product = Products::findOrFail($id);
        $product = Products::converData($product);

        return response()->json([
            'status' => 'ok', 
            'product' => $product,
        ]);
    }
}