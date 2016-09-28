@extends('layouts.site')

@section('title')
    {{ trans('index.contacts.title') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container sales-title text-center">

    <div class="flash-messages">
        @include('partial.flash-messages')
    </div>

    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text">{{ trans('index.contacts.title') }}</h1>
    </div>
    <div class="padding-top"></div>

    <form id="contacts-form" class="contacts-form" role="form" method="POST" action="{{ url('/contacts') }}">
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
            <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" placeholder="{{ trans('auth.company') }} *" required="">

            @if ($errors->has('company'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('company') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="{{ trans('auth.phone') }} *" required="">

            @if ($errors->has('phone'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('auth.email-address') }} *" required="">

            @if ($errors->has('email'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            <textarea id="message" name="message" class="form-control" placeholder="{{ trans('index.contacts.message') }}" rows="4">{{ old('message') }}</textarea>

            @if ($errors->has('message'))
                <span class="help-block">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning pull-right send-button font-up">
                {{ trans('index.contacts.send') }} >>
            </button>
        </div>

        <div class="clearfix"> </div>
    </form>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! $validator !!}

@endsection