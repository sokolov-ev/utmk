<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirects extends Model
{
    protected $table = 'redirects';

    protected $fillable = ['old', 'new'];

    protected $hidden = [];
}
