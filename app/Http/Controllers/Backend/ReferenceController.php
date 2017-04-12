<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App;
use Validator;

use App\Reference;
use App\ReferenceSection;

class ReferenceController extends Controller
{
    use ValidatesRequests;

    public function index($slug = '') 
    {
        $reference = ReferenceSection::getSection($slug);

        return view('backend.reference.index', [
            'reference' => $reference,
        ]);
    }

    public function indexEditForm()
    {
        $reference = Reference::getReference();

        return view('backend.reference.index-edit', [
            'reference' => $reference,
        ]);
    }

    public function indexEdit(Request $request)
    {
        $data = $request->only(['title_en', 'title_ru', 'title_uk', 'body_en', 'body_ru', 'body_uk']);

        if (Reference::setReference($data)) {
            session()->flash('success', 'Данные главной страницы справки обновлены');
        } else {
            session()->flash('error', 'Возникла ошибка при обновлении главной страницы справки');
        }

        return redirect('/administration/spravka');
    }

    public function allSections() 
    {
        $sections = ReferenceSection::allSections();

        return response()->json($sections);
    }

    public function setSection(Request $request) 
    {
        $this->validatorSection($request);

        $data = $request->only([
            'slug',
            'title_en',
            'title_ru',
            'title_uk',
            'body_small_en',
            'body_small_ru',
            'body_small_uk',
            'body_en',
            'body_ru',
            'body_uk',
        ]);

        if (ReferenceSection::setSection($data)) {
            session()->flash('success', 'Секция создана');
        } else {
            session()->flash('error', 'Возникла ошибка при создании секции');
        }

        return redirect('/administration/spravka');
    }

    public function sortSection(Request $request) 
    {
        $id     = $request->input('id');
        $weight = $request->input('weight');
        $parent = $request->input('parent');
        $array  = [];

        if (empty($id) || empty($weight)) {
            return response()->json(['status' => 'bad']);
        }

        for ($i = 0; $i < count($id); $i++) {
            $array[$id[$i]]['parent'] = $parent[$i];
            $array[$id[$i]]['weight'] = $weight[$i];
        }

        $sections = ReferenceSection::all();

        foreach ($sections as $section) {
            $section->parent_id = $array[$section->id]['parent'];
            $section->weight = $array[$section->id]['weight'];
            $section->update();
        }

        ReferenceSection::formingAdditionalData();

        return response()->json(['status' => 'ok']);
    }

    protected function validatorSection($request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'slug' => 'required|unique:reference_section,slug,'.$data['id'],
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());

            $this->throwValidationException(
                $request, $validator
            );
        }
    }
}