<!-- Модальное окно добавления нового менеджера -->
<div class="modal fade edit-client" aria-labelledby="client-modal" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box box-success">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="client-modal" class="modal-title">Редактирование клиента</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/clients') }}" id="form-edit-client">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="edit_id">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Имя клиента (ФИО)</label>
                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                        <label for="company" class="col-md-4 control-label">Компания</label>
                        <div class="col-md-6">
                            <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}">

                            @if ($errors->has('company'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Телефон</label>
                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('note_user') ? ' has-error' : '' }}">
                        <label for="note_user" class="col-md-4 control-label">Комментарий</label>
                        <div class="col-md-6">
                            <textarea id="note_user" class="form-control" name="note_user" rows="4">{{ old('note_user') }}</textarea>

                            @if ($errors->has('note_user'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('note_user') }}</strong>
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
                        <button type="submit" class="btn btn-warning pull-right clearfix" form="form-edit-client">
                            <i class="fa fa-repeat" aria-hidden="true"></i> Сохранить
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Модальное окно добавления нового менеджера -->