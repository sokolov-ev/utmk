@extends('layouts.admin')

@section('title')
    Прайсы
@endsection

@section('css')
    <link href="{{ elixir('css/fileinput.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left">Прайсы</h3>
        </div>
        <div class="box-body">
            <form id="form-load-price" role="form" method="POST" action="{{ url('/administration/price') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <input type="file" id="file" name="file" class="file-loading" data-show-upload="false" data-preview-file-type="text">

                            @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success pull-right" type="submit">
                            Загрузить
                        </button>
                    </div>
                </div>
            </form>

            <hr />

            <ul class="list-unstyled">
                @foreach($prices as $file)
                    <li>
                        <a href="{{ url('/administration/price/load/'.$file['id']) }}" title="{{ $file['slug'] }}">{{ $file['name'] }}</a>
                        {{ '(загружен: '.$file->created_at->toDateTimeString().')' }}
                        <a href="{{ url('/administration/price/delete/'.$file['id']) }}" title="Удалить" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash" aria-hidden="true"> </i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <br>

    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left">Документы</h3>
        </div>
        <div class="box-body">
            <form id="form-load-documents" role="form" method="POST" action="{{ url('/administration/documents') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group{{ $errors->has('documents') ? ' has-error' : '' }}">
                            <input type="file" id="documents" name="documents" class="file-loading" data-show-upload="false" data-preview-file-type="text">

                            @if ($errors->has('documents'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('documents') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success pull-right" type="submit">
                            Загрузить
                        </button>
                    </div>
                </div>
            </form>

            <hr />

            <ul class="list-unstyled">
                @foreach($documents as $file)
                    <li>
                        <a href="{{ url('/administration/documents/load/'.$file['id']) }}" title="{{ $file['slug'] }}">{{ $file['name'] }}</a>
                        {{ '(загружен: '.$file->created_at->toDateTimeString().')' }}
                        <a href="{{ url('/administration/documents/delete/'.$file['id']) }}" title="Удалить" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash" aria-hidden="true"> </i>
                        </a>
                        <button class="btn btn-default btn-xs copy-text" data-clipboard-text="{{ url('/documents/'.$file['slug']) }}">
                            <i class="fa fa-clipboard" aria-hidden="true"></i>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script src="{{ elixir('js/fileinput.min.js') }}"></script>
    <script src="{{ elixir('js/clipboard.min.js') }}"></script>

    <script>
        $("#file").fileinput({
            language: 'ru',
            allowedFileExtensions: [],
            showPreview: false,
        });

        $("#documents").fileinput({
            language: 'ru',
            allowedFileExtensions: [],
            showPreview: false,
        });

        new Clipboard('.copy-text');
    </script>
@endsection