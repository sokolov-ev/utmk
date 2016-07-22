@extends('layouts.admin')

@section('title')
    Менеджеры сайта
@endsection

@section('css')
    <link href="/css/dataTables.bootstrap.css" rel="stylesheet">
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
            <table id="moderators-table" class="table table-bordered table-hover table-condensed dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                        <th>Имя пользовател</th>
                        <th>Роль</th>
                        <th>E-mail</th>
                        <th>Регион</th>
                        <th>Активность</th>
                        <th>Создан</th>
                        <th>Действие</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

<div class="modal fade add-moderator" aria-labelledby="moderator-modal" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box box-success">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="moderator-modal" class="modal-title">Новый менеджер</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('administration/add-moderator') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Имя менеджера (ФИО)</label>
                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Пароль</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-default pull-left clearfix" data-dismiss="modal" type="button">
                            Отмена
                        </button>
                        <button type="submit" class="btn btn-primary pull-right clearfix">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Добавить
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade delete-moderator" aria-labelledby="moderator-modal" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box box-danger">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="moderator-modal" class="modal-title">Удаление менеджера</h4>
            </div>
            <div class="modal-body">

            </div>

            <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-default pull-left clearfix" data-dismiss="modal" type="button">
                            Отмена
                        </button>
                        <button type="submit" class="btn btn-primary pull-right clearfix">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Добавить
                        </button>
                    </div>
            </div>

        </div>
    </div>
</div>

@endsection


@section('scripts')

<script src="/js/plugins/jquery.dataTables.min.js"></script>
<script src="/js/plugins/dataTables.bootstrap.min.js"></script>
<script src="/js/plugins/jquery.slimscroll.min.js"></script>
<script src="/js/plugins/fastclick.min.js"></script>

<script>
    $('table').DataTable({
        "ajax": "/administration/get-moderators",
        "columns": [
            { "data": "username" },
            { "data": "role" },
            { "data": "email" },
            { "data": "region" },
            { "data": "activity" },
            { "data": "date_created" },
            { "data": "buttons" },
        ],

        "paging": false,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false
    });
</script>

@endsection