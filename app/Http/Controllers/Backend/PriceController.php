<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use App\FilePrice;

class PriceController extends Controller
{
    public function index()
    {
        $files = FilePrice::all();

        return view('backend.site.price', [
            'files' => $files,
        ]);
    }

    public function add(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $fileSlug = str_replace(" ", "_", $fileName);

        $request->file('file')->move('./files/', $fileSlug);

        if ( FilePrice::create(['name' => $fileName, 'slug' => $fileSlug]) ) {
            session()->flash('success', 'Файл сохранен.');
        } else {
            session()->flash('error', 'Возникла ошибка при сохранении файла.');
        }

        return redirect()->back();
    }

    public function download($id)
    {
        $file = FilePrice::where('id', $id)->first();

        if (empty($file)) {
            session()->flash('error', 'Файл ненайден.');
            return redirect()->back();
        }

        $path = "./files/".$file->slug;

        if (file_exists($path)) {
            $headers = ['Content-Type: application/file'];
            return response()->download($path, $file->name, $headers);
        } else {
            session()->flash('error', 'Файл ненайден.');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $file = FilePrice::where('id', $id)->first();

        if (empty($file)) {
            session()->flash('error', 'Файл ненайден.');
            return redirect()->back();
        }

        if ($file->delete()) {
            session()->flash('success', 'Файл удален.');
        } else {
            session()->flash('error', 'Файл ненайден.');
        }

        return redirect()->back();
    }
}
