<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePrice extends Model
{
    protected $table = 'file_price';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

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

        static::deleting(function($filePrice){
            if (!empty($filePrice->name) && (file_exists('./price/'.$filePrice->name))) {
                unlink('./price/'.$filePrice->name);
            }
        });
    }
}
