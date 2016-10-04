@extends('layouts.site')

@section('title')
    {{ trans('auth.reset-password') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container">

    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text text-center">{{ trans('auth.reset-password') }}</h1>
    </div>
    <div class="padding-top"></div>

    <form class="form-reset-password" role="form" method="POST" action="{{ url('/password/reset') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('auth.email-address') }} *" required="">

            @if ($errors->has('email'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="{{ trans('auth.password') }} *" required="">

            @if ($errors->has('password'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="{{ trans('auth.password-conf') }} *" required="">

            @if ($errors->has('password_confirmation'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-warning pull-right send-button font-up">
            {{ trans('auth.reset-password') }} >>
        </button>

        <div class="clearfix"> </div>
    </form>

    <div class="padding-top"></div>
</section>


@endsection
