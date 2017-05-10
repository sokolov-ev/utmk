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

@section('scripts')

    <script src="{{ elixir('js/jqueryTable.min.js') }}"></script>
    <script src="{{ elixir('js/mustache.min.js') }}"></script>

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
    </script>

@endsection