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
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{ old('id', $product['id']) }}">


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

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="control-label">Slug (отображение в адресной строке)</label>
                            <input id="slug" name="slug" type="text" class="form-control" value="{{ old('slug', $product['slug']) }}">

                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                        </div>

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
                                              rows="6">{{ old('description_en', $product['description_en']) }}</textarea>

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
                                              rows="6">{{ old('description_ru', $product['description_ru']) }}</textarea>

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
                                              rows="6">{{ old('description_uk', $product['description_uk']) }}</textarea>

                                    @if ($errors->has('description_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
{{-- Начало гемороя с ценами --}}
                        <div id="product-prices">
                            <div class="form-group{{ $errors->has('price.0') ? ' has-error' : '' }}" style="margin-bottom: 0;">
                                <label for="" class="control-label">Цены</label>
                            </div>

                            <div class="form-group{{ $errors->has('price.0') ? ' has-error' : '' }}">
                                <div class="flex">
                                    <input type="hidden" name="price_id[]" class="price-id" value="{{ old('price_id.0', $prices['id'][0]) }}">
                                    <div>
                                        <input type="text"
                                               name="price[]"
                                               class="form-control price-data"
                                               value="{{ old('price.0', $prices['price'][0]) }}"
                                               placeholder="Цена">
                                    </div>
                                    <div class="price-type">
                                        <select name="price_type[]" class="form-control price-type">
                                            @foreach($priceType as $key => $type)
                                                @if ($key == old('price_type.0', $prices['type'][0]))
                                                    <option value="{{$key}}" selected="">{{ trans('products.measures.'.$type) }}</option>
                                                @else
                                                    <option value="{{$key}}">{{ trans('products.measures.'.$type) }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="btn-wrap">
                                        <button class="btn btn-success btn-add" type="button">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>

                                @if ($errors->has('price.0'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price.0') }}</strong>
                                    </span>
                                @endif
                            </div>

                            @if (count(old('price', $prices['price'])) > 1)
                                @for($i = 1; $i < count( old('price', $prices['price']) ); $i++)
                                    <div class="form-group{{ $errors->has('price.'.$i) ? ' has-error' : '' }}">
                                        <div class="flex">
                                            <?php
                                              $id    = empty($prices['id'][$i]) ? '' : $prices['id'][$i];
                                              $price = empty($prices['price'][$i]) ? '' : $prices['price'][$i];
                                              $type  = empty($prices['type'][$i]) ? 'piece' : $prices['type'][$i];
                                            ?>
                                            <input type="hidden" name="price_id[]" value="{{ old('price_id.'.$i, $id) }}">
                                            <div>
                                                <input type="text"
                                                       name="price[]"
                                                       class="form-control price-data"
                                                       value="{{ old('price.'.$i, $price) }}"
                                                       placeholder="Цена">
                                            </div>
                                            <div class="price-type">
                                                <select name="price_type[]" class="form-control price-type">
                                                    @foreach($priceType as $key => $type)
                                                        @if ($key == old('price_type.'.$i, $prices['type'][$i]))
                                                            <option value="{{$key}}" selected="">{{ trans('products.measures.'.$type) }}</option>
                                                        @else
                                                            <option value="{{$key}}">{{ trans('products.measures.'.$type) }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="btn-wrap">
                                                <button class="btn btn-danger btn-delete" type="button">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>

                                        @if ($errors->has('price.'.$i))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('price.'.$i) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                @endfor
                            @endif

                        </div>
{{-- Конец гемороя с ценами --}}
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
                        <button class="btn btn-warning pull-right" type="submit" from="form-edit-product" onclick="saveDescription();">
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
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

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

        var descriptionEn = tinyMCE.init({
                selector: '#description_en',
                language: 'ru',
                plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
            });

        var descriptionRu = tinyMCE.init({
                selector: '#description_ru',
                language: 'ru',
                plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
            });

        var descriptionUk = tinyMCE.init({
                selector: '#description_uk',
                language: 'ru',
                plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
            });

        function saveDescription()
        {
            descriptionEn.triggerSave();
            descriptionRu.triggerSave();
            descriptionUk.triggerSave();
        }

        $(document).ready(function() {
            $("iframe").removeAttr('title');
        });


        $(document).tooltip({
            content: function () {
                return $(this).prop('title');
            }
        });

        $(".btn-add").click(function(event){
            var body = $(this).closest('.form-group').clone();
            $(body).find('.price-id').val('');
            $(body).find('.price-type').val('piece');
            $(body).find('.price-data').val('');
            $(body).find('button').removeClass('btn-add btn-success').addClass('btn-danger btn-delete');
            $(body).find('i').removeClass('fa-plus').addClass('fa-trash-o');
            $("#product-prices").append(body);
        });

        $("#product-prices").on('click', '.btn-delete', function(event){
            $(this).closest('.form-group').remove();
        });
    </script>

@endsection