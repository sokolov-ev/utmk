@extends('layouts.admin')

@section('title')
    Картинки
@endsection

@section('css')
    <link href="{{ elixir('css/fileinput.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="image-manager content container">
    <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#uploadFile" style="margin-bottom: 15px;">
        <i class="fa fa-plus" aria-hidden="true"></i> Загрузить изображения
    </button>

    <div class="clearfix"> </div>

    <div class="nav-tabs-custom" style="cursor: move;">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right ui-sortable-handle">
            <li class="header pull-left">
                <i class="fa fa-inbox"></i> Изображения
            </li>
            <li class="">
                <a href="#reference" data-toggle="tab" aria-expanded="false">Справка</a>
            </li>
            <li class="active">
                <a href="#blog" data-toggle="tab" aria-expanded="true">Блог</a>
            </li>
        </ul>
        <div class="tab-content">
            @foreach ($images as $type => $items)
                <div class="chart tab-pane {{ ($type == 'blog') ? 'active' : '' }}" id="{{ $type }}">
                    <div class="row">
                        @foreach($items as $img)
                            <div class="col-md-2 col-sm-3 col-xs-3">
                                <div class="thumbnail">
                                    <img src="{{ url('/images/' . $img->type . '/' . $img->name) }}" alt="{{ $img->name }}">
                                    <div class="caption text-center">
                                        <button class="btn btn-danger btn-xs pull-left" onclick="setHref({{ $img->id }})" data-toggle="modal" data-target="#deleteFile">
                                            <i class="fa fa-trash" aria-hidden="true"></i> -
                                        </button>
                                        <button class="btn btn-default btn-xs copy-text pull-right" data-clipboard-text="{{ url('/images/' . $img->type . '/' . $img->name) }}">
                                            <i class="fa fa-clipboard" aria-hidden="true"></i> Копировать
                                        </button>
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

<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Загрузка изображений</h4>
            </div>
            <div class="modal-body">
                <form id="form-images-add" role="form" method="POST" action="{{ url('/administration/images') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="blog">Блог</option>
                            <option value="reference">Справка</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" id="images" name="images[]" class="file-loading" multiple data-show-upload="false" data-show-caption="true">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>

                <button class="btn btn-success pull-right" type="submit" form="form-images-add">
                    Загрузить изображения
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteFile" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Удаление изображения</h4>
            </div>
            <div class="modal-body">
                <form id="form-images-delete" role="form" method="POST" action="">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>

                Вы уверены что хотите удалить изображение?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>

                <button class="btn btn-danger pull-right" type="submit" form="form-images-delete">
                    Удалить
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

    {{-- Модальное окно удаления филиала/модератора/продукции --}}
    @include('partial.delete-modal')

@section('scripts')

    <script src="{{ elixir('js/fileinput.min.js') }}"></script>
    <script src="{{ elixir('js/clipboard.min.js') }}"></script>

    <script>
        $("#images").fileinput({
            language: 'ru',
            allowedFileExtensions: ["jpg", "jpeg", "png", "bmp", "gif", "svg"],
        });

        new Clipboard('.copy-text');

        function setHref(id) {
            $('#form-images-delete').attr('action', '/administration/images/' + id);
        }
    </script>

@endsection