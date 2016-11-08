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

<section class="container">
    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text">{{ $news['title'] }}</h1>
    </div>

    <div class="padding-block-2-0">
        <span class="text-gray-16">{{ $news['published'] }}</span>
    </div>

    <div class="padding-block-2-2">
        <ul class="breadcrumb">
            <li> <a class="orange-list-a" href="{{ route('blog') }}" title="">{{ trans('index.menu.blog') }}</a> </li>
            <li class="active">{{ $news['title'] }}</li>
        </ul>
    </div>

    <div class="news">
        {!! $news['body'] !!}
    </div>
    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".blog").addClass('active');
    </script>
@endsection