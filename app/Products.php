<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;
use Auth;

class Products extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'office_id',
        'slug',
        'slug_menu',

        'title',
        'description',
        'rating',
        'show_my',

        'creator_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dateFormat = 'U';

    // this is a recommended way to declare event handlers
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($product){
            $images = Images::where('product_id', $product->id)->get();

            foreach ($images as $key => $img) {
                $img->delete();
            }
        });
    }

    public function menu()
    {
        return $this->hasOne('App\Menu', 'id', 'menu_id');
    }

    public function office()
    {
        return $this->hasOne('App\Office', 'id', 'office_id');
    }

    public function moderator()
    {
        return $this->hasOne('App\Admin', 'id', 'creator_id');
    }

    public function images()
    {
        return $this->hasMany('App\Images', 'product_id', 'id')->select('name')->orderBy('weight', 'ASC');
    }

    public function prices()
    {
        return $this->hasMany('App\Prices', 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('App\Orders', 'orders_products', 'order_id', 'product_id');
    }


    // формируем данные для отображения в форме редактирвоания
    public static function parseData($id)
    {
        $product = Products::findOrFail($id);

        $array["id"] = $product->id;

        $array['images'] = Images::where('product_id', $product->id)->orderBy('weight', 'ASC')->get();

        $array['menu_id']   = $product->menu_id;
        $array['office_id'] = $product->office_id;

        $title = json_decode($product->title, true);
        $array['title_en'] = $title['en'];
        $array['title_ru'] = $title['ru'];
        $array['title_uk'] = $title['uk'];

        $titleName = array_filter($title);
        $array['title_name'] = empty($titleName[App::getLocale()]) ? current($titleName) : $titleName[App::getLocale()];

        $description = json_decode($product->description, true);
        $array['description_en'] = $description['en'];
        $array['description_ru'] = $description['ru'];
        $array['description_uk'] = $description['uk'];

        $array['rating'] = $product->rating;
        $array['show_my'] = $product->show_my;

        return $array;
    }

    // создание|редактирование продукции
    public static function actionProduct($id, $data)
    {
        if (empty($id)) {
            $product = new Products();
            $product->creator_id = Auth::guard('admin')->user()->id;
        } else {
            $product = Products::findOrFail($id);
        }

        $menu = Menu::find($data['menu_id']);

        $product->menu_id = $data['menu_id'];
        $product->office_id = $data['office_id'];

        if (!empty($data['title_en'])) {
            $product->slug = str_slug($data['title_en'], '_');
        } elseif (!empty($data['title_ru'])) {
            $product->slug = str_slug($data['title_ru'], '_');
        } elseif (!empty($data['title_uk'])) {
            $product->slug = str_slug($data['title_en'], '_');
        }

        $product->slug_menu = empty($menu->slug) ? 'catalog' : $menu->slug;

        $array['en'] = $data['title_en'];
        $array['ru'] = $data['title_ru'];
        $array['uk'] = $data['title_uk'];
        $product->title = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['description_en'];
        $array['ru'] = $data['description_ru'];
        $array['uk'] = $data['description_uk'];
        $product->description = json_encode($array, JSON_UNESCAPED_UNICODE);

        $product->rating  = $data['rating'];
        $product->show_my = ($data['show_my'] == 'on') ? 1 : 0;

        if ($product->save()) {
            return $product;
        } else {
            return false;
        }
    }

    // формирование данных для вывода пользователю
    public static function viewData($id)
    {
        $product = Products::find($id);

        if (empty($product)) {
            return false;
        }

        return Products::toArrayProduct($product);
    }

    public static function viewDataAll($products)
    {
        if (empty($products)) {
            return null;
        }

        $result = [];

        foreach ($products as $product) {
            $temp = Products::toArrayProduct($product);

            $temp['images']      = '/images/products/'.$temp['images'][0]['name'];
            $temp['description'] = $temp['description'];

            $result[] = $temp;
        }

        return $result;
    }

    public static function viewDataJson($products)
    {
        if (empty($products)) {
            return null;
        }

        $result = [];

        foreach ($products as $product) {
            $product = Products::toArrayProduct($product);

            $temp['id']     = (string) $product['id'];
            $temp['images'] = '/images/products/'.$product['images'][0]['name'];
            $temp['title']  = $product['title'];
            $temp['description'] = $product['description'];
            $temp['work_link']   = "/catalog/details/".$product['slug_menu']."/".$product['slug']."/".$product['id'];
            $temp['price']       = $product['price'];
            $temp['price_type']  = trans('products.measures.'.$product['price_type']);

            $temp['office_title'] = $product['office_title'];
            $temp['office_linck'] = '/office/'.$product['office_city'].'/'.$product['office']['id'];

            $temp['quantity'] = $product['quantity'];
            $temp['bonds'] = $product['bonds'];

            $result[] = $temp;
        }

        return $result;
    }

    protected static function toArrayProduct($product)
    {
        $array['id'] = $product->id;
        $array['menu_id'] = $product->menu_id;

        $array['images'] = $product->images->toArray();
        $array['office'] = $product->office->toArray();

        $officeTitle = json_decode($array['office']['title'], true);
        $officeTitle = array_filter($officeTitle);
        $array['office_title'] = empty($officeTitle[App::getLocale()]) ? current($officeTitle) : $officeTitle[App::getLocale()];

        $officeCity = json_decode($array['office']['city'], true)['en'];
        $array['office_city'] = str_slug($officeCity, '_');

        $array['slug']      = $product->slug;
        $array['slug_menu'] = $product->slug_menu;

        $title = json_decode($product->title, true);
        $title = array_filter($title);
        $array['title'] = empty($title[App::getLocale()]) ? current($title) : $title[App::getLocale()];

        $description = json_decode($product->description, true);
        $description = array_filter($description);
        $array['description'] = empty($description[App::getLocale()]) ? current($description) : $description[App::getLocale()];

        $array['quantity'] = empty($product->pivot->quantity) ? null : $product->pivot->quantity;
        $array['bonds'] = empty($product->pivot->id) ? null : $product->pivot->id;

        return $array;
    }
}
