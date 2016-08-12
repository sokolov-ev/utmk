<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    const TYPE_MAINE  = 1;
    const TYPE_BRANCH = 0;

    protected $table = 'offices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'region', 'address', 'latitude', 'longitude'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dateFormat = 'U';

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function moderators()
    {
        return $this->hasMany('App\Admin');
    }

    public static function getType()
    {
        return [
            self::TYPE_BRANCH => 'branch',
            self::TYPE_MAINE  => 'main',
        ];
    }
}
