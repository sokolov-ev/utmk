@extends('layouts.admin')

@section('title')
    Клиенты сайта
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Клиенты сайта</h3>
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

@endsection

@section('scripts')

    <script src="{{ elixir('js/jqueryTable.js') }}"></script>
    <script>
        var table = $('table').DataTable({
                        "paging": false,
                        "lengthChange": true,
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
            table.column( $(this).data('index') )
                 .search( this.value )
                 .draw();
        });
    </script>

@endsection