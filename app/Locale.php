<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;

class Locale extends Model
{
    public static function getLocaleName()
    {
        switch (App::getLocale()) {
            case 'en':
                return 'english';
                break;
            case 'ru':
                return 'russian';
                break;
            case 'uk':
                return 'ukrainian';
                break;
        }

        return null;
    }
}
