@extends('layouts.admin')

@section('title')
    Каталог продукции
@endsection

@section('css')

@endsection

@section('content')

<section class="content container">

    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('products.catalog') }}</h3>
                </div>
                <div class="box-body root" style="min-height: 200px;">
                    <ol class="menu" id="tree" style="font-size: 17px; padding-left: 0;"></ol>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="box box-warning">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h3 class="box-title pull-left clearfix">Редактирование</h3>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn-group pull-right clearfix check-language" data-lang="ru">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="current-language"><img src="/images/flags/ru.png"> Русский</div>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript: void(0)" class="lang" data-lang="en">
                                            <img src="/images/flags/en.png"> Английский
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0)" class="lang" data-lang="ru">
                                            <img src="/images/flags/ru.png"> Русский
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0)" class="lang" data-lang="uk">
                                            <img src="/images/flags/uk.gif"> Украинский
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <form id="form-menu" role="form" method="POST" action="{{ url('/administration/menu') }}">
                        {{ csrf_field() }}
                        <input id="menu-id" class="form-control" type="hidden" name="menu-id">

                        <div class="form-group field-slug required">
                            <label class="control-label" for="slug">Slug (отображение в адресной строке)</label>
                            <input id="slug" class="form-control" type="text" name="slug" required>
                        </div>

                        <div class="form-group field-menu-name_en required">
                            <label class="control-label" for="menu-name_en">Английский</label>
                            <input id="menu-en" class="form-control" type="text" name="menu-en" required>
                        </div>

                        <div class="form-group field-menu-ru required">
                            <label class="control-label" for="menu-ru">Русский</label>
                            <input id="menu-ru" class="form-control" type="text" name="menu-ru" required>
                        </div>

                        <div class="form-group field-menu-uk required">
                            <label class="control-label" for="menu-uk">Украинский</label>
                            <input id="menu-uk" class="form-control" type="text" name="menu-uk" required>
                        </div>

                        <div class="form-group" style="margin-top: 23px;">
                            <button class="btn btn-warning pull-right" type="submit">Добавить/Редактировать</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

</section>

{{-- Информационное модальное окно --}}
<div class="modal fade" id="modalMenuStatus" aria-labelledby="labelModalMenu" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 id="labelModalMenu" class="modal-title">Меню</h4>
            </div>
            <div class="modal-body">
                <div class="item-status-body" style="display: inline-block;"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">Ок</button>
            </div>
        </div>
    </div>
</div>

{{-- Модальное окно подтверждения удаления пункта меню --}}
<div class="modal fade" id="modalDeleteItem" aria-labelledby="labelDeleteItem" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 id="labelDeleteItem" class="modal-title">Удаление пункта меню</h4>
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить пункт меню:
                "<div class="delete-name-item" style="display: inline-block;"></div>" ?
            </div>
            <div class="modal-footer">
                <form id="form-delete-item" role="form" method="POST" action="/administration/menu">
                    {{ csrf_field() }}
                    <input id="menu-item-id" class="form-control" type="hidden" name="id">
                    <input type="hidden" name="_method" value="DELETE">

                    <button class="btn btn-danger pull-left" type="submit">Удалить</button>
                    <button class="btn btn-default" data-dismiss="modal" type="button">Отмена</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="cleanPrice" aria-labelledby="labelCleanPrice" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 id="labelCleanPrice" class="modal-title">Удаление продукции</h4>
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить всю продукцию из пункта меню: <br/>
                "<div class="clean-price" style="display: inline-block; font-weight: bold;"></div>" ?
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger pull-left clean-btn-send" href="">Очистить</a>
                <button class="btn btn-default" data-dismiss="modal" type="button">Отмена</button>
            </div>
        </div>
    </div>
</div>

{{-- Подгружаем шаблон для mustache --}}
@include('partial.menu-template')

@endsection

@section('scripts')

    <script src="{{ elixir('js/mustache.min.js') }}"></script>
    <script src="{{ elixir('js/jquery-ui.min.js') }}"></script>
    <script src="{{ elixir('js/menu.min.js') }}"></script>

@endsection