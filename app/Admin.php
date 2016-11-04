<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    const STATUS_ACTIVE = 10;
    const STATUS_LOCKED = 1;
    const STATUS_DELETE = 0;

    const ROLE_ADMIN = 'Admin';
    const ROLE_MODERATOR = 'Moderator';
    const ROLE_SEO = 'SEO';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'office_id', 'username', 'email', 'status', 'activity', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dateFormat = 'U';

    public function office()
    {
        return $this->hasOne('App\Office', 'id', 'office_id');
    }

    public static function getRoleTable()
    {
        return [
                self::ROLE_ADMIN => 'Администратор',
                self::ROLE_MODERATOR => 'Менеджер',
                self::ROLE_SEO => 'СЕО',
            ];
    }

    public static function getRole()
    {
        return [
                self::ROLE_MODERATOR => 'Менеджер',
                self::ROLE_SEO => 'СЕО',
            ];
    }

    public static function getStatus()
    {
        return [
            self::STATUS_ACTIVE => 'Активирован',
            self::STATUS_LOCKED => 'Заблокирован',
            self::STATUS_DELETE => 'Удален',
        ];
    }
}