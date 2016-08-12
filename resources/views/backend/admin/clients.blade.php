@extends('layouts.admin')

@section('title')
    Клиенты сайта
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Клиенты сайта</h3>
        </div>
        <div class="box-body">
            <table id="clients-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>Имя пользовател</th>
                        <th>Компания</th>
                        <th>E-mail</th>
                        <th>Телефон</th>
                        <th>Активность</th>
                        <th>Создан</th>
                        <th>Действие</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td><input type="text" class="form-control" data-index="0" /></td>
                        <td><input type="text" class="form-control" data-index="1" /></td>
                        <td><input type="text" class="form-control" data-index="2" /></td>
                        <td><input type="text" class="form-control" data-index="3" /></td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $user)
                        <tr role="row">
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->company }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{!! $user->activity !!}</td>
                            <td>{{ $user->date_created }}</td>
                            <td>
                                <button class="btn btn-default btn-sm"
                                    data-target=".edit-moderator"
                                    data-toggle="modal"
                                    data-id="{{ $user->id }}"
                                    data-name="{{ $user->username }}"
                                    data-region="{{ $user->company }}"
                                    data-email="{{ $user->email }}"
                                    data-role="{{ $user->roleId }}"
                                    data-status="{{ $user->phone }}">

                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-sm"
                                    data-target=".delete-moderator"
                                    data-toggle="modal"
                                    data-id="{{ $user->id }}"
                                    data-name="{{ $user->username }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
{{--
    <!-- Модальное окно добавления нового менеджера -->
    @include('partial.modal-add-moderator')
    Модальное окно редактирования менеджера
    @include('partial.modal-edit-moderator')
    <!-- Модальное окно удаление менеджера -->
    @include('partial.modal-delete-moderator') --}}

@endsection

@section('scripts')

    <script src="{{ elixir('js/jqueryTable.js') }}"></script>
    <script>
        var table = $('table').DataTable({
                        "paging": false,
                        "lengthChange": true,
                        // "searching": false,
                        "ordering": true,
                        "info": false,
                        "autoWidth": false,
                        "bSortCellsTop": true,
                        "language": {
                            "sEmptyTable": "Нет записей...",
                        }
                    });

        $("#clients-table_filter").hide();

        $(table.table().container() ).on('keyup change', '#filter-table input, #filter-table select', function () {

            console.log(this.value);

            table.column( $(this).data('index') )
                 .search( this.value )
                 .draw();
        });

        // $('#moderators-table').on('click', '[data-target=".delete-moderator"]', function (event) {
        //     $('.delete-moderator .moderator-name').html($(this).data('name'));
        //     $('.delete-moderator #moderator-id').val($(this).data('id'));
        // });

        // $('#moderators-table').on('click', '[data-target=".edit-moderator"]', function (event) {
        //     var tut = this;

        //     $("#edit_id").val($(tut).data('id'));
        //     $("#edit_username").val($(tut).data('name'));
        //     $("#edit_email").val($(tut).data('email'));

        //     $("#edit_role").find("option").each(function(key, val){
        //         $(val).removeAttr("selected");
        //         if ($(val).attr("value") == $(tut).data('role')) {
        //             $(val).attr("selected", "");
        //         }
        //     });

        //     // console.log($(tut).data('statusId'));

        //     $("#edit_status").find("option").each(function(key, val){
        //         $(val).removeAttr("selected");

        //         // console.log($(val).attr("value"));

        //         if ($(val).attr("value") == $(tut).data('status')) {
        //             $(val).attr("selected", "");
        //         }
        //     });

        //     $("#edit_password").val('');
        // });

    </script>

    <!-- Laravel Javascript Validation -->
{{--     <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! $addValidator !!} --}}
@endsection