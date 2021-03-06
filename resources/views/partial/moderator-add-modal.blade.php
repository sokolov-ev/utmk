<!-- Модальное окно добавления нового менеджера -->
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
                <form class="form-horizontal" role="form" method="POST" action="{{ url('administration/moderator') }}" id="form-add-moderator">
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

                    <div class="form-group{{ $errors->has('office_id') ? ' has-error' : '' }}">
                        <label for="office_id" class="col-md-4 control-label">Филиал</label>

                        <div class="col-md-6">
                            <select name="office_id" id="office_id" class="form-control">
                                @foreach($offices as $office)
                                    <option value="{{ $office['id'] }}">{{ json_decode($office['city'], true)['ru'] }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('office_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('office_id') }}</strong>
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

                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label for="role" class="col-md-4 control-label">Роль (права доступа)</label>

                        <div class="col-md-6">
                            <select name="role" id="role" class="form-control">
                                @foreach($roleForm as $key => $role)
                                    <option value="{{$key}}">{{$role}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label for="status" class="col-md-4 control-label">Статус</label>

                        <div class="col-md-6">
                            <select name="status" id="status" class="form-control">
                                @foreach($status as $key => $status)
                                    <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
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
                        <button type="submit" class="btn btn-primary pull-right clearfix" form="form-add-moderator">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Добавить
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Модальное окно добавления нового менеджера -->