@extends('layouts.site')

@section('title')
    {{ $metatags['title'] }}
@endsection

@section('meta')

    <meta name="keywords" content="{{ $metatags['keywords'] }}" />
    <meta name="title" content="{{ $metatags['title'] }}" />
    <meta name="description" content="{{ $metatags['description'] }}" />

    <!-- Schema.org markup (Google) -->
    <meta itemprop="name" content="{{ $metatags['title'] }}">
    <meta itemprop="description" content="{{ $metatags['description'] }}">
    <meta itemprop="image" content="{{ url('/') }}/images/blog/{{ $news->image }}">

    <!-- Twitter Card markup-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $metatags['title'] }}">
    <meta name="twitter:description" content="{{ $metatags['description'] }}">
    <meta name="twitter:creator" content="">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image" content="{{ url('/') }}/images/blog/{{ $news->image }}">
    <meta name="twitter:image:alt" content="">

    <!-- Open Graph markup (Facebook, Pinterest) -->
    <meta property="og:title" content="{{ $metatags['title'] }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ url('/') }}/images/blog/{{ $news->image }}" />
    <meta property="og:description" content="{{ $metatags['description'] }}" />
    <meta property="og:site_name" content="Metall Vsem" />

    <script type="text/javascript" src="//vk.com/js/api/share.js?94" charset="windows-1251"></script>

    <script type="text/javascript" src="//platform.linkedin.com/in.js">
        lang: ru_RU
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer>
      {lang: 'ru'}
    </script>

@endsection

@section('css')

@endsection

@section('content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.8&appId=197519390702830";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
    <hr />
    <div class="shared-buttons">
        <div id="vk_like" class="style-vk"> </div>
        <div class="g-plus" data-action="share" data-annotation="bubble"> </div>
        <script type="IN/Share" data-counter="right"> </script>
        <span class="style-pinterest">
            <a data-pin-do="buttonBookmark" data-pin-lang="ru" data-pin-save="true" data-pin-count="beside" href="https://www.pinterest.com/pin/create/button/"> </a>
        </span>
        <!-- Your share button code -->
        <div class="fb-share-button" data-href="{{ url()->current() }}" data-layout="button_count"> </div>
    </div>
    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script src="https://assets.pinterest.com/js/pinit.js" async defer> </script>
    <script type="text/javascript">
        $('.blog').addClass('active');
        $('#vk_like').append(VK.Share.button(false, {type: "round", text: "Сохранить", height: 20}));
    </script>
@endsection