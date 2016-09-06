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
                        <th>Действие</th>
                    </tr>
                    <tr role="row" id="filter-table">
                        <?php $counter = 0; ?>
                        <td><input type="text" data-column="id" class="form-control id" data-index="{{ $counter++ }}" /></td>
                        <td>
                            <select  class="form-control" data-index="{{ $counter++ }}">
                                <option value=""></option>
                                @foreach($menu as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>

                        @if ($isAdmin)
                            <td>
                                <select  class="form-control" data-index="{{ $counter++ }}">
                                    <option value=""></option>
                                    @foreach($city as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </td>
                        @endif

                        <td><input type="text" class="form-control" data-index="{{ $counter++ }}" /></td>
                        <td><?php $counter++ ?></td>
                        <td><?php $counter++ ?></td>
                        <td>
                            <select  class="form-control" data-index="{{ $counter++ }}">
                                <option value=""></option>
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </td>
                        <th><input type="text" class="form-control" data-index="{{ $counter++ }}" style="width: 100px;" /></th>
                        <td><?php $counter++ ?></td>
                        <td><?php $counter++ ?></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr role="row" class="load-data" data-id="{{ $product->id }}">
                            <td>{{ $product->id }}</td>
                            <td>{{ json_decode($product->menu->name, true)[App::getLocale()] }}</td>
                            @if ($isAdmin)
                                <td>
                                    <a href="{{ url('/administration/offices/'.$product->office->id) }}"
                                       title="{{ json_decode($product->office->city, true)[App::getLocale()] }}">
                                            {{ json_decode($product->office->city, true)[App::getLocale()] }}
                                    </a>
                                </td>
                            @endif
                            <td>
                                <?php $title = json_decode($product->title, true)[App::getLocale()]; ?>
                                @if (strlen($title) > 28)
                                    {{ mb_substr($title, 0, 27, 'UTF-8').'...' }}
                                @else
                                    {{ $title }}
                                @endif
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->rating }}</td>
                            <td>{{ $product->show_my ? 'Да' : 'Нет' }}</td>
                            <td>
                                @if ($isAdmin)
                                    <a href="{{ url('/administration/moderators/'.$product->moderator->id) }}" title="{{ $product->moderator->username }}">
                                        {{ $product->moderator->username }}
                                    </a>
                                @else
                                    {{ $product->moderator->username }}
                                @endif
                            </td>
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

    {{-- Подгружаем шаблон для mustache --}}
    @include('partial.product-template')

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

        $("table").on('click', '[data-target="#delete-modal"]', function(event){
            $("#modal-title").text("Удаление продукции");
            $("#modal-delete-form").prop('action', '/administration/products');
            $("#delete-id").val($(this).data('id'));
            $(".delete-name").text($(this).data('name'));
        });

        $(".load-data").click(function(event){
            var tut = this;
            var id  = $(this).data('id');

            if( $(tut).next(".data-product")[0] == undefined ) {
                $.get('/administration/products/get/' + id, function(response){
                    if (response.status == 'ok') {
                        var template = $('#product-template').html();
                        Mustache.parse(template);
                        var product = Mustache.render(template, response);
                        $(tut).after('<tr class="data-product"><td colspan="10">' + product + '</td></tr>');
                    }
                });
            } else {
                $(tut).next(".data-product")[0].remove();
            }
        });
    </script>

@endsection