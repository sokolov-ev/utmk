@extends('layouts.site')

@section('title')
    {{ trans('auth.my-office') }} - {{ trans('products.formed-orders') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container">
    <div class="padding-top"></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="wow fadeInLeft">
                <div class="well text-center">
                    <a class="text-orange-20" href="{{ route('my-cart') }}" title="">{{ trans('products.shopping-cart') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="wow fadeInRight">
                <div class="well text-center">
                    <a class="text-orange-20" href="{{ route('formed-orders') }}" title="">{{ trans('products.formed-orders') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="padding-top"></div>

    {{ var_dump($orders->toArray()) }}

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')

    <script type="text/javascript">

    </script>
@endsection

