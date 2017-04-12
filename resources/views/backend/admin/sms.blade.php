@extends('layouts.admin')

@section('title')
    TurboSMS
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Отправленные сообщения</h3>
            {{ csrf_field() }}
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ url('/administration/sms') }}">
                    <i class="fa fa-refresh" aria-hidden="true"></i> Сбросить фильтры
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="clients-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Дата отправки</th>
                        <th>Текст</th>
                        <th>Статус</th>
                        <th>Отправленно</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script src="{{ elixir('js/jqueryTable.min.js') }}"></script>

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
                "url": "/administration/sms/filtering",
                "type": "POST",
                "dataSrc": "data",
            },
            "columns": [
                { "data": "id" },
                { "data": "date_sent" },
                { "data": "text" },
                { "data": "message" },
                { "data": "status" },
            ],
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
    </script>

@endsection