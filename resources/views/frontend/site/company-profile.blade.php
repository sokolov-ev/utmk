@extends('layouts.site')

@section('title')
    {{ trans('index.menu.company_profile') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container">

    <div class="padding-top"></div>

    <h1 class="welcome-text text-center">What we offer</h1>

    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-sm-4 col-xs-4">
                    <img class="green-img" src="/images/template/index-img-005.jpg" alt="" title="" style="max-width: 493px;" />
                </div>
                <div class="col-sm-8 col-xs-8">

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-sm-4 col-xs-4">
                    <img class="green-img" src="/images/template/index-img-005.jpg" alt="" title="" style="max-width: 493px;" />
                </div>
                <div class="col-sm-8 col-xs-8">

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-sm-4 col-xs-4">
                    <img class="green-img" src="/images/template/index-img-005.jpg" alt="" title="" style="max-width: 493px;" />
                </div>
                <div class="col-sm-8 col-xs-8">

                </div>
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".company-profile").addClass('active');

        $('.parallax-window').parallax();
    </script>
@endsection

