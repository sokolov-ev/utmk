<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;

class Reference extends Model
{
    protected $table = 'reference';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dateFormat = 'U';

    public static function viewReference()
    {
        $reference = Reference::find(1);

        if (!$reference) {
            $array['title'] = '';
            $array['body'] = '';
            return $array;
        }

        $title = json_decode($reference['title'], true);
        $title = array_filter($title);
        $array['title'] = empty($title[App::getLocale()]) ? current($title) : $title[App::getLocale()];

        $body = json_decode($reference['body'], true);
        $body = array_filter($body);
        $array['body'] = empty($body[App::getLocale()]) ? current($body) : $body[App::getLocale()];

        return $array;
    }

    public static function getReference() 
    {
        $reference = Reference::find(1);

        if (!$reference) {
            $reference['title_en'] = '';
            $reference['title_ru'] = '';
            $reference['title_uk'] = '';

            $reference['body_en'] = '';
            $reference['body_ru'] = '';
            $reference['body_uk'] = '';

            return $reference;
        }

        $title = json_decode($reference['title'], true);
        $reference['title_en'] = $title['en'];
        $reference['title_ru'] = $title['ru'];
        $reference['title_uk'] = $title['uk'];
        
        $body = json_decode($reference['body'], true);
        $reference['body_en'] = $body['en'];
        $reference['body_ru'] = $body['ru'];
        $reference['body_uk'] = $body['uk'];

        return $reference;
    }

    public static function setReference($data) 
    {
        $reference = Reference::find(1);

        if (!$reference) {
            $reference = new Reference();
        }

        $title['en'] = $data['title_en'];
        $title['ru'] = $data['title_ru'];
        $title['uk'] = $data['title_uk'];
        $reference->title = json_encode($title, JSON_UNESCAPED_UNICODE);

        $body['en'] = $data['body_en'];
        $body['ru'] = $data['body_ru'];
        $body['uk'] = $data['body_uk'];
        $reference->body = json_encode($body, JSON_UNESCAPED_UNICODE);

        return $reference->save();
    }
}
