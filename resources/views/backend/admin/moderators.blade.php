@extends('layouts.admin')

@section('title')
    Менеджеры сайта
@endsection

@section('css')
    <link href="{{ elixir('css/select2.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Менеджеры сайта</h3>
            <div class="pull-right">
                <button class="btn btn-success btn-sm" data-target=".add-moderator" data-toggle="modal" type="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить менеджера
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="moderators-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>Имя пользовател</th>
                        <th>Регион</th>
                        <th>E-mail</th>
                        <th>Роль</th>
                        <th>Статус</th>
                        <th>Активность</th>
                        <th>Создан</th>
                        <th>Действие</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td><input type="text" class="form-control" data-index="0" /></td>
                        <td> </td>
                        <td><input type="text" class="form-control" data-index="2" /></td>
                        <td>
                            <select  class="form-control" data-index="3" style="width: 160px;">
                                <option value=""></option>
                                @foreach($role as $val)
                                    <option value="{{ $val }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select  class="form-control" data-index="4" style="width: 125px">
                                <option value=""></option>
                                @foreach($status as $val)
                                    <option value="{{ $val }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($moderators as $user)
                        <tr role="row">
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->office }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{!! $user->status !!}</td>
                            <td>{!! $user->activity !!}</td>
                            <td>{{ $user->date_created }}</td>
                            <td>
                                <button class="btn btn-default btn-sm"
                                    data-target=".edit-moderator"
                                    data-toggle="modal"
                                    data-id="{{ $user->id }}"
                                    data-name="{{ $user->username }}"
                                    data-officeId="{{ $user->office_id }}"
                                    data-email="{{ $user->email }}"
                                    data-role="{{ $user->roleId }}"
                                    data-status="{{ $user->statusId }}">

                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-sm"
                                    data-target="#delete-modal"
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

    <!-- Модальное окно добавления нового менеджера -->
    @include('partial.moderator-add-modal')
    <!-- Модальное окно редактирования менеджера -->
    @include('partial.moderator-edit-modal')
    <!-- Модальное окно удаления филиала/модератора/продукции -->
    @include('partial.delete-modal')

@endsection

@section('scripts')

    <script src="{{ elixir('js/jqueryTable.js') }}"></script>
    <script src="{{ elixir('js/select2.js') }}"></script>

    <script>
        // $('table').DataTable({
        //     // "ajax": "/administration/get-moderators",
        //     // "columns": [
        //     //     { "data": "username" },
        //     //     { "data": "region" },
        //     //     { "data": "email" },
        //     //     { "data": "role" },
        //     //     { "data": "status" },
        //     //     { "data": "activity" },
        //     //     { "data": "date_created" },
        //     //     // { "data": "buttons" },
        //     // ],

        //     "paging": false,
        //     "lengthChange": true,
        //     "searching": false,
        //     "ordering": true,
        //     "info": false,
        //     "autoWidth": false,
        //     "bSortCellsTop": true
        // });

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

        $("#moderators-table_filter").hide();

        $(table.table().container() ).on('keyup change', '#filter-table input, #filter-table select', function () {
            table.column( $(this).data('index') )
                 .search( this.value )
                 .draw();
        });

        $("table").on('click', '[data-target="#delete-modal"]', function(event){
            $("#modal-title").text("Удаление менеджера");
            $("#modal-delete-form").prop('action', '/administration/moderator');
            $("#delete-id").val($(this).data('id'));
            $(".delete-name").text($(this).data('name'));
        });

        $('#moderators-table').on('click', '[data-target=".edit-moderator"]', function (event) {
            var tut = this;

            $("#edit_id").val($(tut).data('id'));
            $("#edit_username").val($(tut).data('name'));

            $("#edit_office_id").find('options').removeAttr("selected");

            $.each($("#edit_office_id").find('options'), function(key, val){
                if ($(val).val() == $(tut).data('officeId')) {
                    $(val).prop('selected', true);
                    return false;
                }
            });

            $("#edit_email").val($(tut).data('email'));

            $("#edit_role").find("option").each(function(key, val){
                $(val).removeAttr("selected");
                if ($(val).attr("value") == $(tut).data('role')) {
                    $(val).attr("selected", "");
                }
            });

            $("#edit_status").find("option").each(function(key, val){
                $(val).removeAttr("selected");

                if ($(val).attr("value") == $(tut).data('status')) {
                    $(val).attr("selected", "");
                }
            });

            $("#edit_password").val('');
        });

    </script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! $addValidator !!}
@endsection