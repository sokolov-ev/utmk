@extends('layouts.admin')

@section('title')
    Заказы
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Заказы</h3>
        </div>
        <div class="box-body">
            <table id="products-table" class="table table-striped table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Клиент</th>
                        <th>Общая стоимость</th>
                        <th>Статус</th>
                        <th>Принял заказ</th>
                        <th>Действие</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr role="row">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>total_cost</td>
                            <td>{{ $order->status }}</td>
                            <td>{!! $order->manager_id ? $order->manager_id : "<i class='text-danger'>(нет данных)</i>" !!}</td>
                            <td>
                                {{-- <a class="btn btn-warning btn-sm"
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
                                </button> --}}
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
    <script src="{{ elixir('js/mustache.js') }}"></script>

    <script>
        var table = $('table').DataTable({
            // "pageLength": 3,
            "paging": false,
            "lengthChange": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "bSortCellsTop": true,
            "language": {
                "sEmptyTable": "Нет записей...",
                "infoEmpty": "Ничего не найдено.",
            },
            // "processing": true,
            // "serverSide": true,
            // "ajax": "/administration/products/filtering"
        });

        $("#products-table_filter").hide();

        $(table.table().container() ).on('keyup change', '#filter-table input, #filter-table select', function () {
            table.column( $(this).data('index') )
                 .search( this.value )
                 .draw();
        });
    </script>

@endsection