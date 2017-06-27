<?php

namespace App\Http\Controllers\Backend;

use App\Images;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function index()
    {
        $images['blog'] = Images::where([['owner_id', 0], ['type', 'blog']])->orderBy('created_at', 'DESC')->get();
        $images['reference'] = Images::where([['owner_id', 0], ['type', 'reference']])->orderBy('created_at', 'DESC')->get();

        return view('backend.images.index', [
            'images' => $images,
        ]);
    }

    public function store(Request $request)
    {
        $image = new Images();
        $image->type = $request->input('type');
        $image->addImages($request->file('images'));

        return redirect()->back();
    }

    public function destroy($id)
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
