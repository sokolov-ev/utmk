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

    public function filtering(Request $request)
    {
        var_dump($request->all());

        // $result = [];
        // $role = Admin::getRoleTable();
        // $status = Admin::getStatus();
        // $moderators = Admin::all();

        // foreach ($moderators as $key => $moderator) {
        //     $moderator->buttons  = '
        //         <button class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>
        //         <button class="btn btn-danger btn-sm"
        //                 data-target=".delete-moderator"
        //                 data-toggle="modal"
        //                 data-id="'.$moderator->id.'"
        //                 data-name="'.$moderator->username.'">
        //             <i class="fa fa-trash-o" aria-hidden="true"></i>
        //         </button>';
        //     $moderator->role = $role[$moderator->role];
        //     $moderator->status = empty($moderator->status) ? '<i class="text-danger">(нет данных)</i>' : $status[$moderator->status];
        //     $moderator->activity = empty($moderator->activity) ? '<i class="text-danger">(нет данных)</i>' : date('H:i d-m-Y', +$moderator->activity);
        //     $moderator->date_created = date('d-m-Y', $moderator->created_at->getTimestamp());
        //     $result[] = $moderator;
        // }

        // return '{"data":'.json_encode($result, JSON_UNESCAPED_UNICODE).'}';
    }

    public function getAll()
    {
        $menu = [];
        $city = [];
        $pageSize = 100;
        $isAdmin  = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;

        if ($isAdmin) {
            $products = Products::paginate($pageSize);
        } else {
            $products = Products::where('office_id', Auth::guard('admin')->user()->office_id)->paginate($pageSize);
        }

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
        $menu    = Menu::select('id', 'name AS text')->orderBy('weight', 'ASC')->get();
        $isAdmin = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;
        $offices = null;

        if ($isAdmin) {
            $offices = Office::select('id', 'title AS text')->get();
        } else {
            $offices = Auth::guard('admin')->user()->office_id;
        }

        return view('backend.site.product-add', [
            'menu' => $menu,
            'offices' => $offices,
            'isAdmin' => $isAdmin,
        ]);
    }

    public function add(Request $request)
    {
        $this->validator($request, 'add');

        if ($product = Products::actionProduct(null, $request->all())) {
            Images::addImages($product->id, $request->file('images'));
            session()->flash('success', "Продукция добавлена.");
            return redirect('/administration/products');
        }

        session()->flash('error', 'Возникла ошибка при добавлении продукции.');
        return redirect()->back();
    }

    public function editForm($id)
    {
        $product = Products::parseData($id);
        $menu    = Menu::select('id', 'name AS text')->orderBy('weight', 'ASC')->get();
        $isAdmin = Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN;
        $offices = null;

        if ($isAdmin) {
            $offices = Office::select('id', 'title AS text')->get();
        } else {
            if ($product['office_id'] != Auth::guard('admin')->user()->office_id) {
                return response()->view('errors.403');
            }

            $offices = Auth::guard('admin')->user()->office_id;
        }

        return view('backend.site.product-edit', [
            'menu' => $menu,
            'offices' => $offices,
            'product' => $product,
            'isAdmin' => $isAdmin,
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

        if ($product = Products::actionProduct($id, $request->all())) {
            Images::addImages($product->id, $request->file('images'));
            session()->flash('success', "Данные продукции изменены.");
            return redirect('/administration/products');
        }

        session()->flash('error', 'Возникла ошибка при изменении данных продукции.');
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
        $validator = Validator::make($request->all(), [
            'images.*' => 'image',

            'title_en' => 'string|min:3',
            'title_ru' => 'string|min:3',
            'title_uk' => 'string|min:3',

            'description_en' => 'string|min:10',
            'description_ru' => 'string|min:10',
            'description_uk' => 'string|min:10',

            'price' => 'required|numeric',
            'rating' => 'integer',
        ]);

        $validator->after(function($validator) use ($request, $action) {
            if ( ($action == 'add') && empty($request->file('images')[0])) {
                $validator->errors()->add('images.0', 'Загрузите хотя бы одно изображение.');
            }

            if ( empty($request->input('title_en')) && empty($request->input('title_ru')) && empty($request->input('title_uk')) )  {
                $validator->errors()->add('title_ru', 'Поле "Заголовок" обязательно для заполнения.');
            }

            if ( empty($request->input('description_en')) && empty($request->input('description_ru')) && empty($request->input('description_uk')) ) {
                $validator->errors()->add('description_ru', 'Поле "Описание" обязательно для заполнения.');
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
        $product = Products::viewData($id);
        $images  = [];
        $office  = [];

        if (empty($product)) {
            return response()->json(['status' => 'bad', 'message' => 'Продукция не найдена.']);
        }

        if ( Auth::guard('admin')->user()->role != Admin::ROLE_ADMIN ) {
            if ( $product['office']['id'] != Auth::guard('admin')->user()->office_id ) {
                return response()->json(['status' => 'bad', 'message' => 'Нет доступа.']);
            }
        }

        foreach ($product['images'] as $key => $img) {
            $temp['key']  = ($key == 0) ? true : false;
            $temp['name'] = $img['name'];
            $images[] = $temp;
        }
        $product['images'] = $images;

        if (Auth::guard('admin')->user()->role == Admin::ROLE_ADMIN) {
            $office['id'] = $product['office']['id'];
        } else {
            $office['id'] = false;
        }
        $office['office_work_title'] = trans('offices.office');
        $office['title'] = json_decode($product['office']['title'], true)[App::getLocale()];

        $product['office'] = $office;

        return response()->json(['status' => 'ok', 'data' => $product]);
    }

    public function view()
    {
        $product = Products::viewData(3);

        return view('backend.site.product-view', [
            'product' => $product,
        ]);
    }
}