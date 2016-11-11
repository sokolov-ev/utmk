@extends('layouts.site')

@section('title')
    {{ $metatags['title'] }}
@endsection

@section('meta')

    @include('partial.metatags')

@endsection

@section('css')

@endsection

@section('content')

<section class="container sales-title text-center">

    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text">{{ trans('index.contacts.title') }}</h1>
    </div>
    <div class="padding-top"></div>

    <form id="contacts-form" class="contacts-form" role="form" method="POST" action="{{ url('/contacts') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('mail_username') ? ' has-error' : '' }}">
            <input id="mail_username" type="text" class="form-control" name="mail_username" value="{{ old('mail_username') }}" placeholder="{{ trans('auth.username') }}">

            @if ($errors->has('mail_username'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('mail_username') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('mail_company') ? ' has-error' : '' }}">
            <input id="mail_company" type="text" class="form-control" name="mail_company" value="{{ old('mail_company') }}" placeholder="{{ trans('auth.company') }} *" required="">

            @if ($errors->has('mail_company'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('mail_company') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('mail_phone') ? ' has-error' : '' }}">
            <input id="mail_phone" type="text" class="form-control" name="mail_phone" value="{{ old('mail_phone') }}" placeholder="{{ trans('auth.phone') }} *" required="">

            @if ($errors->has('mail_phone'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('mail_phone') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('mail_email') ? ' has-error' : '' }}">
            <input id="mail_email" type="email" class="form-control" name="mail_email" value="{{ old('mail_email') }}" placeholder="{{ trans('auth.email-address') }} *" required="">

            @if ($errors->has('mail_email'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('mail_email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('mail_message') ? ' has-error' : '' }}">
            <textarea id="mail_message" name="mail_message" class="form-control" placeholder="{{ trans('index.contacts.message') }}" rows="4">{{ old('mail_message') }}</textarea>

            @if ($errors->has('mail_message'))
                <span class="help-block">
                    <strong>{{ $errors->first('mail_message') }}</strong>
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