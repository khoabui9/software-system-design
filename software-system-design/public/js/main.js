$(document).ready(function () {
    $( ".datepicker" ).each(function() {
      $(this).datepicker();
    });
    $('.create').click(function () {
        var pid = $(this).parent(".mycard").attr("id");
        $('.lightbox_outer').css('display', 'flex');
        $('.lightbox_inner').attr('id', pid);
    });
    $('.close').click(function () {
        $('.lightbox_outer').css('display', 'none');
    });

    $('.open_edit').click(function () {
        var id = $(this).attr('id');
        var edit = '.edit' + id.toString();
        //console.log(edit);
        $(edit).css('display', 'block');
    });
    $('.close_edit').click(function () {
        var id = $(this).attr('id');
        var edit = '.edit' + id.toString();
        $(edit).css('display', 'none');
    });

    $('.close_alert').click(function () {
        $('.alert').css('display', 'none');
    });
    $('#form').submit(function(e){
        $('.lightbox_outer').css('display', 'none');
        var title = $('.title').val();
        var date_created = $('.date_created').val();
        var date_ended = $('.date_ended').val();
        var description = $('.description').val();
        var projectID = $(".lead").attr('id');
        var cardID = $(".lightbox_inner").attr('id');
        request = $.ajax({
            type: "POST",
            url: "/task/create/" + projectID + "/" + cardID,
            //datatype : 'json',
            data: {
                'token': $('[name="_token"]').val(),
                'name': title, 
                'description': description, 
                'project_id': projectID,
                'card_id': cardID,
                'date_created': date_created, 
                'date_ended': date_ended,
            },
            success: function(msg) {
                window.location.reload();
            },
            error: function() {
                alert("something went wrong\nAll fields required");
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });       
        e.preventDefault();
    });

    $('.open_edit_in').click(function () {
        $('.lightbox_outer_task').css('display', 'flex');
        var tId = $(this).attr('id');
        $('.b').attr('id',tId);  
    });
    $('.close_task').click(function () {
        $('.lightbox_outer_task').css('display', 'none');
    });
    $('#formsub').submit(function(e){
        var taskID = $('.b').attr('id');
        var user = $('#assi').val();
        $.ajax({
            type: 'POST',
            url: '/task/assign/' + taskID,
            cache: false,
            data: {
                'token': $('[name="_token"]').val(),
                'task_id': taskID,
                'user_id': user,
            },
            success: function(msg) {
                alert('success');
            },
            error: function() {
                alert("something went wrong\nAll fields required");
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });       
        e.preventDefault();
    });
});


