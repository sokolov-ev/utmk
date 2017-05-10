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
        if ($id) {
            $offices = Office::where('id', $id)->get();
        } else {
            $offices = Office::all();
        }

        $result = [];

        foreach ($offices as $office) {
            $office->title   = json_decode($office->title, true)[App::getLocale()];
            $office->address = json_decode($office->address, true)[App::getLocale()];
            $result[] = $office;
        }

        return view('backend.site.offices', [
            'offices' => $result,
        ]);
    }

    public function addFormOffice()
    {
        $officeType  = Office::getType();
        $contactType = Contacts::getType();

        return view('backend.site.office-add', [
            'officeType'  => $officeType,
            'contactType' => $contactType,
        ]);
    }

    public function addOffice(Request $request)
    {
        $this->validator($request, '');

        if ($office = Office::actionOffice(null, $request->all())) {
            Contacts::createContacts($office->id, $request->input('contacts_type'), $request->input('contacts_data'));
            session()->flash('success', 'Филиал успешно добавлен.');
            return redirect('/administration/offices/index');
        }

        session()->flash('error', 'Возникла ошибка при добавлении Филиала.');
        return redirect()->back();
    }

    public function editFormOffice($id)
    {
        $office      = Office::parseData($id);
        $contacts    = Contacts::parseData($office['id']);
        $officeType  = Office::getType();
        $contactType = Contacts::getType();

        return view('backend.site.office-edit', [
            'office'      => $office,
            'contacts'    => $contacts,
            'officeType'  => $officeType,
            'contactType' => $contactType,
        ]);
    }

    public function editOffice(Request $request, $id)
    {
        $this->validator($request, $id);

        if ($office = Office::actionOffice($id, $request->all())) {
            Contacts::editContacts($office->id, $request->all());
            session()->flash('success', 'Данные филиала успешно сохранены.');
        } else {
            session()->flash('error', 'Возникла ошибка при сохранении данных филиала.');    
        }
        
        return redirect()->back();
    }

    public function deleteOffice(Request $request)
    {
        if (Office::destroy($request->input('id')) ) {
            session()->flash('success', 'Филиал успешно удален.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении филиала.');
        }

        return redirect('/administration/offices/index');
    }

    protected function validator($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'office_type' => 'required_with:'.Office::listType(),

            'slug' => 'required|string|min:3|unique:offices,slug,'.$id,

            'title.en' => 'string|min:3',
            'title.ru' => 'string|min:3',
            'title.uk' => 'string|min:3',

            'description.en' => 'string|min:10',
            'description.ru' => 'string|min:10',
            'description.uk' => 'string|min:10',

            'address.ru' => 'required|string',

            'contacts_type.*' => 'required_with:'.Contacts::listType(),
            'contacts_data.*' => 'required|string|min:3',
        ]);

        $validator->after(function($validator) use ($request) {
            if ( empty($request->input('title.en')) && empty($request->input('title.ru')) && empty($request->input('title.uk')) ) {
                $validator->errors()->add('title.ru', 'Поле "Заголовок" обязательно для заполнения.');
            }

            if ( empty($request->input('title_short.en')) && empty($request->input('title_short.ru')) && empty($request->input('title_short.uk')) ) {
                $validator->errors()->add('title_short.ru', 'Поле "Короткий заголовок" обязательно для заполнения.');
            }

            if ( empty($request->input('description.en')) && empty($request->input('description.ru')) && empty($request->input('description.uk')) ) {
                $validator->errors()->add('description.ru', 'Поле "Описание" обязательно для заполнения.');
            }

            if ( empty($request->input('latitude')) || empty($request->input('latitude')) ||
                    ( empty($request->input('city.en')) && empty($request->input('city.ru')) && empty($request->input('city.uk')) ) ) {
                $validator->errors()->add('address.ru', 'Поле "Адрес" обязательно для заполнения.');
            }
        });

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());

            $this->throwValidationException(
                $request, $validator
            );
        }
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