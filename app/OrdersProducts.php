<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{

    protected $table = 'orders_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'product_id', 'quantity'
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

        // static::deleting(function($product){
        //     Images::where('product_id', $product->id)->delete();
        // });
    }
}
