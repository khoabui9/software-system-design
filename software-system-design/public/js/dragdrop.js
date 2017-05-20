$(document).ready(function () {
    var draggableOptions = {
        cancel: "a.ui-icon",
        revert: true,
        cursor: "move",
        revertDuration: 0
    }
    $('.card-task').draggable(draggableOptions, {
        drag: function () {
            $(this).css("z-index", "1");
        }
    });

    $('.mycard').droppable();

    var codes = {
        "1": "#1",
        "2": "#2",
        "3": "#3",

    }
    $.each(codes, function (index, value) {
        $('.mycard').droppable({
            drop: function (event, ui) {
                var element = ui.draggable;
                $(this).append(element);
                var id = $(this).attr('id');
                $(element).children().attr('id', id);
                $(element).css("z-index", "0");
                var task_id = $(element).attr('id');
                var card_id = $(this).attr('id');
                $.ajax({
                    method: 'POST',
                    url: '/task/' + task_id + '/updateCard/' + card_id,
                    cache: false,
                    data: { 'token': $('[name="_token"]').val(), "task_id": task_id, "card_id": card_id },
                    success: function () {
                    },
                    error: function () {
                    }
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').val()
                    }
                });
            }
        });
    });
});
