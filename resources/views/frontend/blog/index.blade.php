@extends('layouts.site')

@section('title')
    {{ $metatags['title'] }}
@endsection

@section('meta')
    @include('partial.metatags')
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
        @foreach($blog AS $news)
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    @if (!empty($news->image))
                        <img src="{{ url('/images/' . $news->image->type . '/' . $news->image->name) }}"
                             alt="{{ $news->image->name }}"
                             title="{{ $news->image->name }}"
                             style="width: 100%; height: auto;">
                    @endif
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <a class="text-black-h3" href="{{ url('/blog/' . $news->slug) }}" title="{{ $news->title }}">
                        {{ $news->title }}
                    </a>

                    <div class="padding-block-0-1">
                        <span class="text-gray-contact">({{ $news->published }})</span>
                    </div>

                    <div class="padding-block-0-2">
                        <div class="text-gray-16 text-justify">{{ str_limit(strip_tags($news->body), 545, '...') }}</div>
                    </div>

                    <a class="text-orange-20" href="{{ url('/blog/' . $news->slug) }}" title="{{ $news->title }}">
                        <span class="font-up">Читать далее</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <hr/>
        @endforeach
    </div>

    {{ $blog->render() }}

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".blog").addClass('active');
    </script>
@endsection