<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;
use Language;

class Reference extends Model
{
    protected $table = 'reference';

    protected $fillable = ['title', 'body'];

    protected $hidden = [];

    protected $dateFormat = 'U';

    /////////

    public static function viewReference()
    {
        $reference = Reference::find(1);

        if (empty($reference)) {
            $reference['title'] = Language::getEmptyJson();
            $reference['body']  = Language::getEmptyJson();
        }

        $array['title'] = Language::getArraySoft($reference['title']);
        $array['body']  = Language::getArraySoft($reference['body']);

        return $array;
    }

    public static function getReference() 
    {
        $reference = Reference::find(1);

        if (empty($reference)) {
            $reference['title'] = Language::getEmptyJson();
            $reference['body']  = Language::getEmptyJson();
        }

        $array['title'] = json_decode($reference['title'], true);
        $array['body']  = json_decode($reference['body'], true);

        return $array;
    }

    public static function setReference($data) 
    {
        $reference = Reference::find(1);

        if (empty($reference)) {
            $reference = new Reference();
        }

        $reference->title = json_encode($data['title'], JSON_UNESCAPED_UNICODE);
        $reference->body = json_encode($data['body'], JSON_UNESCAPED_UNICODE);

        return $reference->save();
    }
}
