@extends('layouts.admin')

@section('title')
    Новости компании
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Новости компании</h3>
            {{ csrf_field() }}
            <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ url('/administration/blog/add') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i> Добавить новость
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="products-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>Дата публикации</th>
                        <th>Заголовок</th>
                        <th>Показывать</th>
                        <th class="work-actions">Действие</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td>
                            <input type="text" data-column="date" class="form-control" />
                        </td>
                        <td>
                            <input type="text" data-column="title" class="form-control" />
                        </td>
                        <td>
                            <select  class="form-control">
                                <option value=""></option>
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>

        </div>
    </div>
</section>

@endsection

    {{-- Модальное окно удаления филиала/модератора/продукции --}}
    @include('partial.delete-modal')

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
                "url": "/administration/blog/filtering",
                "type": "POST",
                "dataSrc": "data",
            },
            "columns": [
                { "data": "published" },
                { "data": "title" },
                { "data": "show_this" },
            ],
            "columnDefs":[
                {
                    "targets": 3,
                    "sortable": false,
                    "render": function(date, type, full) {
                        return '<a class="btn btn-default btn-xs" \
                                   href="/administration/blog/preview/'+full.slug+'" \
                                   title="Предосмотр"> \
                                       <i class="fa fa-eye" aria-hidden="true"></i> \
                                </a> \
                                <a class="btn btn-warning btn-xs" \
                                   href="/administration/blog/edit/'+full.id+'" \
                                   title="Редактировать"> \
                                       <i class="fa fa-pencil" aria-hidden="true"></i> \
                                </a> \
                                <button class="btn btn-danger btn-xs" \
                                        data-target="#delete-modal" \
                                        data-toggle="modal" \
                                        data-id="'+full.id+'" \
                                        data-name="'+full.title+'"> \
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> \
                                </button>';
                    }
                }
            ]
        });

        $("#products-table_filter").hide();

        $('table').on('keyup change', '#filter-table input, #filter-table select', function(event) {
            table.column( $(this).closest('td').index() )
                 .search( this.value )
                 .draw();
        });

        $(window).on('load resize', function(event){
            $.each($("#filter-table input, #filter-table select"), function(key, val){
                if ($(val).val() != '') {
                    table.column( $(val).closest('td').index() )
                         .search( $(val).val() )
                         .draw();
                }
            });
        });

        $('table').on('click', '.view-product', function () {
            var tut = this;
            var id  = $(tut).data('id');

            if ($(tut).closest('tr').next(".data-product")[0] == undefined) {
                $(tut).find('i').removeClass('fa-eye').addClass('fa-eye-slash');

                $.get('/administration/products/get/' + id, function(response) {
                    if (response.status == 'ok') {
                        var template = $('#product-template').html();
                        Mustache.parse(template);
                        var product = Mustache.render(template, response);

                        $(tut).closest('tr').after('<tr class="data-product" style="display: none;"><td colspan="10">' + product + '</td></tr>');
                        $('.data-product').fadeIn(800);
                    }
                });
            } else {
                $(tut).find('i').addClass('fa-eye').removeClass('fa-eye-slash');
                $(tut).closest('tr').next(".data-product")[0].remove();
            }
        } );

        $("table").on('click', '[data-target="#delete-modal"]', function(event){
            $("#modal-title").text("Удаление продукции");
            $("#modal-delete-form").prop('action', '/administration/blog');
            $("#delete-id").val($(this).data('id'));
            $(".delete-name").text($(this).data('name'));
        });
    </script>

@endsection