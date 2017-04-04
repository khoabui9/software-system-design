$(document).ready(function() {
    $('.create').click(function() {
        $('.lightbox_outer').css('display', 'flex');
    });
    $('.close').click(function(){
          $('.lightbox_outer').css('display', 'none');
    });
    $('.open_edit').click(function() {
        var id = $(this).attr('id');
        var edit = '.edit' + id.toString();
        console.log(edit);
        $(edit).css('display', 'block');
    });
    $('.close_edit').click(function(){
         var id = $(this).attr('id');
           var edit = '.edit' + id.toString();
        $(edit).css('display', 'none');
    });

    $('.close_alert').click(function() {
        $('.alert').css('display', 'none');
    });
    $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');
});

function showProject() {
    
}

