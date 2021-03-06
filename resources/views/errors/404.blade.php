<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('errors.title.404') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link href="{{ elixir('css/admin.min.css') }}" rel="stylesheet">

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
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">

    <!-- Main content -->
    <section class="content" style="margin-top: 20vh;">
        <div class="text-center">
            <h1 class="text-red" style="font-size: 80px; font-weight: 300;">404</h1>
            <h2 class="text-red">{{ trans('errors.text.404') }}</h2>
            <br>
            <a class="btn btn-danger" href="{{ url()->previous() }}" style="font-size: 20px;">
                {{ trans('errors.text.go-back') }}
            </a>
        </div>
    </section>
    <!-- Main content -->

</body>
</html>