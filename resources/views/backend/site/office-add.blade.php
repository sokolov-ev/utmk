@extends('layouts.admin')

@section('title')
    Новый офис
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Новый офис</h3>
        </div>
        <div class="box-body">

            <form class="form-horizontal" role="form" method="POST" action="{{ url('administration/moderator') }}" id="form-add-moderator">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-md-2 control-label">Тип офиса</label>
                    <div class="col-md-3">
                        <select name="role" id="role" class="form-control">
                            @foreach($officeType as $key => $type)
                                <option value="{{$key}}">{{ trans('offices.type.'.$type) }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="region" class="col-md-2 control-label">Регион</label>

                    <div class="col-md-3">
                        <input id="region" type="region" class="form-control" name="region" value="{{ old('region') }}" readonly="">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-2 control-label">Адрес</label>

                    <div class="col-md-3">
                        <input id="address" type="address" class="form-control" name="address" value="{{ old('address') }}">

                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>



            </form>

        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script>
    </script>

{{--     <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! $addValidator !!} --}}
@endsection