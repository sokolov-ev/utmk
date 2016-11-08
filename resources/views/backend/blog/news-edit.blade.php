@extends('layouts.admin')

@section('title')
    Редактирование: {{ $news['title'] }}
@endsection

@section('css')
    <link href="{{ elixir('css/fileinput.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Редактирование: {{ $news['title'] }}</h3>
        </div>
        <div class="box-body">

            <ol class="breadcrumb">
                <li><a href="{{ url('/administration/blog') }}">Блог</a></li>
                <li class="active">Редактирование: {{ $news['title'] }}</li>
            </ol>

            <form id="form-news-edit" role="form" method="POST" action="{{ url('/administration/blog/edit/'.$news['id']) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="control-label">Изображение</label>

                            <input type="file" id="image" name="image" class="file-loading" data-show-upload="false" data-show-caption="true">

                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>

                        @if (!empty($news['image']))
                            <p>
                                <label>Загруженное изображение</label>
                                <br/>
                                (При удалении изображения страница будет перезагружена.)
                            </p>

                            <div class="img-weight">
                                <div class="pull-left file-preview-body">
                                    <div class="file-preview-frame">
                                        <img src="/images/blog/{{ $news['image'] }}" alt="{{ $news['image'] }}" class="file-preview-image">

                                        <div class="file-thumbnail-footer">
                                            <a href="{{ url('/administration/blog/delete-image/'.$news['id']) }}" class="btn btn-danger btn-xs pull-left">
                                                <i class="fa fa-trash-o" aria-hidden="true"> </i>
                                            </a>

                                            <div class="pull-left">
                                                {{ mb_substr($news['image'], 0, 18, 'UTF-8').'...' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                            <br/>
                        @endif

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="control-label">Slug (имя статьи в адресной строке)</label>

                            <input id="slug" name="slug" type="text" class="form-control" value="{{ old('slug', $news['slug']) }}">

                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="control-label">Заголовок</label>

                            <input id="title" name="title" type="text" class="form-control" value="{{ old('title', $news['title']) }}">

                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <textarea id="description"
                                      name="description"
                                      class="form-control"
                                      rows="6">{{ old('description', $news['body']) }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="checkbox pull-left">
                            <label>
                                <input type="checkbox" id="show_this" name="show_this" {{ $news['show_this'] ? 'checked=""' : '' }} style="margin: 0 -20px;">
                                Показывать
                            </label>
                        </div>

                        <button class="btn btn-warning pull-right" type="submit" onclick="saveDescription();">
                            Сохранить изменения
                        </button>

                        <div class="clearfix"> </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

@endsection

@section('scripts')


    <script src="{{ elixir('js/fileinput.js') }}"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $('#image').fileinput({
            language: 'ru',
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'svg'],
        });

        var description = tinyMCE.init({
                selector: '#description',
                language: 'ru',
                plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
            });

        function saveDescription()
        {
            description.triggerSave();
        }

        $(document).ready(function() {
            $('iframe').removeAttr('title');
        });

        $(document).tooltip({
            content: function () {
                return $(this).prop('title');
            }
        });
    </script>

@endsection