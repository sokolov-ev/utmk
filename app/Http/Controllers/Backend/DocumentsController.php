<?php

namespace App\Http\Controllers\Backend;

use App;
use App\Documents;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
    public function add(Request $request)
    {
        $fileName = $request->file('documents')->getClientOriginalName();
        $fileSlug = str_replace(" ", "_", $fileName);

        $request->file('documents')->move('./documents/', $fileSlug);
        $res = Documents::create([
            'name' => $fileName, 
            'slug' => $fileSlug,
            'type' => 'documents'
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
        $file = Documents::where([['id', $id], ['type', 'documents']])->first();

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
        $file = Documents::where([['id', $id], ['type', 'documents']])->first();

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
