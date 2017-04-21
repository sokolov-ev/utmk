@extends('layouts.admin')

@section('title')
    Заказ № {{ $order->id }}
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Заказ № {{ $order->id }}</h3>
            {{ csrf_field() }}
        </div>
        <div class="box-body">
            <ol class="breadcrumb">
                <li><a href="{{ url('administration/orders') }}">Заказы</a></li>
                <li class="active">Заказ № {{ $order->id }}</li>
            </ol>

            <dl class="dl-horizontal">
                <dt>Заказ оформлен:</dt>
                <dd>{{ date("Y-m-d H:i", $order->created_at->getTimestamp()) }}</dd>
                <dt>Общая стоимость:</dt>
                <dd><strong class="order-id" data-id="{{ $order->id }}">{{ $order->total_cost }}</strong> грн</dd>

                @if(($isAdmin) || ($order->manager_id == $manager->id))
                    <dt>Клиент:</dt>
                    <dd>{{ $order->user->username }}</dd>
                    <dt>Контакты:</dt>
                    <dd>{{ $order->user->phone }}<br/>{{ $order->user->email }}</dd>
                    @if ($order->contacts)
                        <dt>Доп. контакты:</dt>
                        <dd>{{ $order->contacts }}</dd>
                    @endif
                    @if ($order->wish)
                        <dt>Пожелания:</dt>
                        <dd>{{ $order->wish }}</dd>
                    @endif
                @endif

                @if ( ($isAdmin) && ($order->manager_id) )
                    <br/>
                    <dt>Менеджер:</dt>
                    <dd>{{ $order->manager->username }}</dd>
                    <dt>Офис:</dt>
                    <dd>{{ json_decode($office->title, true)['ru'] }}</dd>
                @endif
            </dl>

            <br/>

            <table id="clients-table" class="table table-striped table-hover table-condensed dataTable shopping-product" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>Наименование</th>
                        <th>Город</th>
                        <th>Мера</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Итого</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr id="bonds-{{ $product['bonds'] }}">
                            <td>{{ $product['title'] }}</td>
                            <td>{{ $product['office_city_ru'] }}</td>
                            <td>
                                @if ( ( ($order->status == 2) && ($order->manager_id == Auth::guard('admin')->user()->id) ) || $isAdmin )
                                    <div class="shopping-type-product">
                                        <select name="price_type" class="form-control price-type price-type-{{ $key }}" data-workid="{{ $key }}">
                                            @foreach($product['prices'] as $prod)
                                                @if($prod['id'] == $product['price_id'])
                                                    <option value="{{ $prod['id'] }}" selected="">{{ $prod['type'] }}</option>
                                                @else
                                                    <option value="{{ $prod['id'] }}">{{ $prod['type'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    {{ $product['prices'][$product['price_id']]['type'] }}
                                @endif
                            </td>
                            <td>
                                <div class="price price-{{ $key }}">
                                    {{ $product['prices'][$product['price_id']]['price'] }}
                                </div>
                            </td>
                            <td>
                                @if ( ( ($order->status == 2) && ($order->manager_id == Auth::guard('admin')->user()->id) ) || $isAdmin )
                                    <div class="shopping-cart">
                                        <button type="button" class="btn btn-link cart-quantity-minus" data-workid="{{ $key }}">
                                            <i class="fa fa-minus" aria-hidden="true"> </i>
                                        </button>
                                        <input type="text"
                                               class="quantity quantity-{{ $key }}"
                                               value="{{ $product['quantity'] }}"
                                               data-workid="{{ $key }}" />
                                        <button type="button" class="btn btn-link cart-quantity-plus" data-workid="{{ $key }}">
                                            <i class="fa fa-plus" aria-hidden="true"> </i>
                                        </button>
                                    </div>
                                @else
                                    {{ $product['quantity'] }}
                                @endif
                            </td>
                            <td>
                                <div class="sum-price sum-price-{{ $key }}">
                                    {{ $product['prices'][$product['price_id']]['price'] * $product['quantity'] }}
                                </div>
                            </td>
                            <td>
                                @if ( ( ($order->status == 2) && ($order->manager_id == Auth::guard('admin')->user()->id) ) || $isAdmin )
                                    <div class="text-center">
                                        <button class="btn btn-danger btn-xs" onclick="deleteProduct({{ $product['bonds'] }})">
                                            Удалить
                                        </button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br/>

            @if ($order->status == 1)
                <a class="btn btn-primary pull-right" href="{{ url('/administration/orders/accept/'.$order->id) }}">Принять заказ</a>
            @endif

            @if ( ($order->status == 2) && ( ($order->manager_id == Auth::guard('admin')->user()->id) || $isAdmin ) )
                <a class="btn btn-warning pull-right" href="{{ url('/administration/orders/closed/'.$order->id) }}">Закрыть заказ</a>
            @endif
        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script type="text/javascript">

        var prices  = [];
        var orderID = $(".order-id").data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
            }
        });

        $.get("/administration/orders/get/" + orderID, function(response){
            if ( (response.status == "ok") && (response.data.length > 0) ) {
                $.each(response.data, function(key, product){
                    product.work_key = key;

                    var id = 0;
                    var temp;

                    $.each(product.prices, function(priceId, price){
                        temp = {};

                        temp.price = price.price;
                        temp.bonds = product.bonds;

                        prices[priceId] = temp;
                    });
                });
            }
        });

        $("body").on('change', '.price-type', function(event) {
            var tut = this;
            var key = $(tut).data('workid');
            var id  = $(tut).val();
            var quantity = $(".quantity-" + key).val();

            $(".price-" + key).text(prices[id].price);
            $(".sum-price-" + key).text(quantity * prices[id].price);

            changeCountProduct(prices[id].bonds, quantity, id);
        });

        $("body").on('click', ".cart-quantity-minus", function(event){
            var tut = this;
            var key = $(tut).data('workid');
            var id  = $(".price-type-" + key).val();
            var quantity = $(".quantity-" + key).val();

            if (quantity > 1) {
                $(".quantity-" + key).val(--quantity);
                $(".sum-price-" + key).text(quantity * prices[id].price);
                changeCountProduct(prices[id].bonds, quantity, id);
            }

        });

        $("body").on('click', ".cart-quantity-plus", function(event){
            var tut = this;
            var key = $(tut).data('workid');
            var id  = $(".price-type-" + key).val();
            var quantity = $(".quantity-" + key).val();

            $(".quantity-" + key).val(++quantity);
            $(".sum-price-" + key).text(prices[id].price * quantity);

            changeCountProduct(prices[id].bonds, quantity, id);
        });

        $("body").on('change keyup', ".quantity", function(event){
            var tut = this;
            var key = $(tut).data('workid');
            var id  = $(".price-type-" + key).val();

            tut.value = tut.value.replace("/^\D+/g", '');

            if ( (tut.value == '') || (tut.value < 1) ) {
                tut.value = 1;
            }

            $(".sum-price-" + key).text(prices[id].price * tut.value);

            changeCountProduct(prices[id].bonds, tut.value, id);
        });

        function changeCountProduct(bonds, count, price)
        {
            var data = {};
            data.order = orderID;
            data.bonds = bonds;
            data.count = count;
            data.price = price;

            $.post('/administration/orders/change-product', data, function(response){
                if (response.status == 'ok') {
                    $(".order-id").text(response.data);
                }
            });
        }

        function deleteProduct(bonds)
        {
            $.post('/administration/orders/delete', {order: orderID, bonds: bonds}, function(response){
                if (response.status == 'ok') {
                    $("#bonds-" + bonds).remove();
                    $(".order-id").text(response.data);
                }
            });
        }
    </script>

@endsection