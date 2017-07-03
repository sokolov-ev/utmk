@extends('layouts.admin')

@section('title')
    Банеры
@endsection

@section('css')
    <link href="{{ elixir('css/fileinput.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content container">

    <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#addSlide" style="margin-bottom: 15px;">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить слайды
    </button>

    <div class="clearfix"> </div>

    <div class="nav-tabs-custom" style="cursor: move;">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right ui-sortable-handle">
            <li class="header pull-left">
                <i class="fa fa-inbox"></i> Слайды / банеры
            </li>
            <li class="active">
                <a href="#slider-index" data-toggle="tab" aria-expanded="false">На главной</a>
            </li>
            <li class="">
                <a href="#slider-small" data-toggle="tab" aria-expanded="true">Банер маленький</a>
            </li>
            <li class="">
                <a href="#slider-large" data-toggle="tab" aria-expanded="true">Банер большой</a>
            </li>
        </ul>
        <div class="tab-content">
            @foreach ($images as $type => $items)
                <div class="chart tab-pane {{ ($type == 'slider-index') ? 'active' : '' }}" id="{{ $type }}">
                    <div class="row img-weight" data-type="{{ $type }}">
                        @foreach($items as $img)
                            <div class="col-md-2 col-sm-3 col-xs-3 {{ $type }}-preview" data-img="{{ $img->id }}">
                                <div class="thumbnail">
                                    <img src="{{ url('/images/' . $img->type . '/' . $img->name) }}" alt="{{ $img->name }}">
                                    <div class="caption text-center">
                                        <button class="btn btn-danger btn-xs pull-left"
                                                type="button"
                                                data-target="#delete-modal"
                                                data-toggle="modal"
                                                data-id="{{ $img->id }}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> -
                                        </button>
                                        <a href="{{ url('/administration/baners/' . $img->id . '/edit') }}" class="btn btn-default btn-xs pull-right">
                                            Редактировать
                                        </a>
                                    </div>
                                </div>
                            </div>
                       @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div  id="addSlide" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Добавить слайды</h4>
            </div>
            <div class="modal-body">
                <form id="addSladeForm" role="form" method="POST" action="{{ url('/administration/baners') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="slider-index">Слайдер на главной</option>
                            <option value="slider-small">Банер маленький</option>
                            <option value="slider-large">Банер большой</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" id="images" name="images[]" class="file-loading" multiple data-show-upload="false" data-show-caption="true">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-success pull-right" form="addSladeForm">Сохранить</button>
            </div>
        </div>
    </div>
</div>

@include('partial.delete-modal')

@endsection

@section('scripts')
    <script src="{{ elixir('js/fileinput.min.js') }}"></script>
    <script src="{{ elixir('js/jquery-ui.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $("#images").fileinput({
            language: 'ru',
            allowedFileExtensions: ["jpg", "jpeg", "png", "bmp", "gif", "svg"],
        });

        $(".content").on('click', '[data-target="#delete-modal"]', function(event){
            $("#modal-title").text("Удаление изображения");
            $("#modal-delete-form").prop('action', '/administration/images/' + $(this).data('id'));
            $("#delete-id").val($(this).data('id'));
            $(".delete-name").text("изображение");
        });

        $('.img-weight').sortable({
            stop: function(event, ui) {
                let type   = $(this).data('type');
                let id     = [];
                let rows   = $('.img-weight').find('.' + type + '-preview');
                let weight = [];

                $.each(rows, function(key, val){
                    weight.push(key + 1);
                    id.push($(val).data('img'));
                });

                $.ajax({
                    url: '/administration/images',
                    type: 'PUT',
                    data: {id: id, weight: weight},
                    dataType: 'json',
                    success: function(result) {
                        console.log(response);
                    }
                });
            }
        });
    </script>
@endsection