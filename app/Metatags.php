<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Metatags extends Model
{
    protected $table = 'metatags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'slug', 'keywords', 'title', 'description', 'h1', 'articles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dateFormat = 'U';

    // this is a recommended way to declare event handlers
    protected static function boot()
    {
        parent::boot();
    }

    public function menu()
    {
        return $this->hasOne('App\Menu', 'slug', 'slug');
    }

    public static function getEditData($metatags, $type, $slug)
    {
        $result = [];

        if (empty($metatags)) {
            $metatags = new Metatags();
            $metatags->type = $type;
            $metatags->slug = $slug;
            $metatags->keywords = '{"en":"","ru":"","uk":""}';
            $metatags->title = '{"en":"","ru":"","uk":""}';
            $metatags->description = '{"en":"","ru":"","uk":""}';
            $metatags->h1 = '{"en":"","ru":"","uk":""}';
            $metatags->articles = '{"en":"","ru":"","uk":""}';
        }

        $result['type'] = $metatags->type;
        $result['slug'] = $metatags->slug;

        $keywords = json_decode($metatags->keywords, true);
        $result['keywords_en'] = $keywords['en'];
        $result['keywords_ru'] = $keywords['ru'];
        $result['keywords_uk'] = $keywords['uk'];

        $title = json_decode($metatags->title, true);
        $result['title_en'] = $title['en'];
        $result['title_ru'] = $title['ru'];
        $result['title_uk'] = $title['uk'];

        $description = json_decode($metatags->description, true);
        $result['description_en'] = $description['en'];
        $result['description_ru'] = $description['ru'];
        $result['description_uk'] = $description['uk'];

        $h1 = json_decode($metatags->h1, true);
        $result['h1_en'] = $h1['en'];
        $result['h1_ru'] = $h1['ru'];
        $result['h1_uk'] = $h1['uk'];

        $articles = json_decode($metatags->articles, true);
        $result['articles_en'] = $articles['en'];
        $result['articles_ru'] = $articles['ru'];
        $result['articles_uk'] = $articles['uk'];

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

        $array['en'] = $data['keywords_en'];
        $array['ru'] = $data['keywords_ru'];
        $array['uk'] = $data['keywords_uk'];
        $metatags->keywords = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['title_en'];
        $array['ru'] = $data['title_ru'];
        $array['uk'] = $data['title_uk'];
        $metatags->title = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['description_en'];
        $array['ru'] = $data['description_ru'];
        $array['uk'] = $data['description_uk'];
        $metatags->description = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['h1_en'];
        $array['ru'] = $data['h1_ru'];
        $array['uk'] = $data['h1_uk'];
        $metatags->h1 = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['articles_en'];
        $array['ru'] = $data['articles_ru'];
        $array['uk'] = $data['articles_uk'];
        $metatags->articles = json_encode($array, JSON_UNESCAPED_UNICODE);

        if ($metatags->save()) {
            return $metatags;
        } else {
            return false;
        }
    }

    public static function getViewData($data)
    {
        $result = [];

        if (empty($data)) {
            $result['keywords']    = '';
            $result['title']       = '';
            $result['description'] = '';
            $result['h1']          = '';
            $result['articles']    = '';
        } else {
            $result['keywords']    = json_decode($data->keywords, true)[App::getLocale()];
            $result['title']       = json_decode($data->title, true)[App::getLocale()];
            $result['description'] = json_decode($data->description, true)[App::getLocale()];
            $result['h1']          = json_decode($data->h1, true)[App::getLocale()];
            $result['articles']    = json_decode($data->articles, true)[App::getLocale()];
        }

        return $result;
    }
}
