<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;
use App\Contacts;

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
        'type', 'title', 'description', 'text_top', 'text_bottom', 'address', 'city', 'latitude', 'longitude'
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

        $text_top = json_decode($office->text_top, true);
        $array['text_top_en'] = $text_top['en'];
        $array['text_top_ru'] = $text_top['ru'];
        $array['text_top_uk'] = $text_top['uk'];

        $text_bottom = json_decode($office->text_bottom, true);
        $array['text_bottom_en'] = $text_bottom['en'];
        $array['text_bottom_ru'] = $text_bottom['ru'];
        $array['text_bottom_uk'] = $text_bottom['uk'];

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

    // В топку оптимизацию!
    public static function getOfficeId($city)
    {
        if (empty($city)) {
            return static::getDefOfficeId();
        }

        $office = Office::select('id')->where('city', 'LIKE', '%'.$city.'%')->first();

        if (empty($office)) {
            return static::getDefOfficeId();
        } else {
            return $office->id;
        }
    }

    protected static function getDefOfficeId()
    {
        $office = Office::select('id')->where('city', 'LIKE', '%kiev%')->first();

        return $office->id;
    }

    // выборка всех оффисов с контактами (для фроентенда)
    public static function getOfficesContacts()
    {
        $offices = Office::all();
        $temp    = [];
        $result  = [];

        foreach ($offices as $key => $office) {
            $temp['id']          = $office->id;
            $temp['city']        = str_slug(json_decode($office->city, true)['ru']);

            $officeTitle   = json_decode($office->title, true);
            $officeTitle   = array_filter($officeTitle);
            $temp['title'] = empty($officeTitle[App::getLocale()]) ? current($officeTitle) : $officeTitle[App::getLocale()];

            $officeDescription   = json_decode($office->description, true);
            $officeDescription   = array_filter($officeDescription);
            $temp['description'] = empty($officeDescription[App::getLocale()]) ? current($officeDescription) : $officeDescription[App::getLocale()];

            $officeTextTop    = json_decode($office->text_top, true);
            $officeTextTop    = array_filter($officeTextTop);
            $temp['text_top'] = empty($officeTextTop[App::getLocale()]) ? current($officeTextTop) : $officeTextTop[App::getLocale()];

            $officeTextBottom    = json_decode($office->text_bottom, true);
            $officeTextBottom    = array_filter($officeTextBottom);
            $temp['text_bottom'] = empty($officeTextBottom[App::getLocale()]) ? current($officeTextBottom) : $officeTextBottom[App::getLocale()];

            $officeDescription   = json_decode($office->description, true);
            $officeDescription   = array_filter($officeDescription);
            $temp['description'] = empty($officeDescription[App::getLocale()]) ? current($officeDescription) : $officeDescription[App::getLocale()];

            $temp['address']     = json_decode($office->address, true)[App::getLocale()];
            $temp['latitude']    = $office->latitude;
            $temp['longitude']   = $office->longitude;
            $temp['contacts']    = $office->contacts->toArray();

            $temp['updated_at']    = $office->updated_at->getTimestamp();

            $result[] = $temp;
        }

        return $result;
    }

    // в зависимости от ID создаем или редактируем оффис
    public static function actionOffice($id, $data)
    {
        if (empty($id)) {
            $office = new Office();
        } else {
            $office = Office::findOrFail($id);
        }

        $office->type = $data['office_type'];

        $array['en'] = $data['title_en'];
        $array['ru'] = $data['title_ru'];
        $array['uk'] = $data['title_uk'];
        $office->title = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['description_en'];
        $array['ru'] = $data['description_ru'];
        $array['uk'] = $data['description_uk'];
        $office->description = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['text_top_en'];
        $array['ru'] = $data['text_top_ru'];
        $array['uk'] = $data['text_top_uk'];
        $office->text_top = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['text_bottom_en'];
        $array['ru'] = $data['text_bottom_ru'];
        $array['uk'] = $data['text_bottom_uk'];
        $office->text_bottom = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['address_en'];
        $array['ru'] = $data['address_ru'];
        $array['uk'] = $data['address_uk'];
        $office->address = json_encode($array, JSON_UNESCAPED_UNICODE);

        $array['en'] = $data['city_en'];
        $array['ru'] = $data['city_ru'];
        $array['uk'] = $data['city_uk'];
        $office->city = json_encode($array, JSON_UNESCAPED_UNICODE);

        $office->latitude  = $data['latitude'];
        $office->longitude = $data['longitude'];

        if ($office->save()) {
            return $office;
        } else {
            return false;
        }
    }

    // формирование данных для вывода пользователю
    public static function viewData($id)
    {
        $office = Office::find($id);

        if (empty($office)) {
            return false;
        }

        $type = Office::getType();

        $array["id"] = $office->id;
        $array["type"] = trans('offices.officeType.'.$type[$office->type]);

        $title = json_decode($office->title, true);
        $title = array_filter($title);
        $array['title'] = empty($title[App::getLocale()]) ? current($title) : $title[App::getLocale()];

        $description = json_decode($office->description, true);
        $description = array_filter($description);
        $array['description'] = empty($description[App::getLocale()]) ? current($description) : $description[App::getLocale()];

        $textTop = json_decode($office->text_top, true);
        $textTop = array_filter($textTop);
        $array['text_top'] = empty($textTop[App::getLocale()]) ? current($textTop) : $textTop[App::getLocale()];

        $textBottom = json_decode($office->text_bottom, true);
        $textBottom = array_filter($textBottom);
        $array['text_bottom'] = empty($textBottom[App::getLocale()]) ? current($textBottom) : $textBottom[App::getLocale()];

        $address = json_decode($office->address, true);
        $address = array_filter($address);
        $array['address'] = empty($address[App::getLocale()]) ? current($address) : $address[App::getLocale()];

        $city = json_decode($office->city, true);
        $city = array_filter($city);
        $array['city'] = empty($city[App::getLocale()]) ? current($city) : $city[App::getLocale()];

        $array['latitude']  = $office->latitude;
        $array['longitude'] = $office->longitude;

        $contacts = [];
        $contactType = Contacts::getType();

        foreach ($office->contacts->toArray() as $key => $contact) {
            $temp['type'] = trans('offices.contactType.'.$contactType[$contact['type']]);
            $temp['data'] = $contact['contact'];
            $contacts[] = $temp;
        }
        $array['contacts'] = $contacts;

        return $array;
    }

    public static function getContactsData()
    {
        $office = Office::where('type', 'main')->first();
        $result = [];

        $address = json_decode($office->address, true);
        $address = array_filter($address);
        $result['address'] = empty($address[App::getLocale()]) ? current($address) : $address[App::getLocale()];

        $contacts = [];
        foreach ($office->contacts->toArray() as $key => $contact) {
            $temp['type'] = trans('offices.contactType.'.$contact['type']);
            $temp['data'] = $contact['contact'];
            $temp['work_type'] = $contact['type'];
            $contacts[] = $temp;
        }

        $result['contacts'] = $contacts;

        return $result;
    }
}