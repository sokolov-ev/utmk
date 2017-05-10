<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    protected $table = 'prices';

    protected $fillable = ['product_id', 'price', 'type'];

    protected $hidden = [];

    protected $dateFormat = 'U';

    //////////

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

        $oldId  = [];
        $prices = Prices::select('id')->where("product_id", $productId)->get();

        foreach ($prices->toArray() as $pricesId) {
            $oldId[] = $pricesId['id'];
        }

        $difference = array_diff($oldId, $id);

        Prices::destroy($difference);

        $update = array_filter($id);
        $updatePrice = [];
        $updateType  = [];

        foreach ($update as $key => $updateId) {
            if (!empty($type[$key])) {
                Prices::where('id', $updateId)->update(['price' => $price[$key], 'type' => $type[$key]]);
            }
        }

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
