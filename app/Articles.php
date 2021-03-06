<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    protected $fillable = ['slug', 'name'];

    protected $hidden = [];

    protected $dateFormat = 'U';
}
