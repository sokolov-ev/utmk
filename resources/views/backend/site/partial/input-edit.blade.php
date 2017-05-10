@include('backend.site.partial.control-tabs')

<div class="tab-content">
    <div id="{{ $name }}_en_tab" class="tab-pane fade" role="tabpanel" aria-labelledby="{{ $name }}_en_tab">
        <div class="form-group{{ $errors->has($name.'.en') ? ' has-error' : '' }}">
            <input name="{{ $name }}[en]"
                   type="text"
                   class="form-control"
                   value="{{ old($name.'.en', $data['en']) }}"
                   placeholder="Английский">

            @if ($errors->has($name.'.en'))
                <span class="help-block">
                    <strong>{{ $errors->first($name.'.en') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="{{ $name }}_ru_tab" class="tab-pane fade in active" role="tabpanel" aria-labelledby="{{ $name }}_ru_tab">
        <div class="form-group{{ $errors->has($name.'.ru') ? ' has-error' : '' }}">
            <input name="{{ $name }}[ru]"
                   type="text"
                   class="form-control"
                   value="{{ old($name.'.ru', $data['ru']) }}" placeholder="Русский">

            @if ($errors->has($name.'.ru'))
                <span class="help-block">
                    <strong>{{ $errors->first($name.'.ru') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="{{ $name }}_uk_tab" class="tab-pane fade" role="tabpanel" aria-labelledby="{{ $name }}_uk_tab">
        <div class="form-group{{ $errors->has($name.'.uk') ? ' has-error' : '' }}">
            <input name="{{ $name }}[uk]"
                   type="text"
                   class="form-control"
                   value="{{ old($name.'.uk', $data['uk']) }}"
                   placeholder="Украинский">

            @if ($errors->has($name.'.uk'))
                <span class="help-block">
                    <strong>{{ $errors->first($name.'.uk') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>