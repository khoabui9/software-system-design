$(document).ready(function () {
    $(".datepicker").each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
        });
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
    $('#formIn1').submit(function (e) {
        console.log('aaaaa');
        var date_created = $('.date_created1').val();
        var date_ended = $('.date_ended1').val();
        if (date_ended < date_created) {
            alert('wrong date');
            return false;
        }
    });
    $('#formIn2').submit(function (e) {
        console.log('aaaaa');
        var date_created = $('.date_created2').val();
        var date_ended = $('.date_ended2').val();
        if (date_ended < date_created) {
            alert('wrong date');
            return false;
        }
    });
    $('#form').submit(function (e) {
        $('.lightbox_outer').css('display', 'none');
        var title = $('.title').val();
        var date_created = $('.date_created').val();
        var date_ended = $('.date_ended').val();
        if (date_ended < date_created)
            alert('wrong date');
        else {
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
                success: function (msg) {
                    window.location.reload();
                },
                error: function () {
                    alert("something went wrong\nAll fields required");
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });
        }
        e.preventDefault();

    });

    $('.open_edit_in').click(function () {
        $('.lightbox_outer_task').css('display', 'flex');
        var tId = $(this).attr('id');
        $('.b').attr('id', tId);
    });
    $('.close_task').click(function () {
        $('.lightbox_outer_task').css('display', 'none');
    });
    $('#formsub').submit(function (e) {
        var taskID = $('.b').attr('id');
        var user = $('#assi').val();
        $.ajax({
            type: 'POST',
            url: '/task/assign/' + taskID,
            data: {
                'token': $('[name="_token"]').val(),
                'task_id': taskID,
                'user_id': user,
            },
            success: function (msg) {
                alert('success');
            },
            error: function () {
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

// Wait for the HTML document to be loaded completely
$(function() {

  // Retrieve DOM elements and store them
  var contactForm     = $('#contact-form');
  var spinArea        = $('#spin-area'); 
  var formContainer   = $('#form-container');
  var successContainer= $('#success-container');
    
  contactForm.submit(function(e){
    e.preventDefault();
    
    spinArea.spin('large'); // Attach the spinner
    
    // Send a POST AJAX request to the URL of form's action
    $.ajax({
      type: "POST",
      url: contactForm.attr('action'),
      data: contactForm.serialize(),
      dataType: "json"
    })
    .done(function(response) {
      humane.log('Message sent',{ addnCls: 'humane-jackedup-success'});
      successContainer.fadeIn();
      formContainer.slideUp();
    })
    .fail(function () {
      // Sending request to the server has failed
      // We'll show a notification that something went wrong
    })
    .always(function() {
      spinArea.spin(false); // Remove the spinner
    });
  });

});

