<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sendsms extends Model
{
    protected $table = 'turbo_sms_send';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date_sent', 'text', 'phone', 'message', 'status'];

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

        });
    }
}
