<?php

namespace App\Http\Controllers\Backend;

use Validator;
use App\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BanersController extends Controller
{
    public function index()
    {
        $images['slider-index'] = Images::where('type', 'slider-index')->orderBy('weight', 'ASC')->get();
        $images['slider-small'] = Images::where('type', 'slider-small')->orderBy('weight', 'ASC')->get();
        $images['slider-large'] = Images::where('type', 'slider-large')->orderBy('weight', 'ASC')->get();

        return view('backend.baners.index', [
            'images' => $images,
        ]);
    }

    public function store(Request $request)
    {
        if (! $this->validation($request)) {
            return redirect()->back();
        }

        $image = new Images();

        if ($request->input('type') == 'slider-index') {
            $image->width  = 1920;
            $image->height = 636;
        }

        $image->type = $request->input('type');
        $image->addImages($request->file('images'));

        return redirect('/administration/baners');
    }

    public function edit($baners)
    {
        $image = Images::findOrFail($baners);
        $image->getEditData();

        return view('backend.baners.edit', [
            'image' => $image,
        ]);
    }

    public function update(Request $request, $baners)
    {
        $image = Images::findOrFail($baners);
        $image->setData($request->all());

        if ($image->save()) {
            session()->flash('success', 'Данные слайда сохраннены');
        } else {
            session()->flash('error', 'Ошибка сохранннения данных слайда');
        }

        return redirect('/administration/baners');
    }

    protected function validation($request)
    {

        if ($request->input('type') == 'slider-index') {
            $rules = ['images.*' => 'image|dimensions:min_width=1920,min_height=636'];
        }

        if ($request->input('type') == 'slider-small') {
            $rules = ['images.*' => 'image|dimensions:max_width=300,max_height=300'];
        }

        if ($request->input('type') == 'slider-large') {
            $rules = ['images.*' => 'image|dimensions:max_width=300,max_height=465'];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            return false;
        }

        return true;
    }

}
