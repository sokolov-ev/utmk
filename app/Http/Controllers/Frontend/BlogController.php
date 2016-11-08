<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Metatags;

class BlogController extends Controller
{
    public function index()
    {
        $metatags = Metatags::where([['type', 'blog'], ['slug', 'blog']])->first();
        $metatags = Metatags::getViewData($metatags);

        $news = Blog::orderBy('created_at', 'DESC')->paginate(20);

        return view('frontend.blog.index', [
            'metatags' => $metatags,
            'news' => $news,
        ]);
    }

    public function view($slug)
    {
        $news = Blog::where('slug', $slug)->first();

        if (empty($news)) {
            abort(404);
        }

        $metatags = Metatags::where([['type', 'blog'], ['slug', $slug]])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.blog.view', [
            'news' => $news,
            'metatags' => $metatags,
        ]);
    }
}
