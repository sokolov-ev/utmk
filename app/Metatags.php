<?php

namespace App;

use App;
use Language;
use Illuminate\Database\Eloquent\Model;

class Metatags extends Model
{
    protected $table = 'metatags';

    protected $fillable = [
        'type', 'slug', 'keywords', 'title', 'description', 'h1', 'articles'
    ];

    protected $hidden = [];

    protected $dateFormat = 'U';

    /////////

    public function menu()
    {
        return $this->hasOne('App\Menu', 'slug', 'slug');
    }

    public function reference()
    {
        return $this->hasOne('App\ReferenceSection', 'slug', 'slug');
    }

    public static function getEditData($metatags, $type, $slug)
    {
        $result = [];

        if (empty($metatags)) {
            $metatags = new Metatags();
            $metatags->type = $type;
            $metatags->slug = $slug;
            $metatags->keywords    = Language::getEmptyJson();
            $metatags->title       = Language::getEmptyJson();
            $metatags->description = Language::getEmptyJson();
            $metatags->h1          = Language::getEmptyJson();
            $metatags->articles    = Language::getEmptyJson();
        }

        $result['type'] = $metatags->type;
        $result['slug'] = $metatags->slug;

        $result['keywords']    = json_decode($metatags->keywords, true);
        $result['title']       = json_decode($metatags->title, true);
        $result['description'] = json_decode($metatags->description, true);

        $result['h1']       = json_decode($metatags->h1, true);
        $result['articles'] = json_decode($metatags->articles, true);

        return $result;
    }

    public static function setMetatags($data)
    {
        $metatags = Metatags::where([['type', $data['type']], ['slug', $data['slug']]])->first();

        if (empty($metatags)) {
            $metatags = new Metatags();
        }

        $metatags->type = $data['type'];
        $metatags->slug = $data['slug'];

        $metatags->keywords    = json_encode($data['keywords'], JSON_UNESCAPED_UNICODE);
        $metatags->title       = json_encode($data['title'], JSON_UNESCAPED_UNICODE);
        $metatags->description = json_encode($data['description'], JSON_UNESCAPED_UNICODE);
        $metatags->h1          = json_encode($data['h1'], JSON_UNESCAPED_UNICODE);
        $metatags->articles    = json_encode($data['articles'], JSON_UNESCAPED_UNICODE);

        if ($metatags->save()) {
            return $metatags;
        } else {
            return false;
        }
    }

    public static function getViewData($data)
    {
        $result = [
            'keywords'    => '',
            'title'       => '',
            'description' => '',
            'h1'          => '',
            'articles'    => '',
        ];

        if (!empty($data)) {
            $result['keywords']    = json_decode($data->keywords, true)[App::getLocale()];
            $result['title']       = json_decode($data->title, true)[App::getLocale()];
            $result['description'] = json_decode($data->description, true)[App::getLocale()];
            $result['h1']          = json_decode($data->h1, true)[App::getLocale()];
            $result['articles']    = json_decode($data->articles, true)[App::getLocale()];
        }

        return $result;
    }
}
