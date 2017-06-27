@extends('layouts.admin')

@section('title')
    Exel импорт/экспорт продукции
@endsection

@section('css')

@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Exel импорт/экспорт продукции</h3>
        </div>
        <div class="box-body">
                <form id="form-load-export" role="form" method="POST" action="{{ url('/administration/export') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control" id="lang" name="lang">
                                <option value="ru">Русский</option>
                                <option value="uk">Украинский</option>
                                <option value="en">Английский</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select class="form-control" id="menu" name="menu">
                                    @foreach ($menu as $item)
                                        <option value="{{ $item['id'] }}">{{ json_decode($item['name'], true)['ru'] }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-success pull-right" type="submit">
                                        Экспорт
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="clearfix"></div>
                <hr>

                <form id="form-load-import" role="form" method="POST" action="{{ url('/administration/import') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control" id="lang" name="lang">
                                <option value="ru">Русский</option>
                                <option value="uk">Украинский</option>
                                <option value="en">Английский</option>
                            </select>
                        </div>
                        <div class="col-md-9 text-center">
                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <input type="file" id="file" name="file" class="file-loading" data-show-upload="false" data-preview-file-type="text">

                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning pull-right" type="submit">
                        Импортировать
                    </button>
                </form>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script src="{{ elixir('js/fileinput.min.js') }}"></script>
    <script>
        $("#file").fileinput({
            language: 'ru',
            allowedFileExtensions: [],
            showPreview: false,
        });
    </script>
@endsection