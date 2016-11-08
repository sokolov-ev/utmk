<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link href="{{ elixir('css/admin.css') }}" rel="stylesheet">

    @yield('css')

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
    <link rel="icon" type="image/png" href="/images/icons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/images/icons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/images/icons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/images/icons/manifest.json">
    <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/icons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue layout-boxed sidebar-mini sidebar-collapse">

    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ url('/administration') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">ЮТМК</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">ТОВ "ЮТМК"</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        @if (Auth::guard('admin')->user()->role != 'SEO')
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="{{ url('/administration/orders?status=1') }}">
                                    <i class="fa fa-file-text-o"></i>
                                    @if ($unprocessed_orders > 0)
                                        <span class="label label-danger">{{ $unprocessed_orders }}</span>
                                    @endif
                                </a>

                            </li>
                            <!-- /.messages-menu -->
                        @endif

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                                <i class="ion-person"></i>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::guard('admin')->user()->username }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ url('/administration') }}" class="btn btn-default btn-flat">Профиль</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('/administration/logout') }}" class="btn btn-default btn-flat">Выход</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- /User Account Menu -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    @if (Auth::guard('admin')->user()->role == 'Admin')
                        <li class="treeview">
                            <a href="#"><i class="fa fa-users"></i> <span>Пользователи</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('/administration/moderators') }}">Менеджеры</a></li>
                                <li><a href="{{ url('/administration/clients') }}">Клиенты</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/administration/sms') }}">
                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                <span>TurboSMS</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/offices/index') }}">
                                <i class="fa fa-cubes"></i>
                                <span>Филиалы</span>
                            </a>
                        </li>
                        <li class="header">FRONTEND</li>
                        <li>
                            <a href="{{ url('/administration/blog') }}">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span>Блог</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/metatags') }}">
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <span>Метатеги</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/menu') }}">
                                <i class="fa fa-list-ol"></i>
                                <span>Каталог продукции</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/products') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Продукция</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/orders') }}">
                                <i class="fa fa-file-text-o"></i>
                                <span>Заказы</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::guard('admin')->user()->role == 'Moderator')
                        <li>
                            <a href="{{ url('/administration/products') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Продукция</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/orders') }}">
                                <i class="fa fa-file-text-o"></i>
                                <span>Заказы</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::guard('admin')->user()->role == 'SEO')
                        <li>
                            <a href="{{ url('/administration/blog') }}">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span>Блог</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/metatags') }}">
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <span>Метатеги</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/menu') }}">
                                <i class="fa fa-list-ol"></i>
                                <span>Каталог продукции</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/products') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Продукция</span>
                            </a>
                        </li>
                    @endif
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @include('partial.flash-messages')

            @yield('content')

        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <!--
                <div class="pull-right hidden-xs">
                    Anything you want
                </div>
            -->
            <!-- Default to the left -->
            <strong>Авторские права &copy; {{ date('Y') }} <a href="#">ТОВ "ЮТМК" Україна</a>.</strong> Все права защищены.
        </footer>
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- AdminLTE App -->
    <script src="{{ elixir('js/adminlte.js') }}"></script>

    @yield('scripts')

</body>
</html>