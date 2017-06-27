<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Metatags;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $metatags = Metatags::where([['type', 'blog'], ['slug', 'blog']])->first();
        $metatags = Metatags::getViewData($metatags);

        $blog = Blog::orderBy('created_at', 'DESC')->paginate(20);

        return view('frontend.blog.index', [
            'blog'     => $blog,
            'metatags' => $metatags,
        ]);
    }

    public function view($slug)
    {
        $news = Blog::where('slug', $slug)->firstOrFail();

        $metatags = Metatags::where([['type', 'blog'], ['slug', $slug]])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.blog.view', [
            'news'     => $news,
            'metatags' => $metatags,
        ]);
    }
}
