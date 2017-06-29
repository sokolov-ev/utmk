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
        'in_stock',
        'class',
    ];

    protected $hidden = [];

    protected $dateFormat = 'U';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($product){
            $product->images()->delete();
            $product->prices()->delete();
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

    // public function imagesEdit()
    // {
    //     return $this->hasMany('App\Images', 'product_id', 'id')->orderBy('weight', 'ASC');
    // }

    // public function images()
    // {
    //     return $this->hasMany('App\Images', 'product_id', 'id')->select('name')->orderBy('weight', 'ASC');
    // }

    public function images()
    {
        return $this->hasMany('App\Images', 'owner_id')->where('type', 'products')->orderBy('weight', 'ASC');
    }

    public function prices()
    {
        return $this->hasMany('App\Prices', 'product_id');
    }

    public function price()
    {
        return $this->hasOne('App\Prices', 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('App\Orders', 'orders_products', 'order_id', 'product_id');
    }

    public function getEditData()
    {
        $this->images           = $this->images->toArray();
        $this->title            = json_decode($this->title, true);
        $this->description      = json_decode($this->description, true);
        $this->steel_grade      = json_decode($this->steel_grade, true);
        $this->sawing           = json_decode($this->sawing, true);
        $this->standard         = json_decode($this->standard, true);
        $this->diameter         = json_decode($this->diameter, true);
        $this->height           = json_decode($this->height, true);
        $this->width            = json_decode($this->width, true);
        $this->thickness        = json_decode($this->thickness, true);
        $this->section          = json_decode($this->section, true);
        $this->coating          = json_decode($this->coating, true);
        $this->view             = json_decode($this->view, true);
        $this->brinell_hardness = json_decode($this->brinell_hardness, true);
        $this->class            = json_decode($this->class, true);
    }

    public function setData($data)
    {
        $this->menu_id          = $data['menu_id'];
        $this->office_id        = $data['office_id'];
        $this->slug             = str_slug($data['slug'], '-');;
        $this->rating           = $data['rating'];
        $this->show_my          = (!empty($data['show_my']) && ($data['show_my'] == 'on')) ? 1 : 0;
        $this->in_stock         = (!empty($data['in_stock']) && ($data['in_stock'] == 'on')) ? 1 : 0;
        $this->title            = json_encode($data['title'], JSON_UNESCAPED_UNICODE);
        $this->description      = json_encode($data['description'], JSON_UNESCAPED_UNICODE);
        $this->steel_grade      = json_encode($data['steel_grade'], JSON_UNESCAPED_UNICODE);
        $this->sawing           = json_encode($data['sawing'], JSON_UNESCAPED_UNICODE);
        $this->standard         = json_encode($data['standard'], JSON_UNESCAPED_UNICODE);
        $this->diameter         = json_encode($data['diameter'], JSON_UNESCAPED_UNICODE);
        $this->height           = json_encode($data['height'], JSON_UNESCAPED_UNICODE);
        $this->width            = json_encode($data['width'], JSON_UNESCAPED_UNICODE);
        $this->thickness        = json_encode($data['thickness'], JSON_UNESCAPED_UNICODE);
        $this->section          = json_encode($data['section'], JSON_UNESCAPED_UNICODE);
        $this->coating          = json_encode($data['coating'], JSON_UNESCAPED_UNICODE);
        $this->view             = json_encode($data['view'], JSON_UNESCAPED_UNICODE);
        $this->brinell_hardness = json_encode($data['brinell_hardness'], JSON_UNESCAPED_UNICODE);
        $this->class            = json_encode($data['class'], JSON_UNESCAPED_UNICODE);
    }

    public function addImage($images)
    {
        $image = new Images();
        $image->width    = 370;
        $image->height   = 270;
        $image->type     = 'products';
        $image->owner_id = $this->id;
        $image->addImages($images);
    }

    public function getEditPrices()
    {
        $prices = $this->prices;

        $result = [
            'id'    => [],
            'price' => [],
            'type'  => [],
        ];

        foreach ($prices as $price) {
            $result['id'][]    = $price->id;
            $result['price'][] = $price->price;
            $result['type'][]  = $price->type;
        }

        return $result;
    }

    public function addPrice($price, $type)
    {
        foreach ($price as $key => $value) {
            if (!empty($type[$key])) {
                $prices = new Prices();
                $prices->product_id = $this->id;
                $prices->price      = $value;
                $prices->type       = $type[$key];
                $prices->save();
            }
        }
    }

    public function getImagesLink()
    {
        $images = $this->images;
        $result = [];

        foreach ($images as $image) {
            $result[] = '/images/' . $image->type . '/' . $image->name;
        }

        return $result;
    }

    public function editPrice($data)
    {
        $id    = $data['price_id'];
        $price = $data['price'];
        $type  = $data['price_type'];
        $oldId = [];

        foreach ($this->prices as $priceId) {
            $oldId[] = $priceId['id'];
        }

        $difference = array_diff($oldId, $id);

        Prices::destroy($difference);

        $update = array_filter($id);
        $updatePrice = [];
        $updateType  = [];

        foreach ($update as $key => $updateId) {
            if (!empty($type[$key])) {
                Prices::where('id', $updateId)->update(['price' => $price[$key], 'type' => $type[$key]]);
            }
        }

        $save = array_keys($id, '');
        $savePrice = [];
        $saveType  = [];

        foreach ($save as $key => $saveId) {
            $savePrice[] = $price[$saveId];
            $saveType[]  = $type[$saveId];
        }

        $this->addPrice($savePrice, $saveType);
    }

    public function getPrices()
    {
        $prices = $this->prices;
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

    public function getOrderPrices()
    {
        $prices = $this->prices;
        $result = [];

        foreach ($prices as $price) {
            $result[$price['id']]['type']      = $price['type'];
            $result[$price['id']]['type_view'] = trans('products.measures.' . $price['type']);
            $result[$price['id']]['price']     = $price['price'];
        }

        return $result;
    }

    public static function getViewProducts($products)
    {
        $result = [];

        foreach ($products as $product) {
            $result[] = $product->getViewData();
        }

        return $result;
    }

    public function getViewData()
    {
        $locale = in_array(App::getLocale(), ['en', 'uk']) ? '/' . App::getLocale() : '';

        $array['id']           = $this->id;
        $array['images']       = $this->getImagesLink();
        $array['title']        = Language::getArraySoft($this->title);
        $array['description']  = Language::getArraySoft($this->description);

        $array['work_link']    = $locale . $this->menu->full_path_slug . '/' . $this->slug;

        $array['office_id']    = $this->office->id; // admin panel view
        $array['office_title'] = Language::getArraySoft($this->office->title);
        $array['office_linck'] = $locale . '/office/' . $this->office->slug;

        $array['prices']       = $this->getPrices();
        $array['prices_type']  = collect($array['prices'])->contains('type', 'agreed') ? true : false;

        $array['quantity']     = empty($this->pivot->quantity) ? null : $this->pivot->quantity;
        $array['price_id']     = empty($this->pivot->price_id) ? null : $this->pivot->price_id;
        $array['bonds']        = empty($this->pivot->id) ? null : $this->pivot->id;
        $array['order_prices'] = $this->getOrderPrices(); // it needs improvement

        $array['in_stock']         = $this->in_stock;
        $array['steel_grade']      = Language::getArraySoft($this->steel_grade);
        $array['sawing']           = Language::getArraySoft($this->sawing);
        $array['standard']         = Language::getArraySoft($this->standard);
        $array['diameter']         = Language::getArraySoft($this->diameter);
        $array['height']           = Language::getArraySoft($this->height);
        $array['width']            = Language::getArraySoft($this->width);
        $array['thickness']        = Language::getArraySoft($this->thickness);
        $array['section']          = Language::getArraySoft($this->section);
        $array['coating']          = Language::getArraySoft($this->coating);
        $array['view']             = Language::getArraySoft($this->view);
        $array['brinell_hardness'] = Language::getArraySoft($this->brinell_hardness);
        $array['class']            = Language::getArraySoft($this->class);

        return $array;
    }
}
