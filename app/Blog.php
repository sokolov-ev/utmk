<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'slug',
        'title',
        'body',
        'show_this',
        'published',
    ];

    protected $hidden = [];

    protected $dateFormat = 'U';

    // this is a recommended way to declare event handlers
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($news){
            $news->image()->delete();
        });
    }

    /////////

    public function image()
    {
        return $this->hasOne('App\Images', 'owner_id')->where('type', 'blog');
    }

    public function addImage($images)
    {
        $image = new Images();
        $image->width    = 255;
        $image->height   = 255;
        $image->type     = 'blog';
        $image->owner_id = $this->id;
        $image->addImages([$images]);
    }
}
