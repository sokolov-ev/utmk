<div class="form-group{{ ($errors->has($name.'.en') || $errors->has($name.'.ru') || $errors->has($name.'.uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
    <div class="row">
        <div class="col-md-5">
            <label class="control-label tab-{{ $name }}" for="advertising-{{ $name }}">{{ $title }}</label>
        </div>
        <div class="col-md-7 customize-tab">
            <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                <li role="presentation">
                    <a id="{{ $name }}_en-tab"
                       class="tab-nice{{ $errors->has($name.'.en') ? ' has-error-label' : '' }}"
                       href="#{{ $name }}_en_tab"
                       role="tab"
                       data-toggle="tab"
                       aria-controls="{{ $name }}_en_tab">
                        Английский
                    </a>
                </li>
                <li class="active" role="presentation">
                    <a id="{{ $name }}_ru-tab"
                       class="tab-nice{{ $errors->has($name.'.ru') ? ' has-error-label' : '' }}"
                       href="#{{ $name }}_ru_tab"
                       role="tab"
                       data-toggle="tab"
                       aria-controls="{{ $name }}_ru_tab"
                       aria-expanded="true">
                        Русский
                    </a>
                </li>
                <li role="presentation">
                    <a id="{{ $name }}_uk-tab"
                       class="tab-nice{{ $errors->has($name.'.uk') ? ' has-error-label' : '' }}"
                       href="#{{ $name }}_uk_tab"
                       role="tab"
                       data-toggle="tab"
                       aria-controls="{{ $name }}_uk_tab">
                        Украинский
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>