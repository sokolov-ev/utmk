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

        if ($image->type == 'products') {
            $count = Images::where([['owner_id', $image->owner_id], ['type', 'products']])->count();
            if (1 == $count) {
                session()->flash('warning', 'Невозможно удалить последнее изображение');
                return redirect()->back();
            }
        }

        if ($image->delete()) {
            session()->flash('success', 'Изображение удалено');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении изображения');
        }

        return redirect()->back();
    }

    public function download($id)
    {
        $image = Images::findOrFail($id);

        return response()->download('images/' . $image->type . '/' . $image->name);
    }

    public function sort(Request $request)
    {
        $id     = $request->input('id');
        $weight = $request->input('weight');

        if (empty($id) || empty($weight)) {
            return response()->json([
                'success' => false,
                'errors'  => ['Недостаточно данных для сортировки'],
            ]);
        }

        foreach ($id as $key => $value) {
            Images::where('id', $value)->update(['weight' => $weight[$key]]);
        }

        return response()->json([
            'success' => true,
            'errors'  => [],
        ]);
    }
}
