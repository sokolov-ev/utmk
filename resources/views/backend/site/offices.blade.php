@extends('layouts.admin')

@section('title')
    Филиалы
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Филиалы</h3>

            <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ url('/administration/offices/add') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i> Добавить филиал
                </a>

                <div class="btn-group">
                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/images/flags/{{ $language }}.gif"> {{ trans('index.'.$language) }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/administration/offices?lang=en') }}">
                                <img src="/images/flags/english.gif"> {{ trans('index.english') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/offices?lang=ru') }}">
                                <img src="/images/flags/russian.gif"> {{ trans('index.russian') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/offices?lang=uk') }}">
                                <img src="/images/flags/ukrainian.gif"> {{ trans('index.ukrainian') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box-body">
            <table id="office-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Заголовок</th>
                        <th>Адрес</th>
                        <th>Создан</th>
                        <th>Обновлен</th>
                        <th>Действие</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offices as $key => $office)
                        <tr role="row">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $office->title }}</td>
                            <td>{{ $office->address }}</td>
                            <td>{!! $office->created_at !!}</td>
                            <td>{!! $office->updated_at !!}</td>
                            <td>
                                <a class="btn btn-warning btn-sm"
                                   href="{{ url('/administration/offices/edit/'.$office->id) }}"
                                   alt="Редактировать"
                                   title="Редактировать">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <button class="btn btn-danger btn-sm"
                                    data-target="#delete-modal"
                                    data-toggle="modal"
                                    data-id="{{ $office->id }}"
                                    data-name="{{ $office->title }}">
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

    <!-- Модальное окно удаления филиала/модератора/продукции -->
    @include('partial.delete-modal')

@endsection

@section('scripts')

    <script src="{{ elixir('js/jqueryTable.js') }}"></script>

    <script>
        $('table').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "bSortCellsTop": true,
            "language": {
                "sEmptyTable": "Нет записей...",
            }
        });

        $("table").on('click', '[data-target="#delete-modal"]', function(event){
            $("#modal-title").text("Удаление филиала");
            $("#modal-delete-form").prop('action', '/administration/offices');
            $("#delete-id").val($(this).data('id'));
            $(".delete-name").text($(this).data('name'));
        });
    </script>

@endsection