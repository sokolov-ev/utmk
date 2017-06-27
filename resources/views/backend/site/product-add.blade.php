@extends('layouts.admin')

@section('title')
    Добавление продукции
@endsection

@section('css')
    <link href="{{ elixir('css/fileinput.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Добавление продукции</h3>
        </div>
        <div class="box-body">

            <ol class="breadcrumb">
                <li><a href="{{ url('administration/products') }}">Продукция</a></li>
                <li class="active">Добавление продукции</li>
            </ol>

            <div class="hidden language" data-lang="{{ App::getLocale() }}"></div>

            <form id="form-add-product" role="form" method="POST" action="{{ url('administration/product/add') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="">

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

                        <hr>

                        <!-- TITLE -->
                        @include('backend.site.partial.input-add', ['name' => 'title', 'title' => 'Заголовок'])
                        <!-- /TITLE -->

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="control-label">Slug (отображение в адресной строке)</label>
                            <input id="slug" name="slug" type="text" class="form-control" value="{{ old('slug') }}">

                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('menu_id') ? ' has-error' : '' }}">
                            <label for="menu_id" class="control-label">Раздел меню</label>

                            <select name="menu_id" id="menu_id" class="form-control">
                                @foreach($menu->toArray() as $item)
                                    <option value="{{ $item['id'] }}" {{ ($item['id'] == old('menu_id')) ? 'selected=""' : '' }}>
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
                                        <option value="{{ $item['id'] }}" {{ ($item['id'] == old('office_id')) ? 'selected=""' : '' }}>
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

                        <div id="product-prices">
                            <div class="form-group{{ $errors->has('price.0') ? ' has-error' : '' }}" style="margin-bottom: 0;">
                                <label for="" class="control-label">Цены</label>
                            </div>

                            <div class="form-group{{ $errors->has('price.0') ? ' has-error' : '' }}">
                                <div class="flex">
                                    <div>
                                        <input name="price[]" class="form-control price-data" type="text" value="{{ old('price.0') }}" placeholder="Цена">
                                    </div>
                                    <div class="price-type">
                                        <select name="price_type[]" class="form-control price-type">
                                            @foreach($priceType as $key => $type)
                                                @if ($key == old('price_type.0'))
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
                                    <span class="help-block" style="color: #dd4b39;">
                                        <strong>{{ $errors->first('price.0') }}</strong>
                                    </span>
                                @endif
                            </div>

                            @if (count(old('price')) > 1)
                                @for($i = 1; $i < count(old('price')); $i++)
                                    <div class="form-group{{ $errors->has('price.'.$i) ? ' has-error' : '' }}">
                                        <div class="flex">
                                            <div>
                                                <input type="text" name="price[]" class="form-control price-data" value="{{ old('price.'.$i) }}" placeholder="Цена">
                                            </div>
                                            <div class="price-type">
                                                <select name="price_type[]" class="form-control price-type">
                                                    @foreach($priceType as $key => $type)
                                                        @if ($key == old('price_type.'.$i))
                                                            <option value="{{ $key }}" selected="">{{ trans('products.measures.'.$type) }}</option>
                                                        @else
                                                            <option value="{{ $key }}">{{ trans('products.measures.'.$type) }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="btn-wrap">
                                                <button class="btn btn-danger btn-delete" type="button">
                                                    <i class="fa fa-trash-o" aria-hidden="true"> </i>
                                                </button>
                                            </div>
                                        </div>

                                        @if ($errors->has('price.'.$i))
                                            <span class="help-block" style="color: #dd4b39;">
                                                <strong>{{ $errors->first('price.'.$i) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                @endfor
                            @endif
                        </div>

                        @include('backend.site.partial.textarea-add', ['name' => 'description', 'title' => 'Описание'])

                        @include('backend.site.partial.input-add', ['name' => 'steel_grade', 'title' => 'Марка стали'])
                        @include('backend.site.partial.input-add', ['name' => 'standard', 'title' => 'Стандарт'])
                        @include('backend.site.partial.input-add', ['name' => 'sawing', 'title' => 'Длина/раскрой'])
                        @include('backend.site.partial.input-add', ['name' => 'diameter', 'title' => 'Диаметр'])
                        @include('backend.site.partial.input-add', ['name' => 'height', 'title' => 'Высота'])
                        @include('backend.site.partial.input-add', ['name' => 'width', 'title' => 'Ширина'])
                        @include('backend.site.partial.input-add', ['name' => 'thickness', 'title' => 'Толщина'])
                        @include('backend.site.partial.input-add', ['name' => 'section', 'title' => 'Сечение'])
                        @include('backend.site.partial.input-add', ['name' => 'coating', 'title' => 'Покрытие'])
                        @include('backend.site.partial.input-add', ['name' => 'view', 'title' => 'Вид'])
                        @include('backend.site.partial.input-add', ['name' => 'brinell_hardness', 'title' => 'Твердость Бринелль'])
                        @include('backend.site.partial.input-add', ['name' => 'class', 'title' => 'Класс'])

                        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                            <label for="rating" class="control-label">Рейтинг</label>

                            <input id="rating" type="text" class="form-control" name="rating" value="{{ old('rating') }}">

                            @if ($errors->has('rating'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rating') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                        <div class="pull-left">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="in_stock" checked="" style="margin: 0 -20px;">
                                    В наличии
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="show_my" checked="" style="margin: 0 -20px;">
                                    Показывать
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-success pull-right" type="submit" onclick="saveDescription();">
                            Добавить
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script src="{{ elixir('js/fileinput.min.js') }}"></script>

    <script>
        $("#images").fileinput({
            language: $(".language").data('lang'),
            allowedFileExtensions: ["jpg", "jpeg", "png", "bmp", "gif", "svg"],
        });

        $(".btn-add").click(function(event){
            var body = $(this).closest('.form-group').clone();
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