<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    protected $table = 'prices';

    protected $fillable = [
        'product_id',
        'price',
        'type',
    ];

    protected $hidden = [];

    protected $dateFormat = 'U';

    //////////

    public static function listMeasures()
    {
        return "agreed,piece,sq-m,ton,meter";
    }

    public static function getMeasures()
    {
        return [
            'agreed' => 'agreed',
            'piece'  => 'piece',
            'sq-m'   => 'sq-m',
            'ton'    => 'ton',
            'meter'  => 'meter',
        ];
    }
}
