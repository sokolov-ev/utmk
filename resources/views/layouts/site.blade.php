<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Webpage">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @yield('meta')

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link href="{{ elixir('css/styles.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body id="app-layout">

<section id="top__content" class="container-fluid">
    <div class="margin-15">
        <div class="row">

            <div class="col-md-3 col-sm-4 col-xs-12">
                <img src="/images/logo.jpg" title="Metall Vsem" alt="Metall Vsem" height="93px"/>
            </div>

            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="user-block">
                    @if (!Auth::guest())
                        <a class="text-orange-20" href="{{ route('logout', request()->query()) }}" title="{{ trans('auth.logout') }}">
                            <i class="fa fa-sign-out fa-4x" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-green-20 shopping-cart-button" data-target="#shopping-cart" data-toggle="modal" title="{{ trans('products.shopping-cart') }}">
                            <i class="fa fa-cart-plus fa-4x" aria-hidden="true"></i>
                            @if ($user_cart > 0)
                                <span class="shopping-cart-badge">{{ $user_cart }}</span>
                            @else
                                <span class="shopping-cart-badge hidden"></span>
                            @endif
                        </a>
                    @endif
                    @if (Auth::guest())
                        <a href="#" class="text-green-20" data-target="#login-form" data-toggle="modal" title="{{ trans('auth.login') }}">
                            <i class="fa fa-sign-in fa-4x" aria-hidden="true"></i>
                        </a>
                    @else
                        <a href="{{ route('my-cart', request()->query()) }}" class="text-green-20" title="{{ trans('auth.my-office') }}">
                            <i class="fa fa-user fa-4x" aria-hidden="true"></i>
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
                {{--
                <li class="dropdown home">
                    <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" role="button" href="{{ route('index-page', request()->query()) }}">
                        {{ trans('index.menu.home') }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a href="#">{{ trans('index.menu.information.cutting') }}</a> </li>
                        <li> <a href="#">{{ trans('index.menu.information.packaging') }}</a> </li>
                        <li> <a href="#">{{ trans('index.menu.information.delivery') }}</a> </li>
                    </ul>
                </li>
                --}}
                <li class="home"><a href="{{ route('index-page', request()->query()) }}">{{ trans('index.menu.home') }}</a></li>
                <li class="about-us"><a href="{{ route('about-us', request()->query()) }}">{{ trans('index.menu.about_us') }}</a></li>
                <li class="company-profile"><a href="{{ route('profile', request()->query()) }}">{{ trans('index.menu.company_profile') }}</a></li>
                <li class="products"><a href="{{ route('products-index', request()->query()) }}">{{ trans('index.menu.products') }}</a></li>
                <li class="network-of-offices"><a href="{{ route('network-of-offices', request()->query()) }}">{{ trans('index.menu.network_of_offices') }}</a></li>
                <li class="contact-us"><a href="{{ route('contacts', request()->query()) }}">{{ trans('index.menu.contact_us') }}</a></li>
            </ul>

        </div>

    </nav>

</header>

    @yield('content')

    @include('partial.footer')

    @include('partial.index-login-form')

    @include('partial.shopping-cart-form')
    @include('partial.shopping-cart-product')

<div class="scroller">
    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
</div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="{{ elixir('js/scripts.js') }}"></script>

    @yield('scripts')


</html>