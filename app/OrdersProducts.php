<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{

    protected $table = 'orders_products';

    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price_id'
    ];

    protected $hidden = [];

    protected $dateFormat = 'U';

    public function products()
    {
        return $this->belongsTo('App\Products', 'product_id', 'id');
    }
}
