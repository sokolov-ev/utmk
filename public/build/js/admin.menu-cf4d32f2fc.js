// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

$(document).ready(function(){

    $(".lang").click(function(event){
        $(".check-language").data("lang", $(this).data("lang"));
        $(".current-language").html($(this).html());

        loadMenu();
    });

    function loadMenu()
    {
        $.get('/administration/menu/' + $(".check-language").data("lang"), function(response){
            if (response.status == 'ok') {
                $('#tree').empty();
                var template = $('#menu-template').html();
                Mustache.parse(template);

                $.each(response.data, function(key, item){
                    if (item.parent > 0) {
                        $('#' + item.parent + ' > ol').append(Mustache.render(template, item));
                        $('#' + item.parent + ' > ol').css('display', 'none');
                        $('#' + item.parent + ' > i').removeClass('fake-width').addClass('fa fa-angle-right pull-left');
                    } else {
                        $('#tree').append(Mustache.render(template, item));
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

                        $.ajax('/administration/menu-sort', {
                            data: {id: id, weight: weight, parent: parent},
                            type: "POST",
                            beforeSend: function(xhr) {
                                xhr.setRequestHeader ("X-CSRF-TOKEN", $("[name='_token']").val());
                            },
                            error: function(xhr) {
                                // console.log(xhr.statusText);
                            },
                            success: function(response) {
                                loadMenu();
                            },
                        });
                    }
                });
            }
        }, "JSON");

    };

    loadMenu();

    $("#form-menu").submit(function(event){
        event.preventDefault();

        $.post('/administration/menu', $('#form-menu').serialize(), function(response){
            if (response.status == 'ok') {
                $("#menu-en").val('');
                $("#menu-ru").val('');
                $("#menu-uk").val('');
                $("#menu-id").val('');

                $("#form-menu > [name='_method']").val('POST');
                loadMenu();

                $(".item-status-body").text(response.message);
                $("#modalMenuStatus").modal("show");

                formSend = false;
            }
        }, 'json');

        return false;
    });

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
        $.get('/administration/menu-item/' + $(this).data('id'), function(response){
            if (response.status == 'ok') {
                var name = JSON.parse(response.data.name);

                $("#menu-en").val(name.en);
                $("#menu-ru").val(name.ru);
                $("#menu-uk").val(name.uk);
                $("#menu-id").val(response.data.id);

                $("#form-menu > [name='_method']").val('PUT');
            }
        }, "json");
    });

    $("#tree").on('click', '.btn-delete', function(event){
        $("#menu-item-id").val($(this).data('id'));
        $(".delete-name-item").html($(this).data('name'));
    });
});
//# sourceMappingURL=admin.menu.js.map
