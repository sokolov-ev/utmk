<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Images;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Images::where('type', 'other')->orderBy('created_at', 'DESC')->get();

        return view('backend.images.index', [
            'images' => $images
        ]);
    }

    public function add(Request $request)
    {
        Images::addImagesLinck($request->file('images'));

        return redirect()->back();
    }

    public function delete($id)
    {
        $image = Images::findOrFail($id);

        if ($image->delete()) {
            session()->flash('success', 'Изображение удалено.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении изображения.');
        }

        return redirect()->back();
    }
}
