<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;
use Auth;
use Language;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'menu_id',
        'office_id',
        
        'slug',
        'title',
        'description',

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

    ////////////

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

    public function imagesEdit()
    {
        return $this->hasMany('App\Images', 'product_id', 'id')->orderBy('weight', 'ASC');
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

    public static function getEditData($id) 
    {
        $product = Products::find($id);

        if (empty($product)) {
            return false;
        }

        $array = $product->toArray();
        $array['images'] = $product->imagesEdit->toArray();

        $array['title']       = json_decode($product->title, true);
        $array['description'] = json_decode($product->description, true);
        $array['steel_grade'] = json_decode($product->steel_grade, true);
        $array['sawing']      = json_decode($product->sawing, true);
        $array['standard']    = json_decode($product->standard, true);
        $array['diameter']    = json_decode($product->diameter, true);
        $array['height']      = json_decode($product->height, true);
        $array['width']       = json_decode($product->width, true);
        $array['thickness']   = json_decode($product->thickness, true);
        $array['section']     = json_decode($product->section, true);
        $array['coating']     = json_decode($product->coating, true);
        $array['view']        = json_decode($product->view, true);
        $array['brinell_hardness'] = json_decode($product->brinell_hardness, true);

        return $array;
    }

    public static function actionProductNew($id, $data)
    {
        if (empty($id)) {
            $product = new Products();
            $product->creator_id = Auth::guard('admin')->user()->id;
        } else {
            $product = Products::find($id);

            if (empty($product)) {
                return false;
            }
        }

        $menu = Menu::find($data['menu_id']);

        if (empty($menu)) {
            return false;
        }

        $product->menu_id   = $data['menu_id'];
        $product->office_id = $data['office_id'];
        $product->slug      = str_slug($data['slug'], '-');;
        $product->rating    = $data['rating'];
        $product->show_my   = (!empty($data['show_my']) && ($data['show_my'] == 'on')) ? 1 : 0;
        $product->in_stock  = (!empty($data['in_stock']) && ($data['in_stock'] == 'on')) ? 1 : 0;

        $product->title       = json_encode($data['title'], JSON_UNESCAPED_UNICODE);
        $product->description = json_encode($data['description'], JSON_UNESCAPED_UNICODE);

        $product->steel_grade = json_encode($data['steel_grade'], JSON_UNESCAPED_UNICODE);
        $product->sawing      = json_encode($data['sawing'], JSON_UNESCAPED_UNICODE);
        $product->standard    = json_encode($data['standard'], JSON_UNESCAPED_UNICODE);
        $product->diameter    = json_encode($data['diameter'], JSON_UNESCAPED_UNICODE);
        $product->height      = json_encode($data['height'], JSON_UNESCAPED_UNICODE);
        $product->width       = json_encode($data['width'], JSON_UNESCAPED_UNICODE);
        $product->thickness   = json_encode($data['thickness'], JSON_UNESCAPED_UNICODE);
        $product->section     = json_encode($data['section'], JSON_UNESCAPED_UNICODE);
        $product->coating     = json_encode($data['coating'], JSON_UNESCAPED_UNICODE);
        $product->view        = json_encode($data['view'], JSON_UNESCAPED_UNICODE);
        $product->brinell_hardness = json_encode($data['brinell_hardness'], JSON_UNESCAPED_UNICODE);

        if ($product->save()) {
            return $product;
        } else {
            return false;
        }
    }

    public static function getViewProducts($products)
    {
        $result = [];

        foreach ($products as $product) {
            $result[] = self::converData($product);
        }

        return $result;
    }

    protected static function converData($product)
    {
        $locale = in_array(App::getLocale(), ['en', 'uk']) ? '/' . App::getLocale() : '';

        $array['id']     = $product->id;
        $array['images'] = self::getImages($product->images->toArray());
        $array['title']  = Language::getArraySoft($product->title);
        $array['description'] = Language::getArraySoft($product->description);

        $array['work_link'] = $locale . $product->menu->full_path_slug . '/' . $product->slug;

        $array['office_id']    = $product->office->id; // admin panel view
        $array['office_title'] = Language::getArraySoft($product->office->title);
        $array['office_linck'] = $locale . '/office/' . $product->office->slug;

        $priceArray = $product->prices->toArray();

        $array['prices'] = self::getPrices($priceArray);

        $agreed = array_filter($priceArray, function($innerArray) {
            return $innerArray['type'] == 'agreed';
        });

        $array['prices_type'] = $agreed ? true : false;

        // parameters for the order
        $array['quantity'] = empty($product->pivot->quantity) ? null : $product->pivot->quantity;
        $array['price_id'] = empty($product->pivot->price_id) ? null : $product->pivot->price_id;
        $array['bonds']    = empty($product->pivot->id) ? null : $product->pivot->id;
        $array['order_prices'] = self::getOrderPrices($priceArray); // it needs improvement

        $array['in_stock'] = $product->in_stock;

        $array['steel_grade'] = Language::getArraySoft($product->steel_grade);
        $array['sawing']      = Language::getArraySoft($product->sawing);
        $array['standard']    = Language::getArraySoft($product->standard);
        $array['diameter']    = Language::getArraySoft($product->diameter);
        $array['height']      = Language::getArraySoft($product->height);
        $array['width']       = Language::getArraySoft($product->width);
        $array['thickness']   = Language::getArraySoft($product->thickness);
        $array['section']     = Language::getArraySoft($product->section);
        $array['coating']     = Language::getArraySoft($product->coating);
        $array['view']        = Language::getArraySoft($product->view);
        $array['brinell_hardness'] = Language::getArraySoft($product->brinell_hardness);

        return $array;
    }

    protected static function getImages($images)
    {
        $result = [];

        foreach ($images as $img) {
            $result[] = '/images/products/' . $img['name'];
        }

        return $result;
    }

    protected static function getPrices($prices)
    {
        $result = [];

        foreach ($prices as $price) {
            $array = [];

            $array['id']        = $price['id'];
            $array['type']      = trans('products.measures.' . $price['type']);
            $array['type_view'] = $price['type'];
            $array['price']     = $price['price'];

            $result[] = $array;
        }

        return $result;
    }

    public static function getOrderPrices($prices)
    {
        $result = [];

        foreach ($prices as $price) {
            $result[$price['id']]['type']      = $price['type'];
            $result[$price['id']]['type_view'] = trans('products.measures.' . $price['type']);
            $result[$price['id']]['price']     = $price['price'];
        }

        return $result;
    }
}
