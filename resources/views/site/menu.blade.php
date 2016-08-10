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
                {{-- <input type="hidden" name="_method" value="PUT"> --}}

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group field-menu-name_en required">
                            <label class="control-label" for="menu-name_en">Английский</label>
                            <input id="menu-name_en" class="form-control" type="text" name="menu-en" required>
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

@include('partial.menu-template')

@endsection

@section('scripts')

    <script src="{{ elixir('js/mustache.js') }}"></script>
    <script src="{{ elixir('js/jquery-ui.js') }}"></script>

    <script>
        $(document).ready(function(){

            $(".lang").click(function(event){
                $(".check-language").data("lang", $(this).data("lang"));
                $(".current-language").html($(this).html());

                loadMenu();
            });

            $("#form-menu").submit(function(event){
                event.preventDefault();

                $.post('/service/menu', $('#form-menu').serialize(), function(response){
                    if (response.status == 'ok') {
                        $("#menu-en").val('');
                        $("#menu-ru").val('');
                        $("#menu-uk").val('');
                        $("#menu-id").val('');

                        loadMenu()

                        formSend = false;
                    }
                }, 'json');

                return false;
            });

            function loadMenu()
            {
                $.get('/service/menu?language='+$(".check-language").data("lang"), function(response){
                    if (response.status == 'ok') {
                        $('#tree').empty();
                        var template = $('#menu-template').html();
                        Mustache.parse(template);

                        $.each(response.data, function(key, item){
                            if (item.parent_id > 0) {
                                $('#'+item.parent_id+' > ol').append(Mustache.render(template, item));
                                $('#'+item.parent_id+' > ol').css('display', 'none');
                                $('#'+item.parent_id+' > i').removeClass('fake-width').addClass('fa fa-angle-right pull-left');
                            } else {
                                $('#tree').append(Mustache.render(template, item));
                            }
                        });

                        $(".root ol").sortable({
                            cursor: 'pointer', // внешний вид курсора
                            connectWith: 'ol', // наборы из которых можно перетаскивать элементы
                            dropOnEmpty: true, // разрешаем перетаскивать эле-ты в пустые списки
                            delay: 500,        // задержка перед началом перетаскивания
                            placeholder: 'placeholder', // класс вакантного места
                            start: function(event, ui) {
                                ui.item.children('ol').addClass('hidden');
                            },
                            stop: function(event, ui) {
                                // записываем ID родителя в которого был перемещена ветвь
                                var parent = ui.item.parent().closest("li").attr('id');

                                if ((!parent) && (ui.item.closest("ol").attr('id') == 'tree')) {
                                    parent = 0;
                                }

                                ui.item.attr('parent', parent);
                                ui.item.children('ol').removeClass('hidden');

                                // перерасчиет веса ветвей
                                var id     = [],
                                    weight = [],
                                    parent = [];

                                $(".root li").each(function(index) {
                                    $(this).attr('sort', index+1);

                                    id.push($(this).attr('id'));
                                    weight.push($(this).attr('sort'));
                                    parent.push($(this).attr('parent'));
                                });

                                // $.post('/service/menu-sort', {id: id, sort: weight, parent: parent}, function(response){
                                //     console.log(response);
                                // });

                                $.ajax('/service/menu-sort', {
                                    data: {id: id, weight: weight, parent: parent},
                                    type: "POST",
                                    beforeSend: function(xhr) {
                                        xhr.setRequestHeader ("X-CSRF-TOKEN", $("[name='_token']").val());
                                    },
                                    error: function(xhr) {
                                        console.log(xhr.statusText);
                                    },
                                    success: function(response) {
                                        // console.log(response);
                                    },
                                });
                            }
                        });
                    }
                }, "JSON");

            };

            loadMenu();


            $("#tree").on('click', 'span',function(event){
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

            $("#tree").on('click', '.btn-edit', function(event){
                $.get('/service/menu-item?id='+$(this).data('id'), function(response){
                    if (response.status == 'ok') {
                        var name = JSON.parse(response.data.name);

                        $("#menu-en").val(name.en);
                        $("#menu-ru").val(name.ru);
                        $("#menu-uk").val(name.uk);
                        $("#menu-id").val(response.data.id);
                    }
                }, "json");
            });
        });
    </script>

@endsection