<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use App\Documents;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Documents::where('type', 'price')->get();
        $documents = Documents::where('type', 'documents')->get();

        return view('backend.site.documents', [
            'prices' => $prices,
            'documents' => $documents,
        ]);
    }

    public function add(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $fileSlug = str_replace(" ", "_", $fileName);

        $request->file('file')->move('./documents/', $fileSlug);
        $res = Documents::create([
            'name' => $fileName, 
            'slug' => $fileSlug, 
            'type' => 'price'
        ]);

        if ($res) {
            session()->flash('success', 'Файл сохранен.');
        } else {
            session()->flash('error', 'Возникла ошибка при сохранении файла.');
        }

        return redirect()->back();
    }

    public function download($id)
    {
        $file = Documents::where([['id', $id], ['type', 'price']])->first();

        if (empty($file)) {
            session()->flash('error', 'Файл ненайден.');
            return redirect()->back();
        }

        $path = "./documents/".$file->slug;

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
        $file = Documents::where([['id', $id], ['type', 'price']])->first();

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
