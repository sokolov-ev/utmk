<?php

namespace App\Helpers;

use App;

class Language
{
    public static function set($field, $data, $lang)
    {
        $array = json_decode($field, true);
        $array[$lang] = $data;
        return json_encode($array, JSON_UNESCAPED_UNICODE);
    }

    public static function setEmpty($data, $lang)
    {   
        $array = ['en' => null, 'ru' => null, 'uk' => null];
        $array[$lang] = $data;
        return json_encode($array, JSON_UNESCAPED_UNICODE);
    }

    public static function getEmptyJson()
    {
        $array = ['en' => null, 'ru' => null, 'uk' => null];
        
        return json_encode($array, JSON_UNESCAPED_UNICODE);
    }

    public static function getArrayStrict($data, $lang)
    {
        return json_decode($data, true)[$lang];
    }

    public static function getArraySoft($data)
    {
        $array = json_decode($data, true);
        $array = array_filter($array);
        return empty($array[App::getLocale()]) ? current($array) : $array[App::getLocale()];
    }
    
}

// UPDATE `products` SET `steel_grade`='{"en":"", "ru":"", "uk":""}',`sawing`='{"en":"", "ru":"", "uk":""}',`standard`='{"en":"", "ru":"", "uk":""}',`diameter`='{"en":"", "ru":"", "uk":""}',`height`='{"en":"", "ru":"", "uk":""}',`width`='{"en":"", "ru":"", "uk":""}',`thickness`='{"en":"", "ru":"", "uk":""}',`section`='{"en":"", "ru":"", "uk":""}',`coating`='{"en":"", "ru":"", "uk":""}',`view`='{"en":"", "ru":"", "uk":""}',`brinell_hardness`='{"en":"", "ru":"", "uk":""}' WHERE 1