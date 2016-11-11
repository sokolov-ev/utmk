@extends('layouts.admin')

@section('title')
    Прайсы
@endsection

@section('css')
    <link href="{{ elixir('css/fileinput.css') }}" rel="stylesheet">
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
                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <input type="file" id="file" name="file" class="file-loading" data-show-upload="false" data-preview-file-type="text">

                            @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file') }}</strong>
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
                @foreach($files as $file)
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
</section>

@endsection

@section('scripts')
    <script src="{{ elixir('js/fileinput.js') }}"></script>
    <script>
        $("#file").fileinput({
            language: 'ru',
            allowedFileExtensions: [],
            showPreview: false,
        });
    </script>

@endsection