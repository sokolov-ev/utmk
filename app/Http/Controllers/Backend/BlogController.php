<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Validator;

use App\DataTable;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('backend.blog.index', []);
    }

    public function preview($slug)
    {
        $news = Blog::where('slug', $slug)->first();

        if (empty($news)) {
            abort(404);
        }

        return view('backend.blog.preview', [
            'news' => $news,
        ]);
    }

    public function filtering(Request $request)
    {
        $count = empty($request->get("length")) ? 10 : $request->get("length");
        $page  = $request->get("start");

        list($orderName, $orderDir) = DataTable::getOrderBlog($request->all());
        $where = DataTable::getSearchBlog($request->all());

        $news = Blog::where($where)
                    ->orderBy($orderName, $orderDir)
                    ->take($count)
                    ->skip($page)
                    ->get();

        $result = [];

        $totalData = Blog::count();
        $totalFiltered = $totalData;

        foreach ($news as $value) {
            $temp["id"]        = (string) $value->id;
            $temp["slug"]      = $value->slug;
            $temp["published"] = $value->published;
            $temp["title"]     = $value->title;
            $temp["show_this"] = $value->show_this ? 'Да' : 'Нет';

            $result[] = $temp;
        }

        $totalFiltered = count($result);

        return response()->json([
            "status" => "ok",
            "draw" => $request->get("draw"),
            "recordsTotal" => (string) $totalFiltered,
            "recordsFiltered" => (string) $totalData,
            "data" => $result,
        ]);
    }

    public function addForm()
    {
        return view('backend.blog.news-add');
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $data['slug']  = str_slug($request->input('slug'), '-');
        $data['image'] = $request->file('image');

        $validator = Validator::make($data, [
            'image' => 'image',
            'slug'  => 'unique:blog,slug',
            'title' => 'string|min:3',
            'description' => 'string|min:10',
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            $this->throwValidationException($request, $validator);
        }

        if (Blog::actionNews(null, $data)) {
            session()->flash('success', 'Новость добавлена.');
            return redirect('/administration/blog');
        }

        session()->flash('error', 'Возникла ошибка при добавлении новости.');
        return redirect()->back();
    }

    public function editForm($id)
    {
        $news = Blog::findOrFail($id);

        return view('backend.blog.news-edit', [
            'news' => $news->toArray(),
        ]);
    }

    public function edit(Request $request, $id)
    {
        $data = $request->all();
        $data['slug']  = str_slug($request->input('slug'), '-');
        $data['image'] = $request->file('image');

        $validator = Validator::make($data, [
            'image' => 'image',
            'slug'  => 'unique:blog,slug,'.$id,
            'title' => 'string|min:3',
            'description' => 'string|min:10',
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            $this->throwValidationException($request, $validator);
        }

        if (Blog::actionNews($id, $data)) {
            session()->flash('success', 'Новость изменена.');
            return redirect('/administration/blog');
        }

        session()->flash('error', 'Возникла ошибка при изменении новости.');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $news = Blog::find($request->input('id'));

        if (empty($news)) {
            session()->flash('error', 'Запись не найдена.');
            return redirect()->back();
        }

        if ($news->delete()) {
            session()->flash('success', 'Запись удалена.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении записи.');
        }

        return redirect()->back();
    }

    public function deleteImg($id)
    {
        $news = Blog::findOrFail($id);

        if ($news->deleteImage($news->image)) {
            $news->image = '';
            $news->save();

            session()->flash('success', 'Изображение удалено.');
        } else {
            session()->flash('warning', 'Возникла ошибка при удалении изображения.');
        }

        return redirect()->back();
    }
}
