<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Image;

class Blog extends Model
{
    protected $table = 'blog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'slug', 'title', 'body', 'show_this', 'published'
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

        static::deleting(function($blog){
            static::deleteImage($blog->image);
        });
    }

    public static function actionNews($id, $data)
    {
        if (empty($id)) {
            $locale = setlocale(LC_TIME, 'ru_RU.UTF-8', 'Rus');

            $news = new Blog();
            $news->published = strftime('%B %d, %G', time());
        } else {
            $news = Blog::find($id);

            if (empty($news)) {
                return false;
            }
        }

        $img = $data['image'];

        if (!empty($img)) {
            $filename = str_slug($img->getClientOriginalName(), '_') . '_' . time() . '.' . $img->getClientOriginalExtension();
            $path = 'images/blog/' . $filename;

            if (Image::make($img->getRealPath())->resize(280, 220)->save($path)) {
                static::deleteImage($news->image);
                $news->image = $filename;
            }
        }

        $news->title = $data['title'];
        $news->slug  = $data['slug'];
        $news->body  = $data['description'];
        $news->show_this = ($data['show_this'] == 'on') ? true : false;

        return $news->save();
    }

    public static function deleteImage($name)
    {
        if (!empty($name) && (file_exists('./images/blog/'.$name))) {
            return unlink('./images/blog/'.$name);
        }
    }
}
