<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App;
use Auth;
use Validator;

use App\Menu;
use App\Admin;
use App\Locale;
use App\Office;
use App\Images;
use App\Products;

class ProductsController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('language');
    }

    public function getAll()
    {
        $menu = [];
        $city = [];
        $pageSize = 20;
        $products = Products::paginate($pageSize);
        $isAdmin  = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;

        foreach ($products as $key => $product) {
            $menu[] = json_decode($product->menu->name, true)[App::getLocale()];
            $city[] = json_decode($product->office->city, true)[App::getLocale()];
        }
        $menu = array_unique($menu);
        $city = array_unique($city);

        return view('backend.site.products', [
            'language' => Locale::getLocaleName(),
            'menu'     => $menu,
            'city'     => $city,
            'products' => $products,
            'isAdmin'  => $isAdmin,
        ]);
    }

    public function addForm()
    {
        // $menu = Menu::select('id', 'name AS text')->where('parent_exist', 0)->orderBy('weight', 'ASC')->get();
        $menu = Menu::select('id', 'name AS text')->orderBy('weight', 'ASC')->get();

        if (Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN) {
            $offices = Office::select('id', 'title AS text')->get();
        } else {
            $offices = Office::select('id', 'title AS text')
                             ->where('id', Auth::guard('admin')->user()->office_id)
                             ->get();
        }

        return view('backend.site.product-add', [
            'menu' => $menu,
            'offices' => $offices,
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'images.*' => 'required|image',

            'title_en' => 'string|min:3',
            'title_ru' => 'string|min:3',
            'title_uk' => 'string|min:3',

            'description_en' => 'string|min:10',
            'description_ru' => 'string|min:10',
            'description_uk' => 'string|min:10',

            'price' => 'required|numeric',
            'rating' => 'integer',
        ]);

        $validator->after(function($validator) {
            $attr = $validator->attributes();
            if (empty($attr['title_en']) && empty($attr['title_ru']) && empty($attr['title_uk'])) {
                $validator->errors()->add('title_ru', 'Поле "Заголовок" обязательно для заполнения.');
            }

            if (empty($attr['description_en']) && empty($attr['description_ru']) && empty($attr['description_uk'])) {
                $validator->errors()->add('description_ru', 'Поле "Описание" обязательно для заполнения.');
            }
        });

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());

            $this->throwValidationException(
                $request, $validator
            );
        }

        if ($product = $this->actionProduct(null, $request->all())) {
            foreach ($request->file('images') as $img) {
                $path = 'images/products/';
                $name = time().'_'.$img->getClientOriginalName();

                if ($img->move($path, $name)) {
                    $imgModel = new Images();
                    $imgModel->product_id = $product->id;
                    $imgModel->name = $name;
                    $imgModel->save();
                }
            }

            session()->flash('success', "Продукция добавлена.");
            return redirect('/administration/products');
        }

        session()->flash('error', 'Возникла ошибка при добавлении продукции.');
        return redirect()->back();
    }

    protected function actionProduct($id, $data)
    {
        if (empty($id)) {
            $product = new Products();
        } else {
            $product = Products::findOrFail($id);
        }

        $product->menu_id = $data['menu_id'];
        $product->office_id = $data['office_id'];

        $array['en'] = $data['title_en'];
        $array['ru'] = $data['title_ru'];
        $array['uk'] = $data['title_uk'];
        $product->title = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['description_en'];
        $array['ru'] = $data['description_ru'];
        $array['uk'] = $data['description_uk'];
        $product->description = json_encode($array, JSON_UNESCAPED_UNICODE);

        $product->price   = $data['price'];
        $product->rating  = $data['rating'];
        $product->show_my = $data['show_my'];

        $product->creator_id = Auth::guard('admin')->user()->id;

        if ($product->save()) {
            return $product;
        } else {
            return false;
        }
    }


    public function delete(Request $request)
    {
        if (Products::destroy($request->input('id')) ) {
            session()->flash('success', 'Продукция удалена.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении продукции.');
        }

        return redirect('/administration/products');
    }
}