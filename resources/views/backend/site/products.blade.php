@extends('layouts.admin')

@section('title')
    Продукция
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Продукция</h3>
            {{ csrf_field() }}
            <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ url('/administration/product/add') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i> Добавить продукцию
                </a>

                <div class="btn-group">
                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/images/flags/{{ App::getLocale() }}.gif"> {{ trans('index.speech.'.App::getLocale()) }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}">
                                <img src="/images/flags/en.gif"> {{ trans('index.speech.en') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ request()->fullUrlWithQuery(['lang' => 'ru']) }}">
                                <img src="/images/flags/ru.gif"> {{ trans('index.speech.ru') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ request()->fullUrlWithQuery(['lang' => 'uk']) }}">
                                <img src="/images/flags/uk.gif"> {{ trans('index.speech.uk') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box-body">
            <table id="products-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Раздел</th>
                        @if ($isAdmin)
                            <th>Город</th>
                        @endif
                        <th>Заголовок</th>
                        <th>Цена</th>
                        <th>Рейтинг</th>
                        <th>Показывать</th>
                        <th>Добавил</th>
                        <th>Дата добавления</th>
                        <th class="work-actions">Действие</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td><input type="text" data-column="id" class="form-control id" /></td>
                        <td>
                            <select  class="form-control">
                                <option value=""></option>
                                @foreach($menu as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                            @if ($isAdmin)
                                <td>
                                    <select  class="form-control">
                                        <option value=""></option>
                                        @foreach($city as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            @endif
                        <td><input type="text" class="form-control" /></td>
                        <td> </td>
                        <td> </td>
                        <td>
                            <select  class="form-control">
                                <option value=""></option>
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" style="width: 100px;" /></td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>

            @if ($isAdmin)
                <div class="is-admin hidden">[{"data":"id"},{"data":"menu"},{"data":"office"},{"data":"title"},{"data":"price"},{"data":"rating"},{"data":"show_my"},{"data":"creator"},{"data":"created_at"}]</div>
            @else
                <div class="is-admin hidden">[{"data":"id"},{"data":"menu"},{"data":"title"},{"data":"price"},{"data":"rating"},{"data":"show_my"},{"data":"creator"},{"data":"created_at"}]</div>
            @endif

        </div>
    </div>
</section>

@endsection

    {{-- Модальное окно удаления филиала/модератора/продукции --}}
    @include('partial.delete-modal')

    {{-- Подгружаем шаблон для mustache --}}
    @include('partial.product-template')

@section('scripts')

    <script src="{{ elixir('js/jqueryTable.js') }}"></script>
    <script src="{{ elixir('js/mustache.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
            }
        });

        var columns = JSON.parse($(".is-admin").text());

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
                "url": "/administration/products/filtering",
                "type": "POST",
                "dataSrc": "data",
            },
            "columns": columns,
            "columnDefs":[
                {
                    "targets": columns.length,
                    "sortable": false,
                    "render": function(date, type, full) {
                        return '<button class="btn btn-default btn-sm view-product" \
                                        data-id="'+full.id+'"> \
                                            <i class="fa fa-eye" aria-hidden="true"></i> \
                                </button> \
                                <a class="btn btn-warning btn-sm" \
                                   href="/administration/product/edit/'+full.id+'" \
                                   alt="Редактировать" \
                                   title="Редактировать"> \
                                       <i class="fa fa-pencil" aria-hidden="true"></i> \
                                </a> \
                                <button class="btn btn-danger btn-sm" \
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
            $("#modal-delete-form").prop('action', '/administration/products');
            $("#delete-id").val($(this).data('id'));
            $(".delete-name").text($(this).data('name'));
        });
    </script>

@endsection