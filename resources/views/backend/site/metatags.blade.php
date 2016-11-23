@extends('layouts.admin')

@section('title')
    Метатеги
@endsection

@section('css')

@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Метатеги - {{ $metatags['slug'] }}</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-link" onclick="$('.blog').toggleClass('hidden');" style="padding-left: 0;">
                        <strong>Блог</strong>
                    </button>

                    <input type="text" id="blog" name="blog" value="" class="form-control" style="margin-bottom: 10px;" />

                    <ul class="catalog-list blog hidden">
                        <li><a href="/administration/metatags/blog/blog">Главная страница блога</a></li>
                        @foreach($news as $post)
                            <li><a href="/administration/metatags/blog/{{ $post['slug'] }}">{{ $post['name'] }}</a></li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn btn-link" onclick="$('.products').toggleClass('hidden');" style="padding-left: 0;">
                        <strong>Продукция</strong>
                    </button>

                    <input type="text" id="products" name="products" value="" class="form-control" style="margin-bottom: 10px;" />

                    <ul class="catalog-list products hidden">
                        @foreach($products as $product)
                            <li><a href="/administration/metatags/product/{{ $product['slug'] }}">{{ json_decode($product['name'], true)['ru'] }}</a></li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn btn-link" onclick="$('.menu').toggleClass('hidden');" style="padding-left: 0;">
                        <strong>Каталог</strong>
                    </button>

                    <input type="text" id="menu" name="menu" value="" class="form-control" style="margin-bottom: 10px;" />

                    <ul class="catalog-list menu hidden">
                        <li>
                            <a href="/administration/metatags/menu/index">Главная страница (каталога)</a>
                        </li>
                        @foreach($menu as $item)
                            <li><a href="/administration/metatags/menu/{{ $item['slug'] }}">{{ json_decode($item['name'], true)['ru'] }}</a></li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn btn-link" onclick="$('.articles').toggleClass('hidden');" style="padding-left: 0;">
                        <strong>Статьи</strong>
                    </button>

                    <input type="text" id="articles" name="articles" value="" class="form-control" style="margin-bottom: 10px;" />

                    <ul class="catalog-list articles hidden">
                        @foreach($articles as $item)
                            <li><a href="/administration/metatags/article/{{ $item['slug'] }}">{{ json_decode($item['name'], true)['ru'] }}</a></li>
                        @endforeach
                    </ul>


                </div>
                <div class="col-md-8">

                    <form id="form-metatags" role="form" method="POST" action="{{ url("/administration/metatags") }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="type" value="{{ $metatags['type'] }}">
                        <input type="hidden" name="slug" value="{{ $metatags['slug'] }}">

                        <div class="form-group{{ ($errors->has('keywords_en') || $errors->has('keywords_ru') || $errors->has('keywords_uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-keywords" for="keywords">Ключевые слова</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="keywords_en-tab"
                                               class="tab-nice{{ $errors->has('keywords_en') ? ' has-error-label' : '' }}"
                                               href="#keywords_en-body"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="keywords_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="keywords_ru-tab"
                                               class="tab-nice{{ $errors->has('keywords_ru') ? ' has-error-label' : '' }}"
                                               href="#keywords_ru-body"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="keywords_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="keywords_uk-tab"
                                               class="tab-nice{{ $errors->has('keywords_uk') ? ' has-error-label' : '' }}"
                                               href="#keywords_uk-body"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="keywords_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabkeywords" class="tab-content">
                            <div id="keywords_en-body" class="tab-pane fade" role="tabpanel" aria-labelledby="keywords_en-tab">
                                <div class="form-group{{ $errors->has('keywords_en') ? ' has-error' : '' }}">
                                    <textarea id="keywords_en"
                                              name="keywords_en"
                                              class="form-control"
                                              placeholder="Английский"
                                              rows="2">{{ old('keywords_en', $metatags['keywords_en']) }}</textarea>

                                    @if ($errors->has('keywords_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keywords_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="keywords_ru-body" class="tab-pane fade in active" role="tabpanel" aria-labelledby="keywords_ru-tab">
                                <div class="form-group{{ $errors->has('keywords_ru') ? ' has-error' : '' }}">
                                    <textarea id="keywords_ru"
                                              name="keywords_ru"
                                              class="form-control"
                                              placeholder="Русский"
                                              rows="2">{{ old('keywords_ru', $metatags['keywords_ru']) }}</textarea>

                                    @if ($errors->has('keywords_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keywords_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="keywords_uk-body" class="tab-pane fade" role="tabpanel" aria-labelledby="keywords_uk-tab">
                                <div class="form-group{{ $errors->has('keywords_ru') ? ' has-error' : '' }}">
                                    <textarea id="keywords_uk"
                                              name="keywords_uk"
                                              class="form-control"
                                              placeholder="Украинский"
                                              rows="2">{{ old('keywords_uk', $metatags['keywords_uk']) }}</textarea>

                                    @if ($errors->has('keywords_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keywords_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('title_en') || $errors->has('title_ru') || $errors->has('title_uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-title" for="title">Заголовок</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="title_en-tab"
                                               class="tab-nice{{ $errors->has('title_en') ? ' has-error-label' : '' }}"
                                               href="#title_en-body"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="title_ru-tab"
                                               class="tab-nice{{ $errors->has('title_ru') ? ' has-error-label' : '' }}"
                                               href="#title_ru-body"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="title_uk-tab"
                                               class="tab-nice{{ $errors->has('title_uk') ? ' has-error-label' : '' }}"
                                               href="#title_uk-body"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabtitle" class="tab-content">
                            <div id="title_en-body" class="tab-pane fade" role="tabpanel" aria-labelledby="title_en-tab">
                                <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
                                    <textarea id="title_en"
                                              name="title_en"
                                              class="form-control"
                                              placeholder="Английский"
                                              rows="2">{{ old('title_en', $metatags['title_en']) }}</textarea>

                                    @if ($errors->has('title_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_ru-body" class="tab-pane fade in active" role="tabpanel" aria-labelledby="title_ru-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <textarea id="title_ru"
                                              name="title_ru"
                                              class="form-control"
                                              placeholder="Русский"
                                              rows="2">{{ old('title_ru', $metatags['title_ru']) }}</textarea>

                                    @if ($errors->has('title_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_uk-body" class="tab-pane fade" role="tabpanel" aria-labelledby="title_uk-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <textarea id="title_uk"
                                              name="title_uk"
                                              class="form-control"
                                              placeholder="Украинский"
                                              rows="2">{{ old('title_uk', $metatags['title_uk']) }}</textarea>

                                    @if ($errors->has('title_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('description_en') || $errors->has('description_ru') || $errors->has('description_uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-description" for="description">Описание (текст в каталоге)</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="description_en-tab"
                                               class="tab-nice{{ $errors->has('description_en') ? ' has-error-label' : '' }}"
                                               href="#description_en-body"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="description_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="description_ru-tab"
                                               class="tab-nice{{ $errors->has('description_ru') ? ' has-error-label' : '' }}"
                                               href="#description_ru-body"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="description_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="description_uk-tab"
                                               class="tab-nice{{ $errors->has('description_uk') ? ' has-error-label' : '' }}"
                                               href="#description_uk-body"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="description_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabdescription" class="tab-content">
                            <div id="description_en-body" class="tab-pane fade" role="tabpanel" aria-labelledby="description_en-tab">
                                <div class="form-group{{ $errors->has('description_en') ? ' has-error' : '' }}">
                                    <textarea id="description_en"
                                              name="description_en"
                                              class="form-control"
                                              placeholder="Английский"
                                              rows="4">{{ old('description_en', $metatags['description_en']) }}</textarea>

                                    @if ($errors->has('description_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="description_ru-body" class="tab-pane fade in active" role="tabpanel" aria-labelledby="description_ru-tab">
                                <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                    <textarea id="description_ru"
                                              name="description_ru"
                                              class="form-control"
                                              placeholder="Русский"
                                              rows="4">{{ old('description_ru', $metatags['description_ru']) }}</textarea>

                                    @if ($errors->has('description_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="description_uk-body" class="tab-pane fade" role="tabpanel" aria-labelledby="description_uk-tab">
                                <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                    <textarea id="description_uk"
                                              name="description_uk"
                                              class="form-control"
                                              placeholder="Украинский"
                                              rows="4">{{ old('description_uk', $metatags['description_uk']) }}</textarea>

                                    @if ($errors->has('description_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

{{-- Статьи --}}
                @if ($metatags['type'] == 'menu')
                    <div class="catalog">
                @else
                    <div class="catalog hidden">
                @endif
                    <div class="form-group{{ ($errors->has('articles_en') || $errors->has('articles_ru') || $errors->has('articles_uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label tab-articles" for="articles">Статья</label>
                            </div>
                            <div class="col-md-8 customize-tab">
                                <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                    <li role="presentation">
                                        <a id="articles_en-tab"
                                           class="tab-nice{{ $errors->has('articles_en') ? ' has-error-label' : '' }}"
                                           href="#articles_en-body"
                                           role="tab"
                                           data-toggle="tab"
                                           aria-controls="articles_en"
                                           aria-expanded="true">
                                            Английский
                                        </a>
                                    </li>
                                    <li class="active" role="presentation">
                                        <a id="articles_ru-tab"
                                           class="tab-nice{{ $errors->has('articles_ru') ? ' has-error-label' : '' }}"
                                           href="#articles_ru-body"
                                           role="tab"
                                           data-toggle="tab"
                                           aria-controls="articles_ru">
                                            Русский
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a id="articles_uk-tab"
                                           class="tab-nice{{ $errors->has('articles_uk') ? ' has-error-label' : '' }}"
                                           href="#articles_uk-body"
                                           role="tab"
                                           data-toggle="tab"
                                           aria-controls="articles_uk">
                                            Украинский
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="tabarticles" class="tab-content">
                        <div id="articles_en-body" class="tab-pane fade" role="tabpanel" aria-labelledby="articles_en-tab">
                            <div class="form-group{{ $errors->has('articles_en') ? ' has-error' : '' }}">
                                <textarea id="articles_en"
                                          name="articles_en"
                                          class="form-control"
                                          placeholder="Английский"
                                          rows="6">{{ old('articles_en', $metatags['articles_en']) }}</textarea>

                                @if ($errors->has('articles_en'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('articles_en') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id="articles_ru-body" class="tab-pane fade in active" role="tabpanel" aria-labelledby="articles_ru-tab">
                            <div class="form-group{{ $errors->has('articles_ru') ? ' has-error' : '' }}">
                                <textarea id="articles_ru"
                                          name="articles_ru"
                                          class="form-control"
                                          placeholder="Русский"
                                          rows="6">{{ old('articles_ru', $metatags['articles_ru']) }}</textarea>

                                @if ($errors->has('articles_ru'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('articles_ru') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id="articles_uk-body" class="tab-pane fade" role="tabpanel" aria-labelledby="articles_uk-tab">
                            <div class="form-group{{ $errors->has('articles_ru') ? ' has-error' : '' }}">
                                <textarea id="articles_uk"
                                          name="articles_uk"
                                          class="form-control"
                                          placeholder="Украинский"
                                          rows="6">{{ old('articles_uk', $metatags['articles_uk']) }}</textarea>

                                @if ($errors->has('articles_uk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('articles_uk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
{{-- /Статьи --}}
                        <button class="btn btn-primary pull-left action-editer" type="button">
                            Редактор - выкл.
                        </button>

                        <button class="btn btn-success pull-right" type="submit" onclick="saveArticle();">
                            Добавить
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script src="{{ elixir('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script>

        var action = true;

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

        $('#products').keyup(function(event){
            var tut = this;
            var find = tut.value;
            var data = '';

            if (tut.value.length > 0) {
                hideAll('products');
                $('.products').removeClass('hidden');

                $.each($('.products').find('li'), function(key, val){
                    data = $(val).text().toLowerCase();

                    if (data.indexOf(find) != -1) {
                        $(val).removeClass('hidden');
                    }
                });
            } else {
                showAll('products');
            }
        });

        $('#menu').keyup(function(event){
            var tut = this;
            var find = tut.value;
            var data = '';

            if (tut.value.length > 0) {
                hideAll('menu');
                $('.menu').removeClass('hidden');

                $.each($('.menu').find('li'), function(key, val){
                    data = $(val).text().toLowerCase();

                    if (data.indexOf(find) != -1) {
                        $(val).removeClass('hidden');
                    }
                });
            } else {
                showAll('menu');
            }
        });

        $('#articles').keyup(function(event){
            var tut = this;
            var find = tut.value;
            var data = '';

            if (tut.value.length > 0) {
                hideAll('articles');
                $('.articles').removeClass('hidden');

                $.each($('.articles').find('li'), function(key, val){
                    data = $(val).text().toLowerCase();

                    if (data.indexOf(find) != -1) {
                        $(val).removeClass('hidden');
                    }
                });
            } else {
                showAll('articles');
            }
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
                selector: '#articles_en',
                language: 'ru',
                plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
            });

            tinyMCE.init({
                selector: '#articles_ru',
                language: 'ru',
                plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
            });

            tinyMCE.init({
                selector: '#articles_uk',
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

        $(document).ready(function() {
            $("iframe").removeAttr('title');
        });


        $(document).tooltip({
            content: function () {
                return $(this).prop('title');
            }
        });

    </script>

@endsection