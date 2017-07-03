<?php

namespace App;

use Image;
use Language;
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
        'link'     => '{"en":"", "ru":"", "uk":""}',
        'text'     => '{"en":"", "ru":"", "uk":""}',
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
            $path     = 'images/' . $this->type . '/';

            if (!empty($this->width) && !empty($this->height)) {
                $result = Image::make($img->getRealPath())->resize($this->width, $this->height)->save($path . $filename);
            } else {
                $result = $img->move($path, $filename);
            }

            if ($result) {
                $image = new Images();
                $image->name     = $filename;
                $image->type     = $this->type;
                $image->owner_id = $this->owner_id;
                $image->link     = $this->link;
                $image->text     = $this->text;
                $image->save();
            }
        }
    }

    public function getEditData()
    {
        $this->link = json_decode($this->link, true);
        $this->text = json_decode($this->text, true);
    }

    public function setData($data)
    {
        $this->link = json_encode($data['link'], JSON_UNESCAPED_UNICODE);
        $this->text = json_encode($data['text'], JSON_UNESCAPED_UNICODE);
    }

    public static function viewDataArray($images)
    {
        $result = [];

        foreach ($images as $image) {
            $result[] = $image->viewData();
        }

        return $result;
    }

    public function viewData()
    {
        $this->link = Language::getArraySoft($this->link);
        $this->text = Language::getArraySoft($this->text);

        return $this;
    }
}
