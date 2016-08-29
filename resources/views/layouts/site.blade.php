<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link href="{{ elixir('css/styles.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body id="app-layout">

<div id="top__content" class="logo-contacts row" >
    <div class="col-md-6">
        <img src="/images/logo.jpg" title="Metall Vsem" alt="Metall Vsem" height="93px"/>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
</div>

<header id="w-sticker">

    <nav class="navbar navbar-default" id="sticker">

            <div class="navbar-header text-center">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mettal-vsem-menu" aria-expanded="false">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
            </div>

            <div id="mettal-vsem-menu" class="collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <li class="dropdown home">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" role="button" href="{{ url('/') }}">
                            {{ trans('index.menu.home') }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">{{ trans('index.menu.cutting') }}</a></li>
                            <li><a href="#">{{ trans('index.menu.packaging') }}</a></li>
                            <li><a href="#">{{ trans('index.menu.delivery') }}</a></li>
                            <li class="divider" role="separator"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li class="about-us"><a href="#">{{ trans('index.menu.about_us') }}</a></li>
                    <li class="company-profile"><a href="#">{{ trans('index.menu.company_profile') }}</a></li>
                    <li class="products"><a href="#">{{ trans('index.menu.products') }}</a></li>
                    <li class="network-of-offices"><a href="{{ url('/network-of-offices') }}">{{ trans('index.menu.network_of_offices') }}</a></li>
                    <li class="contact-us"><a href="#">{{ trans('index.menu.contact_us') }}</a></li>
                </ul>

            </div>

    </nav>

</header>

    @yield('content')

<div class="scroller">
    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
</div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="{{ elixir('js/scripts.js') }}"></script>

    @yield('scripts')

</html>