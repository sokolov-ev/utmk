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
        'title',
        'rating',
        'show_my',
        'creator_id',

        'steel_grade',
        'sawing',
        'standard',
        'diameter',
        'height',
        'width',
        'thickness',
        'section',
        'coating',
        'view',
        'brinell_hardness',
        'in_stock'
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
            $prices = Prices::where('product_id', $product->id)->get();

            foreach ($images as $key => $img) {
                $img->delete();
            }

            foreach ($prices as $key => $price) {
                $price->delete();
            }


        });
    }

    public function menu()
    {
        return $this->hasOne('App\Menu', 'id', 'menu_id');
    }

    public function metatags()
    {
        return $this->hasOne('App\Metatags', 'slug', 'slug')->where('type', 'product');
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

    public function price()
    {
        return $this->hasOne('App\Prices', 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('App\Orders', 'orders_products', 'order_id', 'product_id');
    }


    // формируем данные для отображения в форме редактирвоания
    public static function parseData($id)
    {
        $product = Products::findOrFail($id);

        $array['id']     = $product->id;
        $array['images'] = Images::where('product_id', $product->id)->orderBy('weight', 'ASC')->get();
        $array['slug']   = $product->slug;

        $array['menu_id']   = $product->menu_id;
        $array['office_id'] = $product->office_id;

        $title = json_decode($product->title, true);
        $array['title_en'] = $title['en'];
        $array['title_ru'] = $title['ru'];
        $array['title_uk'] = $title['uk'];

        $titleName = array_filter($title);
        $array['title_name'] = empty($titleName[App::getLocale()]) ? current($titleName) : $titleName[App::getLocale()];

        $array['rating']      = $product->rating;
        $array['show_my']     = $product->show_my;

        $array['in_stock']    = $product->in_stock;
        $array['steel_grade'] = $product->steel_grade;
        $array['sawing']      = $product->sawing;
        $array['standard']    = $product->standard;
        $array['diameter']    = $product->diameter;
        $array['height']      = $product->height;
        $array['width']       = $product->width;
        $array['thickness']   = $product->thickness;
        $array['section']     = $product->section;
        $array['coating']     = $product->coating;
        $array['view']        = $product->view;
        $array['brinell_hardness'] = $product->brinell_hardness;
        
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

        $product->slug = $data['slug'];

        $array['en'] = $data['title_en'];
        $array['ru'] = $data['title_ru'];
        $array['uk'] = $data['title_uk'];
        $product->title = json_encode($array, JSON_UNESCAPED_UNICODE);

        $product->rating  = $data['rating'];
        $product->show_my = ($data['show_my'] == 'on') ? 1 : 0;

        $product->in_stock    = $data['in_stock'];
        $product->steel_grade = $data['steel_grade'];
        $product->sawing      = $data['sawing'];
        $product->standard    = $data['standard'];
        $product->diameter    = $data['diameter'];
        $product->height      = $data['height'];
        $product->width       = $data['width'];
        $product->thickness   = $data['thickness'];
        $product->section     = $data['section'];
        $product->coating     = $data['coating'];
        $product->view        = $data['view'];
        $product->brinell_hardness = $data['brinell_hardness'];

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
            $temp['images'] = '/images/products/'.$temp['images'][0]['name'];

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

            if (in_array(App::getLocale(), ['en', 'uk'])) {
                $temp['work_link'] = '/'.App::getLocale().$product['menu']['full_path_slug'].'/'.$product['slug'];
            } else {
                $temp['work_link'] = $product['menu']['full_path_slug'].'/'.$product['slug'];
            }

            $flag  = false;
            $array = [];
            $temp['prices'] = [];

            foreach ($product['prices'] as $key => $price) {
                $array['id']    = $price['id'];
                $array['type']  = trans('products.measures.'.$price['type']);
                $array['price'] = $price['price'];

                $temp['prices_json'][$key] = $array;
                $temp['prices'][$price['id']] = $array;

                if ($price['type'] == 'agreed') {
                    $flag = true;
                }
            }

            $temp['prices_type'] = $flag;

            $temp['office_title'] = $product['office_title'];
            $temp['office_linck'] = '/office/'.$product['office_city'].'/'.$product['office_id'];

            $temp['quantity'] = $product['quantity'];
            $temp['price_id'] = $product['price_id'];
            $temp['bonds']    = $product['bonds'];

            $temp['in_stock']    = $product['in_stock'];
            $temp['steel_grade'] = $product['steel_grade'];
            $temp['sawing']      = $product['sawing'];
            $temp['standard']    = $product['standard'];
            $temp['diameter']    = $product['diameter'];
            $temp['height']      = $product['height'];
            $temp['width']       = $product['width'];
            $temp['thickness']   = $product['thickness'];
            $temp['section']     = $product['section'];
            $temp['coating']     = $product['coating'];
            $temp['view']        = $product['view'];
            $temp['brinell_hardness'] = $product['brinell_hardness'];

            $result[] = $temp;
        }

        return $result;
    }

    protected static function toArrayProduct($product)
    {
        $array['id'] = $product->id;
        $array['menu'] = $product->menu->toArray();

        $array['images'] = $product->images->toArray();

        $office = $product->office->toArray();
        $array['office_id'] = $office['id'];

        $officeTitle = json_decode($office['title'], true);
        $officeTitle = array_filter($officeTitle);
        $array['office_title'] = empty($officeTitle[App::getLocale()]) ? current($officeTitle) : $officeTitle[App::getLocale()];

        $officeCity = json_decode($office['city'], true)['en'];
        $array['office_city'] = str_slug($officeCity, '_');

        $array['slug'] = $product->slug;

        $title = json_decode($product->title, true);
        $title = array_filter($title);
        $array['title']  = empty($title[App::getLocale()]) ? current($title) : $title[App::getLocale()];

        $array['prices'] = $product->prices->toArray();

        $array['quantity'] = empty($product->pivot->quantity) ? null : $product->pivot->quantity;
        $array['price_id'] = empty($product->pivot->price_id) ? null : $product->pivot->price_id;
        $array['bonds']    = empty($product->pivot->id) ? null : $product->pivot->id;

        $array['in_stock']    = $product->in_stock;
        $array['steel_grade'] = $product->steel_grade;
        $array['sawing']      = $product->sawing;
        $array['standard']    = $product->standard;
        $array['diameter']    = $product->diameter;
        $array['height']      = $product->height;
        $array['width']       = $product->width;
        $array['thickness']   = $product->thickness;
        $array['section']     = $product->section;
        $array['coating']     = $product->coating;
        $array['view']        = $product->view;
        $array['brinell_hardness'] = $product->brinell_hardness;

        return $array;
    }
}
