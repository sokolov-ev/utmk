@extends('layouts.admin')

@section('title')
    Картинки
@endsection

@section('css')
    <link href="{{ elixir('css/fileinput.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Картинки</h3>

            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#uploadFile">
                    <i class="fa fa-plus" aria-hidden="true"></i> Загрузить картинки
                </button>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                @foreach($images as $img)
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="thumbnail">
                            <img src="{{ url('/images/other/'.$img->name) }}" alt="{{ $img->name }}" style="width: 100%; height: 200px;">
                            <div style="padding-top: 10px;">
                                <a href="{{ url('/administration/images/delete/'.$img->id) }}" class="btn btn-danger" role="button">Удалить</a>
                                <button class="btn btn-primary copy-text pull-right" data-clipboard-text="{{ url('/images/other/'.$img->name) }}">
                                    Копировать
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Загрузка изображений</h4>
            </div>
            <div class="modal-body">
                <form id="form-images-add" role="form" method="POST" action="{{ url('/administration/images/add') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" id="images" name="images[]" class="file-loading" multiple data-show-upload="false" data-show-caption="true">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                
                <button class="btn btn-success pull-right" type="submit" form="form-images-add">
                    <i class="fa fa-plus" aria-hidden="true"></i> Загрузить картинки
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

    {{-- Модальное окно удаления филиала/модератора/продукции --}}
    @include('partial.delete-modal')

@section('scripts')
    
    <script src="{{ elixir('js/fileinput.js') }}"></script>
    <script src="{{ elixir('js/clipboard.js') }}"></script>

    <script>
        $("#images").fileinput({
            language: 'ru',
            allowedFileExtensions: ["jpg", "jpeg", "png", "bmp", "gif", "svg"],
        });

        new Clipboard('.copy-text');
    </script>

@endsection