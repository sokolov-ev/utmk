@extends('layouts.admin')

@section('title')
    Редактирование: {{ $product['title_name'] }}
@endsection

@section('css')
    <link href="{{ elixir('css/fileinput.css') }}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/select2.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Редактирование: {{ $product['title_name'] }}</h3>
        </div>
        <div class="box-body">

            <ol class="breadcrumb">
                <li><a href="{{ url('administration/products') }}">Продукция</a></li>
                <li class="active">Редактирование: {{ $product['title_name'] }}</li>
            </ol>

            <div class="hidden language" data-lang="{{ App::getLocale() }}"></div>

            <form id="form-edit-product" role="form" method="POST" action="{{ url('administration/product/edit/'.$product['id']) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">

                        <div class="form-group{{ $errors->has('images.0') ? ' has-error' : '' }}">
                            <label for="images" class="control-label">Изображения</label>

                            <input type="file" id="images" name="images[]" class="file-loading" multiple data-show-upload="false" data-show-caption="true">

                            @if ($errors->has('images.0'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('images.0') }}</strong>
                                </span>
                            @endif
                        </div>

                        @if (!empty($product['images']))
                            <p><label>Изображения продукции</label></p>

                            <div class="img-weight">
                                @foreach ($product['images'] as $img)
                                    <div id="preview-{{ $img['id'] }}" data-img="{{ $img['id'] }}" class="pull-left file-preview-body">
                                        <div class="file-preview-frame">
                                            <img src="/images/products/{{ $img['name'] }}"
                                                 alt="{{ $img['name'] }}"
                                                 class="file-preview-image">

                                            <div class="file-thumbnail-footer">
                                                <button class="btn btn-danger btn-xs pull-left delete-img" data-id="{{ $img['id'] }}" type="button">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                                <a class="btn btn-primary btn-xs pull-right" href="{{ url('/administration/product/img/download/'.$img['id']) }}">
                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                </a>
                                                <div class="pull-left">
                                                    {{ mb_substr($img['name'], 0, 18, 'UTF-8').'...' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <p class="clearfix"> </p>
                        @endif

                        <div class="form-group{{ $errors->has('menu_id') ? ' has-error' : '' }}">
                            <label for="menu_id" class="control-label">Раздел меню</label>

                            <select name="menu_id" id="menu_id" class="form-control">
                                @foreach($menu->toArray() as $item)
                                    <option value="{{ $item['id'] }}" {{ ($item['id'] == $product['menu_id']) ? 'selected=""' : '' }}>
                                        {{ json_decode($item['text'], true)[App::getLocale()] }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('menu_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('menu_id') }}</strong>
                                </span>
                            @endif
                        </div>

                        @if ($isAdmin)
                            <div class="form-group{{ $errors->has('office_id') ? ' has-error' : '' }}">
                                <label for="office_id" class="control-label">Филиал</label>

                                <select name="office_id" id="office_id" class="form-control">
                                    @foreach($offices->toArray() as $item)
                                        <option value="{{ $item['id'] }}" {{ ($item['id'] == $product['office_id']) ? 'selected=""' : '' }}>
                                            {{ json_decode($item['text'], true)[App::getLocale()] }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('office_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('office_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        @else
                            <input type="hidden" name="office_id" id="office_id" value="{{ old('office_id', $offices) }}">
                        @endif

                        <div class="form-group{{ ($errors->has('title_en') || $errors->has('title_ru') || $errors->has('title_uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-title" for="advertising-title">Заголовок</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="title_en-tab"
                                               class="tab-nice{{ $errors->has('title_en') ? ' has-error-label' : '' }}"
                                               href="#title_en"
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
                                               href="#title_ru"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="title_uk-tab"
                                               class="tab-nice{{ $errors->has('title_uk') ? ' has-error-label' : '' }}"
                                               href="#title_uk"
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

                        <div id="tabTitle" class="tab-content">
                            <div id="title_en" class="tab-pane fade" role="tabpanel" aria-labelledby="title_en-tab">
                                <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
                                    <input id="title_en"
                                           name="title_en"
                                           type="text"
                                           class="form-control"
                                           value="{{ old('title_en', $product['title_en']) }}"
                                           placeholder="Английский">

                                    @if ($errors->has('title_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="title_ru-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <input id="title_ru"
                                           name="title_ru"
                                           type="text"
                                           class="form-control"
                                           value="{{ old('title_ru', $product['title_ru']) }}" placeholder="Русский">

                                    @if ($errors->has('title_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="title_uk-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <input id="title_uk"
                                           name="title_uk"
                                           type="text"
                                           class="form-control"
                                           value="{{ old('title_uk', $product['title_uk']) }}"
                                           placeholder="Украинский">

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
                                    <label class="control-label tab-description" for="advertising-description">Описание</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="description_en-tab"
                                               class="tab-nice{{ $errors->has('description_en') ? ' has-error-label' : '' }}"
                                               href="#description_en"
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
                                               href="#description_ru"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="description_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="description_uk-tab"
                                               class="tab-nice{{ $errors->has('description_uk') ? ' has-error-label' : '' }}"
                                               href="#description_uk"
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
                            <div id="description_en" class="tab-pane fade" role="tabpanel" aria-labelledby="description_en-tab">
                                <div class="form-group{{ $errors->has('description_en') ? ' has-error' : '' }}">
                                    <textarea id="description_en"
                                              name="description_en"
                                              class="form-control"
                                              placeholder="Английский"
                                              rows="6">{{ old('description_en', $product['description_en']) }}</textarea>

                                    @if ($errors->has('description_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="description_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="description_ru-tab">
                                <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                    <textarea id="description_ru"
                                              name="description_ru"
                                              class="form-control"
                                              placeholder="Русский"
                                              rows="6">{{ old('description_ru', $product['description_ru']) }}</textarea>

                                    @if ($errors->has('description_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="description_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="description_uk-tab">
                                <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                    <textarea id="description_uk"
                                              name="description_uk"
                                              class="form-control"
                                              placeholder="Украинский"
                                              rows="6">{{ old('description_uk', $product['description_uk']) }}</textarea>

                                    @if ($errors->has('description_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class=" control-label">Цена</label>

                            <input id="price" type="text" class="form-control" name="price" value="{{ old('price', $product['price']) }}">

                            @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                            <label for="rating" class="control-label">Рейтинг</label>

                            <input id="rating" type="text" class="form-control" name="rating" value="{{ old('rating', $product['rating']) }}">

                            @if ($errors->has('rating'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rating') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="show_my" name="show_my" {{ $product['show_my'] ? 'checked=""' : '' }} style="margin: 0 -20px;">
                                Показывать
                            </label>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                        <button class="btn btn-warning pull-right" type="submit" from="form-edit-product">
                            Сохранить изменения
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

@endsection

@section('scripts')


    <script src="{{ elixir('js/fileinput.js') }}"></script>
    <script src="{{ elixir('js/jquery-ui.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $("#images").fileinput({
            language: $(".language").data('lang'),
            allowedFileExtensions: ["jpg", "jpeg", "png", "bmp", "gif", "svg"],
        });

        $('.delete-img').click(function(event){
            var id = $(this).data('id');
            $.post('/administration/product/img/delete', {id: id}, function(response){
                if (response.status == 'ok') {
                    $('#preview-'+id).remove();
                }
            }, 'json');
        });

        $('.img-weight').sortable({
            stop: function(event, ui) {
                var id     = [];
                var rows   = $('.img-weight').find('.file-preview-body');
                var weight = [];

                $.each(rows, function(key, val){
                    weight.push(key+1);
                    id.push($(val).data('img'));
                });

                $.post('/administration/product/img/sort', {id: id, weight: weight}, function(response){
                    console.log(response);
                }, 'json');
            }
        });
    </script>

@endsection