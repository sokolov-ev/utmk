@extends('layouts.site')

@section('title')
    {{ trans('auth.my-office') }} - {{ trans('products.my-orders') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container">
    <div class="padding-top"></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="wow fadeInLeft">
                <div class="panel panel-default" style="border-radius: 4px; margin-bottom: 0;">
                    <div class="panel-body text-center" style="padding: 18px;">
                        <a class="text-orange-20" href="{{ route('my-cart') }}" title="">{{ trans('products.shopping-cart') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="wow fadeInRight">
                <div class="well text-center">
                    <span class="text-orange">{{ trans('products.my-orders') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="padding-top"></div>
</section>

<section class="my-orders" style="background-color: #eeeeee;">
    <div class="padding-top"></div>
    <div class="container">

    @foreach($orders as $key => $order)
        <div class="panel">
            <div id="headingTwo" class="panel-heading my-finish-orders" role="tab">
                <div class="row">
                    <div class="col-md-2 col-xs-6">
                        <h4 class="panel-title">
                            <a class="collapsed"
                               href="#collapse-{{ $key }}"
                               role="button"
                               data-toggle="collapse"
                               data-parent="#accordion"
                               aria-expanded="false"
                               aria-controls="collapse-{{ $key }}">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i> № {{ $order->id }}
                            </a>
                        </h4>
                    </div>
                    <div class="col-md-4 hidden-xs">
                        {{ date("Y-m-d H:i", $order->created_at->getTimestamp()) }}
                    </div>
                    <div class="col-md-4 col-xs-6 text-right">
                        <strong>{{ $order->total_cost }} грн</strong>
                    </div>
                    <div class="col-md-2 col-xs-12 text-right" style="border-left: 1px solid #ccc;">
                        <strong>{{ trans('orders.status.'.$orderStatus[$order->status]) }}</strong>
                    </div>
                </div>
            </div>
            <div id="collapse-{{ $key }}" class="collapse panel-collapse" role="tabpanel" aria-labelledby="heading-{{ $key }}" aria-expanded="false">
                <div class="panel-body">
                    <?php $products = $order->products()->get(); ?>

                    <table id="clients-table" class="table table-striped table-hover table-condensed" width="100%" cellspacing="0">
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ json_decode($product->title, true)[App::getLocale()] }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->price * $product->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    @endforeach

        {{ var_dump($order->products()->get()) }}


    </div>
    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')

    <script type="text/javascript">

    </script>
@endsection

