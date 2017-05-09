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
    // $(window).scroll(function () {
    //         if ($(this).scrollTop() > 3000) {
    //             $('#back-to-top').fadeIn();
    //         } else {
    //             $('#back-to-top').fadeOut();
    //         }
    //     });
    //     // scroll body to 0px on click
    //     $('#back-to-top').click(function () {
    //         $('#back-to-top').tooltip('hide');
    //         $('body,html').animate({
    //             scrollTop: 0
    //         }, 800);
    //         return false;
    //     });

    //     $('#back-to-top').tooltip('show');
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
                'name': title, 
                'description': description, 
                'project_id': projectID,
                'card_id': cardID,
                'date_created': date_created, 
                'date_ended': date_ended,
            },
            success: function(msg) {
                // var html = "<div id='{{$task->id}}' class='card-task'><h2 class='task_id_here' id='{{$task->card_id}}'>{{$task->name}}</h2></div>";
                // $(".c" + cardID).append(html);
                 alert('success');
            },
            error: function() {
                alert('haha failed');
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


