<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Image;

class Images extends Model
{
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'type', 'weight', 'name'
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

        static::deleting(function($image){
            if (!empty($image->name) && (file_exists('./images/products/'.$image->name))) {
                unlink('./images/products/'.$image->name);
            }
        });
    }

    public function product()
    {
        return $this->belongsTo('App\Products', 'product_id');
    }

    public static function addImages($id, $images)
    {
        if (!empty($images[0])) {
            foreach ($images as $img) {
                $filename  = str_slug($img->getClientOriginalName(), '_').'_'.time().'.'.$img->getClientOriginalExtension();
                $path = 'images/products/' . $filename;

                if (Image::make($img->getRealPath())->resize(370, 270)->save($path)) {
                    $imgModel = new Images();
                    $imgModel->product_id = $id;
                    $imgModel->name = $filename;
                    $imgModel->save();
                }
            }
        }
    }
}
