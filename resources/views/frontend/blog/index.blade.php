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
        <h1 class="welcome-text text-center">{{ trans('index.menu.blog') }}</h1>
    </div>
    <div class="padding-top"></div>
</section>

<section class="container">
    <div class="news-list">
        @foreach($news AS $post)
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    @if (!empty($post['image']))
                        <img src="/images/blog/{{ $post['image'] }}" alt="{{ $post['title'] }}" title="{{ $post['title'] }}" style="width: 100%; height: auto;">
                    @endif
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <a class="text-black-h3" href="{{ url('/blog/'.$post['slug']) }}" title="{{ $post['title'] }}">
                        {{ $post['title'] }}
                    </a>

                    <div class="padding-block-0-1">
                        <span class="text-gray-contact">({{ $post['published'] }})</span>
                    </div>

                    <p class="text-gray-16 text-justify">{{ str_limit(strip_tags($post['body']), 545, '...') }}</p>
                    <br/>

                    <a class="text-orange-20" href="{{ url('/blog/'.$post['slug']) }}" title="{{ $post['title'] }}">
                        <span class="font-up">Читать далее</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <hr/>
        @endforeach
    </div>

    {{ $news->render() }}

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".blog").addClass('active');
    </script>
@endsection