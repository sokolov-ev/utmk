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
        'parent_id', 'parent_exist', 'weight', 'name', 'slug'
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

        static::deleting(function($menu){
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

    public static function checkParent()
    {
        $items = Menu::all();

        foreach ($items as $item) {
            if (Menu::where('parent_id', $item->id)->exists()) {
                $item->parent_exist = 1;
            } else {
                $item->parent_exist = 0;
            }

            $item->update();
        }
    }

    public static function getBreadcrumbs($id)
    {
        if (Cache::has('menu')) {
            $menu = Cache::store('file')->get('menu');
        } else {
            $menu = Menu::all();

            Cache::store('file')->put('menu', $menu->toArray(), 1440); // храним сутки
        }

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
        $temp['slug'] = $item['slug'];
        $temp['name'] = json_decode($item['name'], true)[App::getLocale()];

        $chain[] = $temp;

        return static::getChain($menu, $item['parent_id'], $chain);
    }
}