
@extends('layouts.site')

@section('title')
    {{ $metatags['title'] }}
@endsection

@section('meta')

    @include('partial.metatags')

    <script type="application/ld+json"> 
        {!! json_encode($jsonLD) !!}
    </script>
@endsection

@section('css')

@endsection

@section('content')

<section class="container">
    
    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text text-center">{{ $section['title'] }}</h1>
    </div>
    <div class="padding-top"></div>


    <div class="padding-block-0-2">
        <ul class="breadcrumb">
            <li>
                <a class="orange-list-a" href="{{ route('index-page') }}" title="{{ trans('index.menu.home') }}">
                    {{ trans('index.menu.home') }}
                </a>
            </li>
            <li>
                <a class="orange-list-a" href="{{ route('spravka') }}" title="{{ trans('index.menu.reference_book') }}">
                    {{ trans('index.menu.reference_book') }}
                </a>
            </li>
            @if (!empty($section['parent']))
                <li>
                    <a class="orange-list-a" href="{{ url('/spravka'.$section['parent']['slug']) }}" title="{{ $section['parent']['name'] }}">
                        {{ $section['parent']['name'] }}
                    </a>
                </li>                
            @endif
            <li class="active">{{ $section['title'] }}</li>
        </ul>
    </div>

    <span>
        {!! $section['body'] !!}
    </span>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".reference_book").addClass('active');
    </script>
@endsection

