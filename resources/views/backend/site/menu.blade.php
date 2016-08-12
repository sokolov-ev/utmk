@extends('layouts.admin')

@section('title')
    Меню сайта
@endsection

@section('css')

@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">

        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Меню сайта</h3>

            <div class="btn-group pull-right clearfix check-language" data-lang="ru">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="current-language"><img src="/images/flags/russian.gif"> Русский</div>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="javascript: void(0)" class="lang" data-lang="en">
                            <img src="/images/flags/english.gif"> Английский
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" class="lang" data-lang="ru">
                            <img src="/images/flags/russian.gif"> Русский
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" class="lang" data-lang="uk">
                            <img src="/images/flags/ukrainian.gif"> Украинский
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="box-body">
            <form id="form-menu" role="form" method="POST">
                {{ csrf_field() }}
                <input id="menu-id" class="form-control" type="hidden" name="menu-id">
                <input type="hidden" name="_method" value="POST">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group field-menu-name_en required">
                            <label class="control-label" for="menu-name_en">Английский</label>
                            <input id="menu-en" class="form-control" type="text" name="menu-en" required>
                            <p class="help-block help-block-error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group field-menu-ru required">
                            <label class="control-label" for="menu-ru">Русский</label>
                            <input id="menu-ru" class="form-control" type="text" name="menu-ru" required>
                            <p class="help-block help-block-error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group field-menu-uk required">
                            <label class="control-label" for="menu-uk">Украинский</label>
                            <input id="menu-uk" class="form-control" type="text" name="menu-uk" required>
                            <p class="help-block help-block-error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 23px;">
                            <button class="btn btn-warning pull-right" type="submit">Добавить/Редактировать</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('products.menu') }}</h3>
                </div>
                <div class="box-body root" style="min-height: 200px;">
                    <ol class="menu" id="tree" style="font-size: 17px; padding-left: 0;"></ol>
                </div>
                <div class="box-footer"></div>
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
                "<div class="delete-name-item" style="display: inline-block;"></div>"
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

{{-- Подгружаем шаблон для mustache --}}
@include('partial.menu-template')

@endsection

@section('scripts')

    <script src="{{ elixir('js/mustache.js') }}"></script>
    <script src="{{ elixir('js/jquery-ui.js') }}"></script>
    <script src="{{ elixir('js/admin.menu.js') }}"></script>

@endsection