<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'name'];

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
    }
}
