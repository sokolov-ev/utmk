<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Menu;
use App\Metatags;
use App\Products;
use App\Articles;
use App\Office;
use App\ReferenceSection;

class MetatagsContraller extends Controller
{
    public function index($type = 'article', $slug = 'home')
    {
        $metatags = Metatags::where([['type', $type], ['slug', $slug]])->first();
        $metatags = Metatags::getEditData($metatags, $type, $slug);

        $news     = Blog::select('slug', 'title AS name')->get();
        $menu     = Menu::select('slug', 'name')->orderBy('weight', 'ASC')->get();
        $products = Products::select('slug', 'title AS name')->where('show_my', 1)->orderBy('title', 'ASC')->get();
        $articles = Articles::select('slug', 'name')->orderBy('name', 'ASC')->get();
        $offices  = Office::select('id', 'title AS name')->orderBy('name', 'ASC')->get();
        $referenceSection = ReferenceSection::select('slug', 'title AS name')->get();

        return view('backend.site.metatags', [
            'metatags' => $metatags,
            'menu'     => $menu->toArray(),
            'news'     => $news->toArray(),
            'products' => $products->toArray(),
            'articles' => $articles->toArray(),
            'offices'  => $offices->toArray(),
            'referenceSection' => $referenceSection->toArray(),
        ]);
    }

    public function add(Request $request)
    {
        if ($metatags = Metatags::setMetatags($request->all())) {
            session()->flash('success', 'Мета данные сохранены.');
            return redirect('/administration/metatags/'.$metatags->type.'/'.$metatags->slug);
        } else {
            session()->flash('error', 'Возникла ошибка при сохранении мета данных.');
            return redirect('/administration/metatags/'.$request->input('type').'/'.$request->input('slug'))->withInput();
        }
    }
}