@extends('layouts.site')

@section('title')
    {{ trans('auth.register') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container text-center">
    <div class="padding-top"></div>
        <h1 data-aos="fade-left">{{ trans('auth.register') }}</h1>
    <div class="padding-top"></div>


    <form class="registred-form" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="{{ trans('auth.username') }}">

            @if ($errors->has('username'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
            <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" placeholder="{{ trans('auth.company') }}" required="">

            @if ($errors->has('company'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('company') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="{{ trans('auth.phone') }}" required="">

            @if ($errors->has('phone'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('auth.email-address') }}" required="">

            @if ($errors->has('email'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="text" class="form-control" name="password" value="{{ old('password') }}" placeholder="{{ trans('auth.password') }}" required="">

            @if ($errors->has('password'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning pull-right">
                <i class="fa fa-btn fa-user"></i> {{ trans('auth.register') }}
            </button>
        </div>
    </form>

    <div class="padding-top"></div>
</section>


@endsection
