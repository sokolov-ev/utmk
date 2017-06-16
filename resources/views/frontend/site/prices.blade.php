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
        <h1 class="welcome-text">{{ trans('index.menu.price') }}</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        @foreach($files as $file)
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="padding-block-0-2">
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-file-text fa-3x" aria-hidden="true"> </i>
                        </div>
                        <div class="col-md-11 text-left">
                            <a href="{{ url('/price/'.$file['id']) }}" title="{{ $file['name'] }}" class="text-black-h3">
                                {{ $file['name'] }}
                            </a>
                            <br/>
                            <span class="text-gray-contact">
                                {{ trans('index.updated').': '.date('Y-m-d', $file->created_at->getTimestamp()) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(!empty($metatags['articles']))
        <div class="padding-block-2-0">
            {!! $metatags['articles'] !!}
        </div>
    @endif

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')

    <script>
        $(".price").addClass('active');
    </script>

@endsection