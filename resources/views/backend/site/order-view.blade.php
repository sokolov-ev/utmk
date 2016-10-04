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
            <dl class="dl-horizontal">
                <dt>Заказ оформлен:</dt>
                <dd>{{ date("Y-m-d H:i", $order->created_at->getTimestamp()) }}</dd>
                <dt>Общая стоимость:</dt>
                <dd><strong id="total-price-{{ $order->id }}">{{ $order->total_cost }}</strong> грн</dd>
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
                @if ( ($isAdmin) && ($order->manager_id) )
                    <br/>
                    <dt>Менеджер:</dt>
                    <dd>{{ $order->manager->username }}</dd>
                    <dt>Офис:</dt>
                    <dd>{{ json_decode($office->title, true)['ru'] }}</dd>
                @endif
            </dl>

            <br/>

            <table id="clients-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>Наименование</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Итого</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ $product['title'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>
                                @if ((($isAdmin) || ($order->manager_id == Auth::guard('admin')->user()->id)) && ($order->status != 3) )
                                    <button type="button" class="btn btn-link cart-quantity-minus">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                    <input type="text"
                                           value="{{ $product['quantity'] }}"
                                           class="product-price"
                                           data-id="{{ $key }}"
                                           data-price="{{ $product['price'] }}"
                                           data-bonds="{{ $product['bonds'] }}"
                                           data-order="{{ $order->id }}" />
                                    <button type="button" class="btn btn-link cart-quantity-plus">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                @else
                                    {{ $product['quantity'] }}
                                @endif
                            </td>
                            <td><div id="sum-price-{{ $key }}" class="sum-price">{{ $product['price'] * $product['quantity'] }}</td>
                            <td>
                                @if ((($isAdmin) || ($order->manager_id == Auth::guard('admin')->user()->id)) && ($order->status != 3) )
                                    <a class="btn btn-danger btn-xs" href="{{ url('/administration/orders/delete/'.$product['bonds']) }}" title="Удалить">Удалить</a>
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

            @if ( ( ($order->status == 2) && ($order->manager_id == Auth::guard('admin')->user()->id) ) || ($isAdmin) )
                <a class="btn btn-warning pull-right" href="{{ url('/administration/orders/closed/'.$order->id) }}">Закрыть заказ</a>
            @endif
        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
            }
        });

        $("body").on('click', ".cart-quantity-minus", function(event) {
            var id = $(this).next("input").data('id');
            var count = +$(this).next("input").val();
            var price = $(this).next("input").data('price');
            var bonds = $(this).next("input").data('bonds');
            var order = $(this).next("input").data('order');

            if (count > 1) {
                $(this).next("input").val(--count);
                $("#sum-price-" + id).html(price * count);

                fixPrice(count, bonds, order);
            }
        });

        $("body").on('change keyup', ".product-price", function(event) {
            var id    = $(this).data('id');
            var price = $(this).data('price');
            var bonds = $(this).data('bonds');
            var order = $(this).data('order');

            this.value = this.value.replace(/[^0-9]/g, '');
            if ( (this.value == '') || (this.value < 1) ) {
                this.value = 1;
            }

            $("#sum-price-" + id).html(price * this.value);

            fixPrice(count, bonds, order);
        });

        $("body").on('click', '.cart-quantity-plus', function(event) {
            var id    = $(this).prev("input").data('id');
            var count = +$(this).prev("input").val();
            var price = $(this).prev("input").data('price');
            var bonds = $(this).prev("input").data('bonds');
            var order = $(this).prev("input").data('order');

            $(this).prev("input").val(++count);
            $("#sum-price-" + id).html(price * count);

            fixPrice(count, bonds, order);
        });

        function fixPrice(count, bonds, order)
        {
            var sum = 0;

            $.each($(".sum-price"), function(key, val){
                sum += +$(val).text().trim();
            });

            $("#total-price-" + order).text(sum);

            $.post('/administration/orders/count', {id:order, count:count, bonds:bonds, sum:sum}, function(response){});
        }
    </script>

@endsection