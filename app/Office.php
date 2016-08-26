<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;

class Office extends Model
{
    const TYPE_MAINE  = 'main';
    const TYPE_BRANCH = 'branch';

    protected $table = 'offices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'title', 'description', 'address', 'city', 'latitude', 'longitude'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dateFormat = 'U';

    public function contacts()
    {
        return $this->hasMany('App\Contacts');
    }

    public function moderators()
    {
        return $this->hasMany('App\Admin');
    }

    // this is a recommended way to declare event handlers
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

        $array["office_id"] = $office->id;
        $array["office_type"] = $office->type;

        $title = json_decode($office->title, true);
        $array['title_en'] = $title['en'];
        $array['title_ru'] = $title['ru'];
        $array['title_uk'] = $title['uk'];

        $titleName = array_filter($title);
        $array['title_name'] = empty($titleName[App::getLocale()]) ? current($titleName) : $titleName[App::getLocale()];

        $description = json_decode($office->description, true);
        $array['description_en'] = $description['en'];
        $array['description_ru'] = $description['ru'];
        $array['description_uk'] = $description['uk'];

        $address = json_decode($office->address, true);
        $array['address_en'] = $address['en'];
        $array['address_ru'] = $address['ru'];
        $array['address_uk'] = $address['uk'];

        $city = json_decode($office->city, true);
        $array['city_en'] = $city['en'];
        $array['city_ru'] = $city['ru'];
        $array['city_uk'] = $city['uk'];

        $array['latitude']  = $office->latitude;
        $array['longitude'] = $office->longitude;

        return $array;
    }

    // выборка всех оффисов для выпадающего списка (для привязки модераторов и фильтров)
    public static function getOffices()
    {
        $offices = Office::select('id', 'city AS text')->get();
        $result = [];

        foreach ($offices->toArray() as $key => $office) {
            $result[$office['id']] = json_decode($office['text'], true)[App::getLocale()];
        }

        return $result;
    }

    // выборка всех оффисов с контактами (для фроентенда)
    public static function getOfficesContacts()
    {
        $offices = Office::all();
        $temp    = [];
        $result  = [];

        foreach ($offices as $key => $office) {
            $temp['title']    = json_decode($office->title, true)[App::getLocale()];
            $temp['address']  = json_decode($office->address, true)[App::getLocale()];
            $temp['latitude'] = $office->latitude;
            $temp['longitude']= $office->longitude;
            $temp['contacts'] = $office->contacts->toArray();
            $result[] = $temp;
        }

        return $result;
    }
}
