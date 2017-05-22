@extends('layouts.show')
@section('content')
        <div id="calendar"></div>
        <script type="text/javascript">
$('#calendar').fullCalendar({
    events: [
@foreach ($tasks as $task)
    { 
        title: '{{$task->name}}',
        start:'{{$task->date_created}}',
        end: '{{$task->date_ended}}'
    }, 
@endforeach
],

editable: true,
    eventDrop: function(event, delta, revertFunc) {

        alert(event.title + " was dropped on " + event.start.format() + "and end at" + event.end.format());

        if (!confirm("Are you sure about this change?")) {
            revertFunc();
        }
        else {
            $.ajax({
                    method: 'POST',
                    url: '/task/updatedate/'+ event.title + '/' + event.start.format()+ '/' + event.end.format(),
                    data: { 
                        'token': $('[name="_token"]').val(), 
                        'name': event.title, 
                        'date_created': event.start.format(),
                        'date_ended': event.end.format(),
                    },
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

    }
});

</script>
@stop