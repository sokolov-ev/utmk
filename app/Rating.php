<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;

class Rating extends Model
{
    protected $table = 'rating';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'appraisal'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dateFormat = 'U';

    public static function getRating($id)
    {
        $rating = Rating::where('product_id', $id)->get();
        $count  = count($rating);
        $appraisal = 0;
        
        if ($count) {
            $appraisal = array_sum(array_column($rating->toArray(), 'appraisal')) / $count;
            $appraisal = round($appraisal, 1);
        }

        return ['count' => $count, 'appraisal' => $appraisal];
    }

    public static function setRating($id, $stock)
    {
        $rating = new Rating();
        $rating->product_id = $id;
        $rating->appraisal  = $stock;

        return $rating->save();
    }
}
