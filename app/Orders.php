<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    const STATUS_NOT_ACCEPTED = 0;
    const STATUS_ACCEPTED = 1;
    const STATUS_CLOSED = 2;

    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'manager_id', 'office_id', 'total_cost', 'formed', 'status', 'contacts', 'wish'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dateFormat = 'U';

    public function attitude()
    {
        return $this->hasMany('App\OrdersProducts', 'order_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Products', 'orders_products', 'order_id', 'product_id')->withPivot('quantity', 'id');
    }

    // this is a recommended way to declare event handlers
    protected static function boot()
    {
        parent::boot();

        // static::deleting(function($product){
        //     Images::where('product_id', $product->id)->delete();
        // });
    }

    public static function getStatus()
    {
        return [
            self::STATUS_NOT_ACCEPTED => 'in-processing',
            self::STATUS_ACCEPTED => 'accepted',
            self::STATUS_CLOSED => 'closed',
        ];
    }
}
