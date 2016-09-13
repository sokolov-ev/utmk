<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}