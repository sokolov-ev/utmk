@extends('layouts.admin')

@section('title')
    Справочник металлопроката
@endsection

@section('content')

<section class="container-fluid" style="padding: 0 30px">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Справочник металлопроката</h3>

            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ url('/administration/spravka/index/edit') }}">
                    Редактировать главную
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content container">

    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Разделы</h3>
                </div>
                <div class="box-body root" style="min-height: 200px;">
                    <ol class="menu" id="reference-section" style="font-size: 17px; padding-left: 0;"></ol>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">Редактирование</h3>
                    
                    <button class="btn btn-primary btn-sm pull-right">Очистить</button>
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url('/administration/spravka/section') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ old('id', $reference['id']) }}">

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <input id="slug"
                                   name="slug"
                                   type="text"
                                   class="form-control"
                                   value="{{ old('slug', $reference['slug']) }}"
                                   placeholder="Слуг">

                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ ($errors->has('title_en') || $errors->has('title_ru') || $errors->has('title_uk')) ? ' has-error' : '' }}" 
                             style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-title" for="advertising-title">Заголовок</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="title_en-tab"
                                               class="tab-nice{{ $errors->has('title_en') ? ' has-error-label' : '' }}"
                                               href="#title_en"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="title_ru-tab"
                                               class="tab-nice{{ $errors->has('title_ru') ? ' has-error-label' : '' }}"
                                               href="#title_ru"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="title_uk-tab"
                                               class="tab-nice{{ $errors->has('title_uk') ? ' has-error-label' : '' }}"
                                               href="#title_uk"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabTitle" class="tab-content">
                            <div id="title_en" class="tab-pane fade" role="tabpanel" aria-labelledby="title_en-tab">
                                <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
                                    <input id="title_en"
                                           name="title_en"
                                           type="text"
                                           class="form-control"
                                           value="{{ old('title_en', $reference['title_en']) }}"
                                           placeholder="Английский">

                                    @if ($errors->has('title_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="title_ru-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <input id="title_ru"
                                           name="title_ru"
                                           type="text"
                                           class="form-control"
                                           value="{{ old('title_ru', $reference['title_ru']) }}" placeholder="Русский">

                                    @if ($errors->has('title_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="title_uk-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <input id="title_uk"
                                           name="title_uk"
                                           type="text"
                                           class="form-control"
                                           value="{{ old('title_uk', $reference['title_uk']) }}"
                                           placeholder="Украинский">

                                    @if ($errors->has('title_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('body_small_en') || $errors->has('body_small_ru') || $errors->has('body_small_uk')) ? ' has-error' : '' }}" 
                             style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-body_small" for="advertising-body_small">Краткое описание</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="body_small_en-tab"
                                               class="tab-nice{{ $errors->has('body_small_en') ? ' has-error-label' : '' }}"
                                               href="#body_small_en"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="body_small_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="body_small_ru-tab"
                                               class="tab-nice{{ $errors->has('body_small_ru') ? ' has-error-label' : '' }}"
                                               href="#body_small_ru"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="body_small_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="body_small_uk-tab"
                                               class="tab-nice{{ $errors->has('body_small_uk') ? ' has-error-label' : '' }}"
                                               href="#body_small_uk"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="body_small_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabbody_small" class="tab-content">
                            <div id="body_small_en" class="tab-pane fade" role="tabpanel" aria-labelledby="body_small_en-tab">
                                <div class="form-group{{ $errors->has('body_small_en') ? ' has-error' : '' }}">
                                    <textarea id="text_body_small_en" 
                                              class="form-control" 
                                              name="body_small_en" 
                                              rows="6">
                                        {{ old('body_small_en', $reference['body_small_en']) }}
                                    </textarea>

                                    @if ($errors->has('body_small_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body_small_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="body_small_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="body_small_ru-tab">
                                <div class="form-group{{ $errors->has('body_small_ru') ? ' has-error' : '' }}">
                                    <textarea id="text_body_small_ru" 
                                              class="form-control" 
                                              name="body_small_ru" 
                                              rows="6">
                                        {{ old('body_small_ru', $reference['body_small_ru']) }}
                                    </textarea>

                                    @if ($errors->has('body_small_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body_small_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="body_small_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="body_small_uk-tab">
                                <div class="form-group{{ $errors->has('body_small_ru') ? ' has-error' : '' }}">
                                    <textarea id="text_body_small_uk" 
                                              class="form-control" 
                                              name="body_small_uk" 
                                              rows="6">
                                        {{ old('body_small_uk', $reference['body_small_uk']) }}
                                    </textarea>

                                    @if ($errors->has('body_small_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body_small_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('body_en') || $errors->has('body_ru') || $errors->has('body_uk')) ? ' has-error' : '' }}" 
                             style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-body" for="advertising-body">Описание</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="body_en-tab"
                                               class="tab-nice{{ $errors->has('body_en') ? ' has-error-label' : '' }}"
                                               href="#body_en"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="body_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="body_ru-tab"
                                               class="tab-nice{{ $errors->has('body_ru') ? ' has-error-label' : '' }}"
                                               href="#body_ru"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="body_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="body_uk-tab"
                                               class="tab-nice{{ $errors->has('body_uk') ? ' has-error-label' : '' }}"
                                               href="#body_uk"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="body_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabbody" class="tab-content">
                            <div id="body_en" class="tab-pane fade" role="tabpanel" aria-labelledby="body_en-tab">
                                <div class="form-group{{ $errors->has('body_en') ? ' has-error' : '' }}">
                                    <textarea id="text_body_en" 
                                              class="form-control" 
                                              name="body_en" 
                                              rows="6">
                                        {{ old('body_en', $reference['body_en']) }}
                                    </textarea>

                                    @if ($errors->has('body_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="body_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="body_ru-tab">
                                <div class="form-group{{ $errors->has('body_ru') ? ' has-error' : '' }}">
                                    <textarea id="text_body_ru" 
                                              class="form-control" 
                                              name="body_ru" 
                                              rows="6">
                                        {{ old('body_ru', $reference['body_ru']) }}
                                    </textarea>

                                    @if ($errors->has('body_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="body_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="body_uk-tab">
                                <div class="form-group{{ $errors->has('body_ru') ? ' has-error' : '' }}">
                                    <textarea id="text_body_uk" 
                                              class="form-control" 
                                              name="body_uk" 
                                              rows="6">
                                        {{ old('body_uk', $reference['body_uk']) }}
                                    </textarea>

                                    @if ($errors->has('body_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <button class="btn btn-success pull-right" type="submit" onclick="saveBody();">
                            Создать/Обновить
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>

{{-- Подгружаем шаблон для mustache --}}
@include('partial.reference-section')

</section>

@endsection

@section('scripts')

    <script src="{{ elixir('js/mustache.min.js') }}"></script>
    <script src="{{ elixir('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinyMCE.init({
            selector: '#text_body_en, #text_body_ru, #text_body_uk',
            language: 'ru',
            plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
        });

        tinyMCE.init({
            selector: '#text_body_small_en, #text_body_small_ru, #text_body_small_uk',
            language: 'ru',
            plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
        });

        function saveBody() {
            tinyMCE.get('text_body_small_en, text_body_small_ru, text_body_small_uk').save();
            tinyMCE.get('text_body_en, text_body_ru, text_body_uk').save();
        }

        function loadData() {
            $.get('/administration/spravka/sections', function(res) {
                console.info(res);
                $('#reference-section').empty();
                let template = $('#reference-section-template').html();
                Mustache.parse(template);

                $.each(res, function(key, item){
                    if (item.parent > 0) {
                        $('#' + item.parent + ' > ol').append(Mustache.render(template, item));
                        $('#' + item.parent + ' > ol').css('display', 'none');
                        $('#' + item.parent + ' > i').removeClass('fake-width').addClass('fa fa-angle-right pull-left');
                    } else {
                        $('#reference-section').append(Mustache.render(template, item));
                    }
                });

                $(".root ol").sortable({
                    cursor: 'pointer',          // внешний вид курсора
                    connectWith: 'ol',          // наборы из которых можно перетаскивать элементы
                    dropOnEmpty: true,          // разрешаем перетаскивать эле-ты в пустые списки
                    delay: 500,                 // задержка перед началом перетаскивания
                    placeholder: 'placeholder', // класс вакантного места
                    start: function(event, ui) {
                        ui.item.children('ol').addClass('hidden');
                    },
                    stop: function(event, ui) {
                        // записываем ID родителя в которого был перемещена ветвь
                        var parent = ui.item.parent().closest("li").attr('id');

                        if ((!parent) && (ui.item.closest("ol").attr('id') == 'reference-section')) {
                            parent = 0;
                        }

                        ui.item.attr('parent', parent);
                        ui.item.children('ol').removeClass('hidden');

                        // перерасчиет веса ветвей
                        var id     = [],
                            weight = [],
                            parent = [];

                        $(".root li").each(function(index) {
                            $(this).attr('sort', index + 1);

                            id.push($(this).attr('id'));
                            weight.push($(this).attr('sort'));
                            parent.push($(this).attr('parent'));
                        });

                        $.ajax('/administration/spravka/section/sort', {
                            data: {id: id, weight: weight, parent: parent},
                            type: "POST",
                            beforeSend: function(xhr) {
                                xhr.setRequestHeader ("X-CSRF-TOKEN", $("[name='_token']").val());
                            },
                            error: function(xhr) {
                                console.log(xhr.statusText);
                            },
                            success: function(response) {
                                loadData();
                            },
                        });
                    }
                });

            }, "JSON");
        }

        loadData();

        $("#reference-section").on('click', 'span',function(event){
            if ($(this).siblings('ol').children().is('li')) {
                if ($(this).siblings('ol').css('display') == 'none') {
                    $(this).siblings('ol').slideDown();
                    $(this).siblings('i').addClass("fa-angle-down").removeClass("fa-angle-right");
                } else {
                    $(this).siblings('ol').slideUp();
                    $(this).siblings('i').removeClass("fa-angle-down").addClass("fa-angle-right");
                }
            }
        });
    </script>

@endsection