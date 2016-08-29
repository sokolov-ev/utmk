<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'type', 'weight', 'name'
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

        static::deleting(function($image){
            if (!empty($image->name) && (file_exists('./images/products/'.$image->name))) {
                unlink('./images/products/'.$image->name);
            }
        });
    }

    public function product()
    {
        return $this->belongsTo('App\Products', 'product_id');
    }
}
