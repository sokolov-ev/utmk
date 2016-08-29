@extends('layouts.admin')

@section('title')
    Продукция
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Продукция</h3>

            <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ url('/administration/products/add') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i> Добавить продукцию
                </a>

                <div class="btn-group">
                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/images/flags/{{ $language }}.gif"> {{ trans('index.'.$language) }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/administration/products?lang=en') }}">
                                <img src="/images/flags/english.gif"> {{ trans('index.english') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/products?lang=ru') }}">
                                <img src="/images/flags/russian.gif"> {{ trans('index.russian') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/administration/products?lang=uk') }}">
                                <img src="/images/flags/ukrainian.gif"> {{ trans('index.ukrainian') }}
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
                        <th>Город</th>
                        <th>Заголовок</th>
                        <th>Цена</th>
                        <th>Рейтинг</th>
                        <th>Показывать</th>
                        @if ($isAdmin)
                            <th>Добавил</th>
                        @endif
                        <th>Дата добавления</th>
                        <th>Действие</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td> </td>
                        <td>
                            <select  class="form-control" data-index="1" style="width: 100%;">
                                <option value=""></option>
                                @foreach($menu as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select  class="form-control" data-index="2" style="width: 100%;">
                                <option value=""></option>
                                @foreach($city as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>
                            <select  class="form-control" data-index="6" style="width: 100%;">
                                <option value=""></option>
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </td>
                        @if ($isAdmin)
                            <th> </th>
                        @endif
                        <td> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr role="row">
                            <td>{{ $product->id }}</td>
                            <td>{{ json_decode($product->menu->name, true)[App::getLocale()] }}</td>
                            <td>
                                <a href="{{ url('/administration/offices/'.$product->office->id) }}"
                                   title="{{ json_decode($product->office->city, true)[App::getLocale()] }}">
                                        {{ json_decode($product->office->city, true)[App::getLocale()] }}
                                </a>
                            </td>
                            <td>{{ json_decode($product->title, true)[App::getLocale()] }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->rating }}</td>
                            <td>{{ $product->show_my ? 'Да' : 'Нет' }}</td>
                            @if ($isAdmin)
                                <td>
                                    <a href="{{ url('/administration/moderators/'.$product->moderator->id) }}" title="{{ $product->moderator->username }}">
                                        {{ $product->moderator->username }}
                                    </a>
                                </td>
                            @endif
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm"
                                   href="{{ url('/administration/product/edit/'.$product->id) }}"
                                   alt="Редактировать"
                                   title="Редактировать">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <button class="btn btn-danger btn-sm"
                                    data-target="#delete-modal"
                                    data-toggle="modal"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ json_decode($product->title, true)[App::getLocale()] }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination-box">
                {{ $products->render() }}
            </div>
        </div>
    </div>
</section>

    <!-- Модальное окно удаления филиала/модератора/продукции -->
    @include('partial.delete-modal')

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

        $("#products-table_filter").hide();

        $(table.table().container() ).on('keyup change', '#filter-table input, #filter-table select', function () {
            table.column( $(this).data('index') )
                 .search( this.value )
                 .draw();
        });

        $("table").on('click', '[data-target="#delete-modal"]', function(event){
            $("#modal-title").text("Удаление продукции");
            $("#modal-delete-form").prop('action', '/administration/products');
            $("#delete-id").val($(this).data('id'));
            $(".delete-name").text($(this).data('name'));
        });
    </script>

@endsection