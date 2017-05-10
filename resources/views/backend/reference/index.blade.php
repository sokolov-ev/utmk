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
                            <input name="slug"
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

                        @include('backend.site.partial.input-edit', ['name' => 'title', 'title' => 'Заголовок', 'data' => $reference['title']])

                        @include('backend.site.partial.textarea-edit', ['name' => 'body_small', 'title' => 'Краткое описание', 'data' => $reference['body_small']])

                        @include('backend.site.partial.textarea-edit', ['name' => 'body', 'title' => 'Контент', 'data' => $reference['body']])

                        <button class="btn btn-success pull-right" type="submit" onclick="saveBody();">
                            Сохранить
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
            selector: '#body_en, #body_ru, #body_uk, #body_small_en, #body_small_ru, #body_small_uk',
            language: 'ru',
            plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
        });

        function saveBody() {
            tinyMCE.get('body_small_en').save();
            tinyMCE.get('body_small_ru').save();
            tinyMCE.get('body_small_uk').save();

            tinyMCE.get('body_en').save();
            tinyMCE.get('body_ru').save();
            tinyMCE.get('body_uk').save();
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