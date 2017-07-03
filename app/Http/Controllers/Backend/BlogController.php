<?php

namespace App\Http\Controllers\Backend;

use Validator;
use App\Blog;
use App\Images;
use App\DataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BlogController extends Controller
{
    public function index()
    {
        return view('backend.blog.index', []);
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

    public function create()
    {
        return view('backend.blog.news-add');
    }

    public function store(Request $request)
    {
        $this->validateNews($request);
        $data = $request->all();

        setlocale(LC_TIME, 'ru_RU.UTF-8', 'Rus');

        $news = new Blog();
        $news->fill($data);
        $news->slug      = str_slug($data['slug'], '-');
        $news->show_this = !empty($data['show_this']);
        $news->published = strftime('%B %d, %G', time());

        if (!$news->save()) {
            session()->flash('error', 'Возникла ошибка при добавлении новости');
            return redirect()->back();
        }

        $news->addImage($request->file('image'));

        session()->flash('success', 'Новость добавлена');
        return redirect('/administration/blog');
    }

    public function show($blog)
    {
        $news = Blog::findOrFail($blog);

        return view('backend.blog.preview', [
            'news' => $news,
        ]);
    }

    public function edit($blog)
    {
        $news = Blog::findOrFail($blog);

        return view('backend.blog.news-edit', [
            'news' => $news,
        ]);
    }

    public function update(Request $request, $blog)
    {
        $this->validateNews($request, $blog);
        $data = $request->all();

        $news = Blog::findOrFail($blog);
        $news->fill($data);
        $news->image     = '';
        $news->slug      = str_slug($data['slug'], '-');
        $news->show_this = !empty($data['show_this']);

        if (!$news->save()) {
            session()->flash('error', 'Возникла ошибка при изменении новости');
            return redirect()->back();
        }

        if ($request->file('image')) {
            $news->image()->delete();
            $news->addImage($request->file('image'));
        }

        session()->flash('success', 'Новость изменена');
        return redirect('/administration/blog');
    }

    public function destroy($blog)
    {
        $news = Blog::findOrFail($blog);

        if ($news->delete()) {
            session()->flash('success', 'Запись удалена.');
        } else {
            session()->flash('error', 'Возникла ошибка при удалении записи.');
        }

        return redirect()->back();
    }

    protected function validateNews($request, $blog)
    {
        $data = $request->all();
        $data['slug']  = str_slug($request->input('slug'), '-');
        $data['image'] = $request->file('image');

        $validator = Validator::make($data, [
            'image' => 'image',
            'slug'  => 'required|unique:blog,slug,' . $blog,
            'title' => 'string|min:3',
            'body'  => 'string|min:10',
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            $this->throwValidationException($request, $validator);
        }
    }
}
