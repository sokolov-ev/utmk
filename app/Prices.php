<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    protected $table = 'prices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'price', 'type'];

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

        static::deleting(function($product){

        });
    }

    public static function listMeasures()
    {
        return "agreed,piece,sq-m,ton,meter";
    }

    public static function getMeasures()
    {
        return [
            'agreed' => 'agreed',
            'piece'  => 'piece',
            'sq-m'   => 'sq-m',
            'ton'    => 'ton',
            'meter'  => 'meter',
        ];
    }

    public static function parseData($id)
    {
        $contacts = Prices::where("product_id", $id)->get();
        $result['id']    = [];
        $result['price'] = [];
        $result['type']  = [];

        foreach ($contacts as $value) {
            $result['id'][]    = $value->id;
            $result['price'][] = $value->price;
            $result['type'][]  = $value->type;
        }

        return $result;
    }

    public static function createPrice($productId, $price, $type)
    {
        foreach ($price as $key => $value) {
            if (!empty($type[$key])) {
                $prices = new Prices();
                $prices->product_id = $productId;
                $prices->price      = $value;
                $prices->type       = $type[$key];
                $prices->save();
            }
        }
    }

    public static function editPrices($productId, $data)
    {
        $id    = $data['price_id'];
        $price = $data['price'];
        $type  = $data['price_type'];

        // находим все старые контакты, находим расхождением между новыми и старыми контактам, и удаляем их
        $oldId  = [];
        $prices = Prices::select('id')->where("product_id", $productId)->get();

        foreach ($prices->toArray() as $pricesId) {
            $oldId[] = $pricesId['id'];
        }

        $difference = array_diff($oldId, $id);

        Prices::destroy($difference);

        // обновляем контакты
        $update = array_filter($id);
        $updatePrice = [];
        $updateType  = [];

        foreach ($update as $key => $updateId) {
            if (!empty($type[$key])) {
                Prices::where('id', $updateId)->update(['price' => $price[$key], 'type' => $type[$key]]);
            }
        }

        // сохраняем новые контакты
        $save = array_keys($id, '');
        $savePrice = [];
        $saveType  = [];

        foreach ($save as $key => $saveId) {
            $savePrice[] = $price[$saveId];
            $saveType[]  = $type[$saveId];
        }

        Prices::createPrice($productId, $savePrice, $saveType);
    }
}
