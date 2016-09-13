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
            'accounting-tel' => 'accounting-tel',
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

    public static function createContacts($officeId, $type, $data)
    {
        foreach ($type as $key => $value) {
            if (!empty($data[$key])) {
                $contact = new Contacts();
                $contact->office_id = $officeId;
                $contact->type      = $value;
                $contact->contact   = $data[$key];
                $contact->save();
            }
        }
    }

    public static function editContacts($officeId, $data)
    {
        $id   = $data['contacts_id'];
        $type = $data['contacts_type'];
        $data = $data['contacts_data'];

        // находим все старые контакты, находим расхождением между новыми и старыми контактам, и удаляем их
        $oldId    = [];
        $contacts = Contacts::select('id')->where("office_id", $officeId)->get();

        foreach ($contacts->toArray() as $contact) {
            $oldId[] = $contact['id'];
        }

        $difference = array_diff($oldId, $id);

        Contacts::destroy($difference);

        // обновляем контакты
        $update = array_filter($id);
        $updateType = [];
        $updateData = [];

        foreach ($update as $key => $updateId) {
            if (!empty($data[$key])) {
                Contacts::where('id', $updateId)->update(['type' => $type[$key], 'contact' => $data[$key]]);
            }
        }

        // сохраняем новые контакты
        $save = array_keys($id, '');
        $saveType = [];
        $saveData = [];

        foreach ($save as $key => $saveId) {
            $saveType[] = $type[$saveId];
            $saveData[] = $data[$saveId];
        }

        Contacts::createContacts($officeId, $saveType, $saveData);
    }

}
