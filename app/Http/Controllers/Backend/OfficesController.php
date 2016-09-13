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
        $this->validator($request);

        if ($office = Office::actionOffice(null, $request->all())) {
            // добавляем новые контакты
            Contacts::createContacts($office->id, $request->input('contacts_type'), $request->input('contacts_data'));
            session()->flash('success', 'Филиал успешно добавлен.');
            return redirect('/administration/offices/index');
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
        $this->validator($request);

        if ($office = Office::actionOffice($id, $request->all())) {
            // одновременно добавляем, редактируем и удаляем контакты
            Contacts::editContacts($office->id, $request->all());
            session()->flash('success', 'Данные филиала успешно сохранены.');
            return redirect('/administration/offices/index');
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

    protected function validator($request)
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

        $validator->after(function($validator) use ($request) {
            if ( empty($request->input('title_en')) && empty($request->input('title_ru')) && empty($request->input('title_uk')) ) {
                $validator->errors()->add('title_ru', 'Поле "Заголовок" обязательно для заполнения.');
            }

            if ( empty($request->input('description_en')) && empty($request->input('description_ru')) && empty($request->input('description_uk')) ) {
                $validator->errors()->add('description_ru', 'Поле "Описание" обязательно для заполнения.');
            }

            if ( empty($request->input('latitude')) || empty($request->input('latitude')) ||
                    ( empty($request->input('city_en')) && empty($request->input('city_ru')) && empty($request->input('city_uk')) ) ) {
                $validator->errors()->add('address_ru', 'Поле "Адрес" обязательно для заполнения.');
            }
        });

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());

            $this->throwValidationException(
                $request, $validator
            );
        }
    }

    public function view()
    {
        $office = Office::viewData(2);

        return view('backend.site.office-view', [
            'office' => $office,
        ]);
    }

    public function getOffice($id)
    {
        $office = Office::viewData($id);

        if (empty($office)) {
            return response()->json(['status' => 'bad', 'message' => 'Филиал не найден.']);
        }

        $office['office_contact'] = trans('offices.contact');
        $office['office_address'] = trans('offices.address');

        return response()->json(['status' => 'ok', 'data' => $office]);
    }
}