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
    $('.new').click(function(e){
        $('.lightbox_outer').css('display', 'none');
        var title = $('.title').val();
        var date_created = $('.date_created').val();
        var date_ended = $('.date_ended').val();
        var description = $('.description').val();
        var projectID = $("#project_id").attr('value');
        var cardID = $("#lightbox_inner").attr('id');
        request = $.ajax({
            type: "POST",
            url: "/task/create",
            //datatype : 'json',
            data: {
                'name': title, 
                'description': description, 
                'date_created': date_created, 
                'date_ended': date_ended,
                'project_id': projectID,
                'card_id': cardID
            },
            success: function(msg) {
                alert(msg);
            },
            error: function() {
                alert('haha');
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


