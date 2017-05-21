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
]
});

</script>
@stop