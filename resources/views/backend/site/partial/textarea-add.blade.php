@include('backend.site.partial.control-tabs')

<div class="tab-content">
    <div id="{{ $name }}_en_tab" class="tab-pane fade" role="tabpanel" aria-labelledby="{{ $name }}_en_tab">
        <div class="form-group{{ $errors->has($name.'.en') ? ' has-error' : '' }}">
            <textarea id="{{ $name }}_en" class="form-control" name="{{ $name }}[en]" placeholder="Английский" rows="6">{{ old($name.'.en') }}</textarea>

            @if ($errors->has($name.'.en'))
                <span class="help-block">
                    <strong>{{ $errors->first($name.'.en') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="{{ $name }}_ru_tab" class="tab-pane fade in active" role="tabpanel" aria-labelledby="{{ $name }}_ru_tab">
        <div class="form-group{{ $errors->has($name.'.ru') ? ' has-error' : '' }}">
            <textarea id="{{ $name }}_ru" class="form-control" name="{{ $name }}[ru]" placeholder="Русский" rows="6">{{ old($name.'.ru') }}</textarea>

            @if ($errors->has($name.'.ru'))
                <span class="help-block">
                    <strong>{{ $errors->first($name.'.ru') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="{{ $name }}_uk_tab" class="tab-pane fade" role="tabpanel" aria-labelledby="{{ $name }}_uk_tab">
        <div class="form-group{{ $errors->has($name.'.uk') ? ' has-error' : '' }}">
            <textarea id="{{ $name }}_uk" class="form-control" name="{{ $name }}[uk]" placeholder="Украинский" rows="6">{{ old($name.'.uk') }}</textarea>

            @if ($errors->has($name.'.uk'))
                <span class="help-block">
                    <strong>{{ $errors->first($name.'.uk') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>