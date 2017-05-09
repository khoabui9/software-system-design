$(document).ready(function() {
var draggableOptions = {
        cancel: "a.ui-icon",
        revert: true,
        cursor: "move",
        revertDuration: 0
    }
$('.card-task').draggable(draggableOptions);

$('.mycard').droppable();

var codes = {
    "1" : "#1",
    "2" : "#2",
    "3" : "#3",
    
}
$.each(codes, function(index, value) {
  $('.mycard').droppable({
    drop: function(event, ui) {
      var element = ui.draggable;
      $(this).append(element);
      var id = $(this).attr('id');
      $(element).children().attr('id',id);
      var task_id = $(element).attr('id');
      var card_id = $(this).attr('id');
       $.ajax({
        method: 'POST',
        url: '/task/' + task_id + '/updateCard/' + card_id,
        cache: false,
        // beforeSend: function (xhr) {
        //     var token = $('meta[name="csrf_token"]').attr('content');

        //     if (token) {
        //           return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        //     }
        // },
        data: {'token': $('[name="_token"]').val(),"task_id": task_id,"card_id": card_id},
        success: function() {
            alert("success");
        },
        error: function() {
            alert("error");
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
//     var card_task = document.getElementById('change');
//     console.log('aaa');
//     card_task.addEventListener('change',function() {
//     var task_id = $(this).attr('id');
//     var card_id = $(this).children().attr('id');
//      $.ajax({
//         method: 'POST',
//         url: '/task/' + task_id + '/updateCard/' + card_id,
//         data: {card_id: card_id, task_id: task_id},
//         success: function() {
//             alert("success");
//         },
//         error: function() {
//             alert("error");
//         }
//     });
// },false);


