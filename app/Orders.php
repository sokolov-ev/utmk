<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    const STATUS_NOT_ACCEPTED = 0;
    const STATUS_ACCEPTED = 1;
    const STATUS_CLOSED = 0;

    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'manager_id', 'office_id', 'formed', 'status', 'contacts', 'wish'
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

    public static function getStatus()
    {
        return [
            self::STATUS_NOT_ACCEPTED => 'not-accepted',
            self::STATUS_ACCEPTED => 'accepted',
            self::STATUS_CLOSED => 'closed',
        ];
    }
}
