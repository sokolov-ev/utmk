<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;
use Cache;

class Menu extends Model
{

    protected $table = 'menu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id', 'parent_exist', 'weight', 'name', 'slug', 'full_path_slug'
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

        static::deleting(function($menu) {
            Menu::where('parent_id', $menu->id)->delete();
        });
    }

    public function products()
    {
        return $this->hasMany('App\Products', 'menu_id', 'id');
    }

    public function metatags()
    {
        return $this->hasOne('App\Metatags', 'slug', 'slug')->where('type', 'menu');
    }

    public static function formingAdditionalData()
    {
        $menu = Menu::all();

        foreach ($menu as $item) {

            $parent = array_filter($menu->toArray(), function($innerArray) use ($item) {
                return $innerArray['parent_id'] == $item->id;
            });

            if (!empty($parent)) {
                $item->parent_exist = 1;
            } else {
                $item->parent_exist = 0;
            }

            if ($item->parent_id != 0) {
                $slug = array_merge([$item->slug], static::getCatalogSlug($item->parent_id, $menu->toArray(), []));
                $slug = array_reverse($slug);
                $item->full_path_slug = '/'.implode('/', $slug);
            } else {
                $item->full_path_slug = '/'.$item->slug;
            }

            $item->update();
            // if () {
            //     $products = Products::where('menu_id', $item->id)->get();

            //     foreach ($products as $product) {
            //         $product->slug_menu = $item->full_path_slug.'/'.$product->slug;
            //         $product->update();
            //     }
            // }
        }
    }

    protected static function getCatalogSlug($id, $catalog, $slug)
    {
        $parent = array_filter($catalog, function($innerArray) use ($id) {
            return $innerArray['id'] == $id;
        });

        if (empty($parent)) {
            return $slug;
        } else {
            $parent = current($parent);
            $slug[] = $parent['slug'];
            return static::getCatalogSlug($parent['parent_id'], $catalog, $slug);
        }
    }

    public static function getBreadcrumbs($id)
    {
        // if (Cache::has('menu')) {
        //     $menu = Cache::store('file')->get('menu');
        // } else {
        //     $menu = Menu::all();

        //     Cache::store('file')->put('menu', $menu->toArray(), 1440); // храним сутки
        // }

        $menu = Menu::all();

        $array = static::getChain($menu, $id, []);

        return array_reverse($array);
    }

    protected static function getChain($menu, $id, $chain)
    {
        $item = array_first($menu, function($key, $value) use ($id) {
            return $value['id'] == $id;
        });

        if (empty($item)) {
            return $chain;
        }

        $temp['id']   = $item['id'];
        $temp['slug'] = $item['full_path_slug'];
        $temp['name'] = json_decode($item['name'], true)[App::getLocale()];

        $chain[] = $temp;

        return static::getChain($menu, $item['parent_id'], $chain);
    }
}