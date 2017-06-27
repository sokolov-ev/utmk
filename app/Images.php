<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    public $width  = 0;
    public $height = 0;

    protected $fillable = [
        'name',
        'type',
        'weight',
        'owner_id',
        'link',
        'text',
    ];

    protected $hidden = [];

    protected $dateFormat = 'U';

    protected $attributes = [
        'name'     => '',
        'type'     => 'other',
        'weight'   => 0,
        'owner_id' => 0,
        'link'     => '',
        'text'     => '',
    ];

    // this is a recommended way to declare event handlers
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($image){
            if (!empty($image->name)) {
                if (file_exists('./images/' . $image->type . '/' . $image->name)) {
                    unlink('./images/' . $image->type . '/' . $image->name);
                }
            }
        });
    }

    /**
     * The function of adding images
     * @var array images [{image}]
     */
    public function addImages($images)
    {
        foreach ($images as $img) {
            $filename = \md5($img->getClientOriginalName() . time()) . '.' . $img->getClientOriginalExtension();
            $path     = 'images/' . $this->type . '/' . $filename;

            if (!empty($this->width) && !empty($this->height)) {
                $result = Image::make($img->getRealPath())->resize($this->width, $this->height)->save($path);
            } else {
                $result = Image::make($img->getRealPath())->save($path);
            }

            if ($result) {
                $image = new Images();
                $image->name     = $filename;
                $image->type     = $this->type;
                $image->owner_id = $this->owner_id;
                $image->link     = $this->linck;
                $image->text     = $this->text;
                $image->save();
            }
        }
    }
}
