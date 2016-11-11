<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" itemscope="" itemtype="http://schema.org/Webpage">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <meta name="google-site-verification" content="5ZkMrakvEh1lCyA4eCxke53NFBBCtyMTBFKBWKXyp7Y" />
    <meta name="yandex-verification" content="47760e8501424890" />

    <link href="https://plus.google.com/+%D0%9E%D0%9E%D0%9E%D0%AE%D0%A2%D0%9C%D0%9A%D0%9A%D0%B8%D1%97%D0%B2" rel="publisher" />

    @yield('meta')

    <link rel="apple-touch-icon" sizes="57x57" href="/images/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/images/icons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/images/icons/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="/images/icons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/images/icons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/images/icons/manifest.json">
    <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#ffffff">
    <link rel="shortcut icon" href="/images/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/images/icons/mstile-144x144.png">
    <meta name="msapplication-config" content="/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

 --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/0dbe2628bf.css">


    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link href="{{ elixir('css/styles.css') }}" rel="stylesheet">

    @yield('css')

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-86822260-1', 'auto');
      ga('send', 'pageview');
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter40647919 = new Ya.Metrika({ id:40647919, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/40647919" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body id="app-layout">

<section id="top__content" class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="laguage-block pull-right">
                    <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" title="{{ trans('index.speech.en') }}">
                        <img src="/images/flags/en.gif" title="{{ trans('index.speech.en') }}" alt="{{ trans('index.speech.en') }}" />
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['lang' => 'ru']) }}" title="{{ trans('index.speech.ru') }}">
                        <img src="/images/flags/ru.gif" title="{{ trans('index.speech.ru') }}" alt="{{ trans('index.speech.ru') }}" />
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['lang' => 'uk']) }}" title="{{ trans('index.speech.uk') }}">
                        <img src="/images/flags/uk.gif" title="{{ trans('index.speech.uk') }}" alt="{{ trans('index.speech.uk') }}" />
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-12 logo-format">
                <a href="{{ url('/') }}" class="logotype">
                    <img src="/images/logo.jpeg" title="Metall Vsem" alt="Metall Vsem" />
                </a>
            </div>
            <div class="col-md-7 col-sm-9 col-xs-12 text-center">

                    <div class="contact-block">
                        <div class="padding-block-2-0">
                            <div class="padding-vert-15">
                                <i class="text-green fa fa-phone fa-3x" aria-hidden="true"> </i>
                            </div>
                            <div class="padding-vert-15 text-left" style="width: 195px;">
                                <span class="text-gray-contact">
                                    <a href="tel:+380445025045">+38 (044) 502-50-45</a>
                                </span>
                                <br/>
                                <span class="text-gray-contact">
                                    <a href="tel:+380445035045">+38 (044) 503-50-45</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="contact-block">
                        <div class="padding-block-2-2">
                            <div class="padding-vert-15">
                                <i class="text-green fa fa-map-marker fa-3x" aria-hidden="true"> </i>
                            </div>
                            <div class="padding-vert-15 text-left" style="max-width: 195px;">
                                <span class="text-gray-contact">{{ $office_contacts['address'] }}</span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="padding-block-2-2">
                    <div class="user-block">
                        @if (!Auth::guest())
                            <a class="text-orange-20" href="{{ route('logout') }}" title="{{ trans('auth.logout') }}">
                                <i class="fa fa-sign-out fa-3x" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="text-green-20 shopping-cart-button" data-target="#shopping-cart" data-toggle="modal" title="{{ trans('products.shopping-cart') }}">
                                <i class="fa fa-cart-plus fa-3x" aria-hidden="true"></i>
                                @if ($user_cart > 0)
                                    <span class="shopping-cart-badge">{{ $user_cart }}</span>
                                @else
                                    <span class="shopping-cart-badge hidden"></span>
                                @endif
                            </a>
                        @endif
                        @if (Auth::guest())
                            <a href="#" class="text-green-20" data-target="#login-form" data-toggle="modal" title="{{ trans('auth.login') }}">
                                <i class="fa fa-sign-in fa-3x" aria-hidden="true"></i>
                            </a>
                        @else
                            <a href="{{ route('my-cart') }}" class="text-green-20" title="{{ trans('auth.my-office') }}">
                                <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

</section>

<header id="w-sticker">

    <nav class="navbar navbar-default" id="sticker">

        <div class="navbar-header text-center">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mettal-vsem-menu" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"> </i>
            </button>
        </div>

        <div id="mettal-vsem-menu" class="collapse navbar-collapse">

            <ul class="nav navbar-nav">
                <li class="home"><a href="{{ route('index-page') }}">{{ trans('index.menu.home') }}</a></li>

                <li class="dropdown services">
                    <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" role="button" href="#">
                        {{ trans('index.menu.services') }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a href="{{ route('porezka') }}">{{ trans('index.menu.information.cutting') }}</a> </li>
                        <li> <a href="{{ route('upakovka') }}">{{ trans('index.menu.information.packaging') }}</a> </li>
                        <li> <a href="{{ route('dostavka') }}">{{ trans('index.menu.information.delivery') }}</a> </li>
                    </ul>
                </li>

                <li class="about-us"><a href="{{ route('about-us') }}">{{ trans('index.menu.about_us') }}</a></li>
                <li class="company-profile"><a href="{{ route('profile') }}">{{ trans('index.menu.company_profile') }}</a></li>

                <li class="dropdown products">
                    <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" role="button" href="{{ route('products-index') }}">
                        {{ trans('index.menu.products') }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a href="{{ route('prices') }}">{{ trans('index.menu.price') }}</a> </li>
                    </ul>
                </li>

                <li class="network-of-offices"><a href="{{ route('network-of-offices') }}">{{ trans('index.menu.network_of_offices') }}</a></li>
                <li class="contact-us"><a href="{{ route('contacts') }}">{{ trans('index.menu.contact_us') }}</a></li>

                <li class="blog"><a href="{{ route('blog') }}">{{ trans('index.menu.blog') }}</a></li>
            </ul>

        </div>

    </nav>

</header>

<div class="flash-messages">
    @include('partial.flash-messages')
</div>

    @yield('content')

    @include('partial.footer')

    @include('partial.index-login-form')

    @include('partial.shopping-cart-form')
    @include('partial.shopping-cart-product')

    @include('partial.call-me')


    <div id="info-modal" class="modal fade" aria-labelledby="label-info-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 id="label-info-modal" class="modal-title">{{ trans('products.info') }}</h4>
                </div>

                <div class="modal-body"> </div>

                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="call-me-pleas" data-toggle="modal" data-target="#call-me-back-modal">
        <i class="fa fa-volume-control-phone" aria-hidden="true"> </i>
    </a>
    <div class="gps_ring"> </div>

    <div class="scroller">
        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
    </div>

    <!-- Start SiteHeart code -->
    <script>
    (function(){
        var widget_id = 856303;
        _shcp = [{widget_id : widget_id}];
        var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage ||"en").substr(0,2).toLowerCase();
        var url = "widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
        var hcc = document.createElement("script");
        hcc.type = "text/javascript";
        hcc.async = true;
        hcc.src = ("https:" == document.location.protocol ? "https" : "http") + "://" + url;
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hcc, s.nextSibling);
    })();
    </script>
    <!-- End SiteHeart code -->

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="{{ elixir('js/scripts.js') }}"></script>

    @yield('scripts')


</html>