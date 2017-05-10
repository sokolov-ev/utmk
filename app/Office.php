<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;
use App\Contacts;
use Language;

class Office extends Model
{
    const TYPE_MAINE  = 'main';
    const TYPE_BRANCH = 'branch';

    protected $table = 'offices';

    protected $fillable = [
        'type', 
        'title', 
        'title_short', 
        'slug', 
        'text_top',
        'description', 
        'text_bottom', 
        'address', 
        'city', 
        'latitude', 
        'longitude'
    ];

    protected $hidden = [];

    protected $dateFormat = 'U';

    //////////

    public function contacts()
    {
        return $this->hasMany('App\Contacts');
    }

    public function moderators()
    {
        return $this->hasMany('App\Admin');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($office){
            Contacts::where('office_id', $office->id)->delete();
        });
    }

    public static function getType()
    {
        return [
            self::TYPE_BRANCH => 'branch',
            self::TYPE_MAINE  => 'main',
        ];
    }

    public static function listType()
    {
        return self::TYPE_BRANCH.','.self::TYPE_MAINE;
    }

    public static function parseData($id)
    {
        $office = Office::findOrFail($id);

        $array['id']   = $office->id;
        $array['type'] = $office->type;
        $array['slug'] = $office->slug;

        $array['title']       = json_decode($office->title, true);
        $array['title_short'] = json_decode($office->title_short, true);
        $array['text_top']    = json_decode($office->text_top, true);
        $array['description'] = json_decode($office->description, true);
        $array['text_bottom'] = json_decode($office->text_bottom, true);
        $array['address']     = json_decode($office->address, true);
        $array['city']        = json_decode($office->city, true);

        $array['latitude']  = $office->latitude;
        $array['longitude'] = $office->longitude;

        $array['contacts']  = $office->contacts->toArray();

        return $array;
    }

    public static function actionOffice($id, $data)
    {
        if (empty($id)) {
            $office = new Office();
        } else {
            $office = Office::find($id);

            if (empty($office)) {
                return false;
            }
        }

        $office->type = $data['type'];
        $office->slug = str_slug($data['slug'], '-');;

        $office->title       = json_encode($data['title'], JSON_UNESCAPED_UNICODE);
        $office->title_short = json_encode($data['title_short'], JSON_UNESCAPED_UNICODE);
        $office->text_top    = json_encode($data['text_top'], JSON_UNESCAPED_UNICODE);
        $office->description = json_encode($data['description'], JSON_UNESCAPED_UNICODE);
        $office->text_bottom = json_encode($data['text_bottom'], JSON_UNESCAPED_UNICODE);
        $office->address     = json_encode($data['address'], JSON_UNESCAPED_UNICODE);
        $office->city        = json_encode($data['city'], JSON_UNESCAPED_UNICODE);

        $office->latitude  = $data['latitude'];
        $office->longitude = $data['longitude'];

        if ($office->save()) {
            return $office;
        } else {
            return false;
        }
    }

    public static function viewData($slug)
    {
        $office = Office::where('slug', $slug)->firstOrFail();

        $array['slug']        = $office->slug;
        $array['title']       = Language::getArraySoft($office->title);
        $array['text_top']    = Language::getArraySoft($office->text_top);
        $array['description'] = Language::getArraySoft($office->description);
        $array['text_bottom'] = Language::getArraySoft($office->text_bottom);
        $array['address']     = Language::getArraySoft($office->address);

        $array['latitude']    = $office->latitude;
        $array['longitude']   = $office->longitude;

        $array['contacts']    = $office->contacts->toArray();

        return $array;
    }

    public static function getOfficesContacts($flag = true)
    {
        $offices = Office::all();
        $result  = [];

        foreach ($offices as $office) {
            $array = [];

            $array['slug']  = $office->slug;
            $array['title'] = Language::getArraySoft($office->title);
            $array['title_short'] = Language::getArraySoft($office->title_short);
            $array['address']     = Language::getArraySoft($office->address);
            $array['latitude']    = $office->latitude;
            $array['longitude']   = $office->longitude;
            $array['contacts']    = $flag ? $office->contacts->toArray() : array_slice($office->contacts->toArray(), 0, 2);
            $array['updated_at']  = $office->updated_at->getTimestamp(); // for site map

            $result[] = $array;
        }

        return $result;
    }

    public static function getMainContacts()
    {
        $office = Office::where('type', 'main')->first();

        return $office->contacts->toArray();
    }
}