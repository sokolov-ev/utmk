<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id', 'office_id', 'title', 'description', 'price', 'rating', 'show_my', 'creator_id'
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
            Images::where('product_id', $product->id)->delete();
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
        return $this->hasMany('App\Images', 'product_id', 'id');
    }
}
