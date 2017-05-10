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
        $data = $request->only(['title', 'body']);

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

        $data = $request->only(['id', 'slug', 'title', 'body_small', 'body']);

        if (ReferenceSection::setSection($data)) {
            // generation of additional data
            ReferenceSection::formingAdditionalData();

            session()->flash('success', 'Секция сохранена');
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

    public function delete($id)
    {
        $section = ReferenceSection::find($id);
        
        if (empty($section)) {
            session()->flash('error', 'Секция не найдена');
            return redirect('/administration/spravka');
        }

        if ($section->delete()) {
            session()->flash('success', 'Секция удалена');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении секции');
        }

        return redirect('/administration/spravka');
    }

    protected function validatorSection($request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['slug'], '-');

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