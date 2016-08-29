<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App;
use Validator;
use JsValidator;
use App\Office;
use App\Contacts;
use App\Locale;

class OfficesController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('language');
    }

    public function getAll($id = null)
    {
        if (empty($id)) {
            $offices = Office::all();
        } else {
            $offices = Office::where('id', $id)->get();
        }

        $result = [];

        foreach ($offices as $office) {
            $office->title   = json_decode($office->title, true)[App::getLocale()];
            $office->address = json_decode($office->address, true)[App::getLocale()];
            $result[] = $office;
        }

        return view('backend.site.offices', [
            'offices'  => $result,
            'language' => Locale::getLocaleName(),
        ]);
    }

    public function addFormOffice()
    {
        $officeType = Office::getType();
        $contactType = Contacts::getType();

        return view('backend.site.office-add', [
            'officeType' => $officeType,
            'contactType' => $contactType,
        ]);
    }

    public function addOffice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'office_type' => 'required_with:'.Office::listType(),
            'title_en' => 'string|min:3',
            'title_ru' => 'string|min:3',
            'title_uk' => 'string|min:3',
            'description_en' => 'string|min:10',
            'description_ru' => 'string|min:10',
            'description_uk' => 'string|min:10',

            'address_ru' => 'required|string',

            'contacts_type.*' => 'required_with:'.Contacts::listType(),
            'contacts_data.*' => 'required|string|min:3',
        ]);

        $validator->after(function($validator) {
            $attr = $validator->attributes();
            if (empty($attr['title_en']) && empty($attr['title_ru']) && empty($attr['title_uk'])) {
                $validator->errors()->add('title_ru', 'Поле "Заголовок" обязательно для заполнения.');
            }

            if (empty($attr['description_en']) && empty($attr['description_ru']) && empty($attr['description_uk'])) {
                $validator->errors()->add('description_ru', 'Поле "Описание" обязательно для заполнения.');
            }

            if (empty($attr['latitude']) || empty($attr['latitude']) || (empty($attr['city_en']) && empty($attr['city_ru']) && empty($attr['city_uk']))) {
                $validator->errors()->add('address_ru', 'Поле "Адрес" обязательно для заполнения.');
            }
        });

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());

            $this->throwValidationException(
                $request, $validator
            );
        }

        if ($office = $this->createOffice(null, $request->all())) {
            $this->createContacts($office->id, $request->input('contacts_type'), $request->input('contacts_data'));
            session()->flash('success', 'Филиал успешно добавлен.');
            return redirect('/administration/offices');
        } else {
            session()->flash('error', 'Возникла ошибка при добавлении Филиала.');
            return redirect()->back();
        }
    }

    public function editFormOffice($id)
    {
        $office   = Office::parseData($id);
        $contacts = Contacts::parseData($office['office_id']);
        $officeType  = Office::getType();
        $contactType = Contacts::getType();

        return view('backend.site.office-edit', [
            'office'   => $office,
            'contacts' => $contacts,
            'officeType'   => $officeType,
            'contactType'  => $contactType,
        ]);
    }

    public function editOffice(Request $request, $id)
    {
        if ($this->createOffice($id, $request->all())) {

            $this->editContacts($id, $request->all());
            session()->flash('success', 'Данные филиала успешно сохранены.');
            return redirect('/administration/offices');
        } else {
            session()->flash('error', 'Возникла ошибка при сохранении данных филиала.');
            return redirect()->back();
        }

    }

    public function deleteOffice(Request $request)
    {
        if (Office::destroy($request->input('id')) ) {
            session()->flash('success', 'Филиал успешно удален.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении филиала.');
        }

        return redirect('/administration/offices');
    }

    protected function createOffice($id, $data)
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

    protected function createContacts($office_id, $type, $data)
    {
        foreach ($type as $key => $value) {
            if (!empty($data[$key])) {
                $contact = new Contacts();
                $contact->office_id = $office_id;
                $contact->type      = $value;
                $contact->contact   = $data[$key];
                $contact->save();
            }
        }
    }

    protected function editContacts($office_id, $data)
    {
        $id   = $data['contacts_id'];
        $type = $data['contacts_type'];
        $data = $data['contacts_data'];

        // находим все старые контакты, находим расхождением между новыми и старыми контактам, и удаляем их
        $contacts = Contacts::select('id')->where("office_id", $office_id)->get();
        $oldId = [];
        foreach ($contacts->toArray() as $contact) {
            $oldId[] = $contact['id'];
        }

        $difference = array_diff($oldId, $id);

        $this->deleteConstacts($difference);

        // обновляем контакты
        $update = array_filter($id);
        $updateType = [];
        $updateData = [];

        foreach ($update as $key => $value) {
            $updateType[] = $type[$key];
            $updateData[] = $data[$key];
        }

        $this->updateConstacts($update, $updateType, $updateData);

        // сохраняем новые контакты
        $save = array_keys($id, '');
        $saveType = [];
        $saveData = [];

        foreach ($save as $key => $value) {
            $saveType[] = $type[$value];
            $saveData[] = $data[$value];
        }

        $this->createContacts($office_id, $saveType, $saveData);
    }

    protected function updateConstacts($id, $type, $data)
    {
        foreach ($id as $key => $value) {
            if (!empty($data[$key])) {
                Contacts::where('id', $value)->update(['type' => $type[$key], 'contact' => $data[$key]]);
            }
        }
    }

    protected function deleteConstacts($id)
    {
        Contacts::destroy($id);
    }
}