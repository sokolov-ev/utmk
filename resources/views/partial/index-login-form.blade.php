<div id="login-form" class="modal fade" aria-labelledby="label-login-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="label-login-modal" class="modal-title">{{ trans('auth.login-form-title') }}</h4>
            </div>

            <div id="show-login-form">
                <div class="modal-body">
                    <div class="text-danger not-auth-user hidden"></div>

                    <form class="" role="form" method="POST" action="{{ url('/login') }}" id="login-form-send">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">{{ trans('auth.email-address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">{{ trans('auth.password') }}</label>
                            <input id="password" type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-link show-reset-pass-form" type="button">
                                {{ trans('auth.reset-password') }}
                            </button>
                        </div>

                        <div class="form-group" style="margin-bottom: 0;">
                            <div class="checkbox" style="margin-bottom: 0;">
                                <label>
                                    <input type="checkbox" name="remember"> {{ trans('auth.remember-me') }}
                                </label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer register-link">
                    <a href="{{ url('/register') }}">{{ trans('auth.register') }}</a>
                </div>
                <div class="modal-footer">
                        <button class="btn btn-default pull-left clearfix" data-dismiss="modal" type="button">
                            {{ trans('auth.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-warning" for="login-form-send">
                            <i class="fa fa-btn fa-sign-in"></i> {{ trans('auth.login') }}
                        </button>
                    </form>
                </div>
            </div>

            <div id="show-reset-pass-form" style="display: none;">
                <div class="modal-body">
                    <form role="form" method="POST" action="{{ url('/password/email') }}" id="email-form-reset">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">{{ trans('auth.email-address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-link show-login-form" type="button">
                                {{ trans('auth.rem-password') }}
                            </button>
                        </div>
                </div>
                <div class="modal-footer">
                        <button class="btn btn-default pull-left clearfix" data-dismiss="modal" type="button">
                            {{ trans('auth.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-warning" for="email-form-reset">
                            <i class="fa fa-btn fa-sign-in"></i> {{ trans('auth.reset') }}
                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>