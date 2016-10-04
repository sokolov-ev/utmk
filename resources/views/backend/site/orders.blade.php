@extends('layouts.admin')

@section('title')
    Заказы
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Заказы</h3>
            {{ csrf_field() }}
        </div>
        <div class="box-body">
            <table id="products-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>№</th>
                        <th>Клиент</th>
                        <th>Общая стоимость</th>
                        <th>Статус</th>
                        <th>Принял заказ</th>
                        <th>Офис</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td>
                            <input type="text" data-column="id" class="form-control id" />
                        </td>
                        <td>
                            <input type="text" class="form-control" />
                        </td>
                        <td>
                            <input type="text" class="form-control" />
                        </td>
                        <td>
                            <select  class="form-control">
                                <option value=""></option>
                                @foreach($orderStatus as $key => $item)
                                    <option value="{{ $key }}" {{ ($key == $status) ? 'selected=""' : "" }}>{{ trans('orders.status.'.$item) }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" />
                        </td>
                        <td>
                            <input type="text" class="form-control" />
                        </td>
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>

        </div>
    </div>
</section>

@endsection

    {{-- Подгружаем шаблон для mustache --}}
    @include('partial.order-product-template')

@section('scripts')

    <script src="{{ elixir('js/jqueryTable.js') }}"></script>
    <script src="{{ elixir('js/mustache.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
            }
        });

        var table = $('table').DataTable({
            "paging": true,
            "lengthChange": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "sortCellsTop": true,
            "language": {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/administration/orders/filtering",
                "type": "POST",
                "dataSrc": "data",
            },
            "columns": [
                { "data": "id" },
                { "data": "user" },
                { "data": "total_cost" },
                { "data": "status" },
                { "data": "moderator" },
                { "data": "office" },
            ],
            "createdRow": function(row, data, index) {
                $(row).attr("data-id", data.id);
                $(row).addClass('view-order');
            }
        });

        $("#products-table_filter").hide();

        $('table').on('keyup change', '#filter-table input, #filter-table select', function(event) {
            table.column( $(this).closest('td').index() )
                 .search( this.value )
                 .draw();
        });

        $(window).on('load', function(event){
            $.each($("#filter-table input, #filter-table select"), function(key, val){
                if ($(val).val() != '') {
                    table.column( $(val).closest('td').index() )
                         .search( $(val).val() )
                         .draw();
                }
            });
        });

        $('table').on('click', '.view-order', function(event) {
            window.location.href = "/administration/orders/view/" + $(this).data("id");
        });

        // $('table').on('click', '.view-order', function () {
        //     var tut = this;
        //     var id  = $(tut).data('id');

        //     if ($(tut).closest('tr').next(".data-order")[0] == undefined) {
        //         $(tut).find('i').removeClass('fa-eye').addClass('fa-eye-slash');

        //         $.get('/administration/orders/get/' + id, function(response) {
        //             if (response.status == 'ok') {
        //                 var template = $('#order-product-template').html();
        //                 var order = '';
        //                 Mustache.parse(template);

        //                 $.each(response.data, function(key, val){
        //                     order += Mustache.render(template, val);
        //                 });

        //                 var orderData = '<tr class="data-order" style="display: none;"> \
        //                                     <td colspan="7"> \
        //                                         <table class="table table-condensed"> \
        //                                             <thead> \
        //                                                 <tr> \
        //                                                     <th>Город</th> \
        //                                                     <th>Наименование продукции</th> \
        //                                                     <th>Стоимость</th> \
        //                                                     <th>Количество</th> \
        //                                                     <th>В сумме</th> \
        //                                                     <th> </th> \
        //                                                 </tr> \
        //                                             </thead> \
        //                                             <tbody>' + order + ' \
        //                                             <tr><td colspan="6"><b>Дополнительные онтакты</b>: ' + response.contacts + '</td></tr> \
        //                                             <tr><td colspan="6"><b>Пожелания</b>: ' + response.wish + '</td></tr> \
        //                                             </tbody> \
        //                                         </table> \
        //                                     </td> \
        //                                 </tr>';

        //                 $(tut).closest('tr').after(orderData);
        //                 $('.data-order').fadeIn(800);
        //             }
        //         });
        //     } else {
        //         $(tut).find('i').addClass('fa-eye').removeClass('fa-eye-slash');
        //         $(tut).closest('tr').next(".data-order")[0].remove();
        //     }
        // });

        // function totalPrice(count, bonds, order)
        // {
        //     var sum = 0;

        //     $.each($(".price-order-" + order), function(key, val){
        //         sum += +$(val).text().trim();
        //     });

        //     $("#sum-price-order-"+order).text(sum);

        //     $.post('/administration/orders/products-count', {id:order, count:count, bonds:bonds, sum:sum}, function(response){});
        // }

        // function deleteProduct(id, bonds)
        // {
        //     $.post('/administration/orders/products-delete', {id:id, bonds:bonds}, function(response){
        //         if (response.status == 'ok') {
        //             $("#sum-price-order-" + id).text(response.data);
        //         }
        //     });
        // }

        // $("body").on('click', ".cart-quantity-minus", function(event){
        //     var id    = $(this).next("input").data('id');
        //     var count = +$(this).next("input").val();
        //     var price = $(this).next("input").data('price');
        //     var bonds = $(this).next("input").data('bonds');
        //     var order = $(this).next("input").data('order');

        //     if (count > 1) {
        //         $(this).next("input").val(--count);
        //         $("#sum-price-" + id).html(price * count);

        //         totalPrice(count, bonds, order);
        //     }
        // });

        // $("body").on('change keyup', ".product-price", function(event){
        //     var id    = $(this).data('id');
        //     var price = $(this).data('price');
        //     var bonds = $(this).data('bonds');
        //     var order = $(this).data('order');

        //     this.value = this.value.replace(/[^0-9]/g, '');
        //     if ( (this.value == '') || (this.value < 1) ) {
        //         this.value = 1;
        //     }

        //     $("#sum-price-" + id).html(price * this.value);
        //     totalPrice(count, bonds, order);
        // });

        // $("body").on('click', '.cart-quantity-plus', function(event){
        //     var id    = $(this).prev("input").data('id');
        //     var count = +$(this).prev("input").val();
        //     var price = $(this).prev("input").data('price');
        //     var bonds = $(this).prev("input").data('bonds');
        //     var order = $(this).prev("input").data('order');

        //     $(this).prev("input").val(++count);
        //     $("#sum-price-" + id).html(price * count);

        //     totalPrice(count, bonds, order);
        // });

        // $("table").on('click', '.order-action', function(event){
        //     var id  = $(this).data('id');
        //     var tut = this;

        //     $.post('/administration/orders/action', {id: id}, function(response){
        //         if (response.status == 'ok') {
        //             $(tut).closest('td').append(response.data);
        //             $(tut).remove();
        //         }
        //     });
        // });
    </script>

@endsection