@extends('layouts.admin')

@section('title')
    Клиенты сайта
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Клиенты сайта</h3>
            {{ csrf_field() }}
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ url('/administration/clients') }}">
                    <i class="fa fa-refresh" aria-hidden="true"></i> Сбросить фильтры
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="clients-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Имя пользовател</th>
                        <th>Компания</th>
                        <th>E-mail</th>
                        <th>Телефон</th>
                        <th>Активность</th>
                        <th>Создан</th>
                        <th width="90">Действие</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td><input type="text" data-column="id" class="form-control id" /></td>
                        <td><input type="text" class="form-control" /></td>
                        <td><input type="text" class="form-control" /></td>
                        <td><input type="text" class="form-control" /></td>
                        <td><input type="text" class="form-control" /></td>
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

    <!-- Модальное окно редактирования клинета -->
    @include('partial.client-edit-modal')
    {{-- Модальное окно удаления филиала/модератора/продукции --}}
    @include('partial.delete-modal')

@section('scripts')

    <script src="{{ elixir('js/jqueryTable.js') }}"></script>

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
                "url": "/administration/clients/filtering",
                "type": "POST",
                "dataSrc": "data",
            },
            "columns": [
                { "data": "id" },
                { "data": "username" },
                { "data": "company" },
                { "data": "email" },
                { "data": "phone" },
                { "data": "activity" },
                { "data": "created_at" },
            ],
            "columnDefs":[
                {
                    "targets": [7],
                    "sortable": false,
                    "render": function(date, type, full) {
                        return '<button class="btn btn-default btn-sm view-comments" \
                                        data-comments="'+full.comments+'"> \
                                            <i class="fa fa-eye" aria-hidden="true"></i> \
                                </button> \
                                <button class="btn btn-warning btn-sm" \
                                    data-target=".edit-client" \
                                    data-toggle="modal" \
                                    data-id="'+full.id+'" \
                                    data-username="'+full.username+'" \
                                    data-company="'+full.company+'" \
                                    data-email="'+full.email+'" \
                                    data-phone="'+full.phone+'" \
                                    data-comments="'+full.edit_comments+'"> \
                                    <i class="fa fa-pencil" aria-hidden="true"></i> \
                                </button> \
                                <button class="btn btn-danger btn-sm" \
                                        data-target="#delete-modal" \
                                        data-toggle="modal" \
                                        data-id="'+full.id+'" \
                                        data-name="'+full.username+'"> \
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

        $('table').on('click', '.view-comments', function () {
            var comments = $(this).data('comments');

            if ($(this).closest('tr').next(".data-comment")[0] == undefined) {
                $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');

                $(this).closest('tr').after('<tr class="data-comment" style="display: none;"><td colspan="10">'+comments+'</td></tr>');
                $('.data-comment').fadeIn(800);
            } else {
                $(this).find('i').addClass('fa-eye').removeClass('fa-eye-slash');
                $(this).closest('tr').next(".data-comment")[0].remove();
            }
        });

        $('table').on('click', '[data-target=".edit-client"]', function (event) {
            var tut = this;

            $("#edit_id").val($(tut).data('id'));
            $("#username").val($(tut).data('username'));
            $("#company").val($(tut).data('company'));
            $("#email").val($(tut).data('email'));
            $("#phone").val($(tut).data('phone'));
            $("#note_user").val($(tut).data('edit_comments'));

            $("#password").val('');
        });

        $("table").on('click', '[data-target="#delete-modal"]', function(event){
            $("#modal-title").text("Удаление клиента");
            $("#modal-delete-form").prop('action', '/administration/clients');
            $("#delete-id").val($(this).data('id'));
            $(".delete-name").text($(this).data('name'));
        });
    </script>

@endsection