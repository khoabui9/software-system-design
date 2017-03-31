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
});


