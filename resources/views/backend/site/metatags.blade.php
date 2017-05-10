@extends('layouts.admin')

@section('title')
    Метатеги
@endsection

@section('css')

@endsection

@section('content')

<section class="content container metatags">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Метатеги - {{ $metatags['slug'] }}</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-link edit-btn" onclick="$('.offices').toggleClass('hidden');">
                        <strong>Филиалы</strong>
                    </button>

                    <br/>
                    <ul class="catalog-list offices hidden">
                        @foreach($offices as $office)
                            <li><a href="/administration/metatags/office/{{ $office['slug'] }}">{{ json_decode($office['name'], true)['ru'] }}</a></li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn btn-link edit-btn" onclick="$('.articles').toggleClass('hidden');">
                        <strong>Статьи</strong>
                    </button>

                    <input type="text" name="articles" class="form-control edit-input find-input" data-section="articles">
                    <br>
                    <ul class="catalog-list articles hidden">
                        @foreach($articles as $item)
                            <li><a href="/administration/metatags/article/{{ $item['slug'] }}">{{ json_decode($item['name'], true)['ru'] }}</a></li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn btn-link edit-btn" onclick="$('.blog').toggleClass('hidden');">
                        <strong>Блог</strong>
                    </button>

                    <input type="text" id="blog" name="blog" class="form-control edit-input">
                    <br>
                    <ul class="catalog-list blog hidden">
                        <li><a href="/administration/metatags/blog/blog">Главная страница блога</a></li>
                        @foreach($news as $post)
                            <li><a href="/administration/metatags/blog/{{ $post['slug'] }}">{{ $post['name'] }}</a></li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn btn-link edit-btn" onclick="$('.reference').toggleClass('hidden');">
                        <strong>Справочник</strong>
                    </button>

                    <input type="text" name="reference" class="form-control edit-input find-input" data-section="reference">
                    <br>
                    <ul class="catalog-list reference hidden">
                        <li><a href="/administration/metatags/reference/index">Главная страница справки</a></li>
                        @foreach($referenceSection as $section)
                            <li><a href="/administration/metatags/reference/{{ $section['slug'] }}">{{ json_decode($section['name'], true)['ru'] }}</a></li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn btn-link edit-btn" onclick="$('.menu').toggleClass('hidden');">
                        <strong>Каталог</strong>
                    </button>

                    <input type="text" name="menu" class="form-control edit-input find-input" data-section="menu">
                    <br>
                    <ul class="catalog-list menu hidden">
                        <li>
                            <a href="/administration/metatags/menu/products">Главная страница каталога</a>
                        </li>
                        @foreach($menu as $item)
                            <li><a href="/administration/metatags/menu/{{ $item['slug'] }}">{{ json_decode($item['name'], true)['ru'] }}</a></li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn btn-link edit-btn" onclick="$('.products').toggleClass('hidden');">
                        <strong>Продукция</strong>
                    </button>

                    <input type="text" name="products" class="form-control edit-input find-input" data-section="products">
                    <br>
                    <ul class="catalog-list products hidden">
                        @foreach($products as $product)
                            <li><a href="/administration/metatags/product/{{ $product['slug'] }}">{{ json_decode($product['name'], true)['ru'] }}</a></li>
                        @endforeach
                    </ul>

                </div>
                <div class="col-md-8">

                    <form id="form-metatags" role="form" method="POST" action="{{ url("/administration/metatags") }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="type" value="{{ $metatags['type'] }}">
                        <input type="hidden" name="slug" value="{{ $metatags['slug'] }}">

                        @include('backend.site.partial.textarea-edit', ['name' => 'keywords', 'title' => 'Ключевые слова', 'data' => $metatags['keywords']])

                        @include('backend.site.partial.textarea-edit', ['name' => 'title', 'title' => 'Заголовок', 'data' => $metatags['title']])

                        @include('backend.site.partial.textarea-edit', ['name' => 'description', 'title' => 'Описание', 'data' => $metatags['description']])

                        <div class="catalog {{ $isArticle ? '' : 'hidden' }}">
                            @include('backend.site.partial.input-edit', ['name' => 'h1', 'title' => 'Заголовок H1', 'data' => $metatags['h1']])
                            @include('backend.site.partial.textarea-edit', ['name' => 'articles', 'title' => 'Статья', 'data' => $metatags['articles']])
                        </div>

                        <button class="btn btn-primary pull-left action-editer {{ $isArticle ? '' : 'hidden' }}" type="button">
                            Редактор - выкл.
                        </button>

                        <button class="btn btn-success pull-right" type="submit" onclick="saveArticle();">
                            Сохранить
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script>
        let action = true;

        $('.find-input').keyup(function(event){
            let vm   = this;
            let find = $(vm).data('section');
            let text = vm.value;
            let data = '';

            hideAll(find);
                
            $('.' + find).removeClass('hidden');

            $.each($('.' + find).find('li'), function(key, val){
                data = $(val).text().toLowerCase();

                if (data.indexOf(text) != -1) {
                    $(val).removeClass('hidden');
                }
            });
        });

        function showAll(type)
        {
            $.each($('.'+type).find('li'), function(key, val){
                $(val).removeClass('hidden');
            })
        }

        function hideAll(type)
        {
            $.each($('.'+type).find('li'), function(key, val){
                $(val).addClass('hidden');
            })
        }

        function saveArticle()
        {
            tinyMCE.get('articles_en').save();
            tinyMCE.get('articles_ru').save();
            tinyMCE.get('articles_uk').save();
        }

        function initArticle()
        {
            tinyMCE.init({
                selector: '#articles_en, #articles_ru, #articles_uk',
                language: 'ru',
                plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
            });
        }

        initArticle();

        function destroyArticle()
        {
            tinyMCE.get('articles_en').remove();
            tinyMCE.get('articles_ru').remove();
            tinyMCE.get('articles_uk').remove();
        }

        $('.action-editer').click(function(event){
            if (action) {
                action = false;

                saveArticle();
                destroyArticle();

                $(this).text('Редактор - вкл.');
            } else {
                action = true;

                initArticle();

                $(this).text('Редактор - выкл.');
            }
        });

        $(document).ready(function() {
            $("iframe").removeAttr('title');
        });
    </script>

@endsection