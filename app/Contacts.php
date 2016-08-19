<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'office_id', 'type', 'contact'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dateFormat = 'U';

    public function office()
    {
        return $this->belongsTo('App\Office', 'office_id');
    }

    public static function getType()
    {
        return [
            'mobile' => 'mobile',
            'phone'  => 'phone',
            'email'  => 'email',
            'skype'  => 'skype',
        ];
    }

    public static function listType()
    {
        return "mobile,phone,email,skype";
    }

    public static function parseData($id)
    {
        $contacts = Contacts::where("office_id", $id)->get();
        $result['id']   = [];
        $result['type'] = [];
        $result['data'] = [];

        foreach ($contacts as $value) {
            $result['id'][]   = $value->id;
            $result['type'][] = $value->type;
            $result['data'][] = $value->contact;
        }

        return $result;
    }
}
