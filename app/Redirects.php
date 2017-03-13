<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirects extends Model
{
    protected $table = 'redirects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['old', 'new'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
