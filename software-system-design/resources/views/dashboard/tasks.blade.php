@extends('layouts.header')
@section('content')
<h1>Tasks</h1>
     <hr>
     <a class="create">Create new task</a>
     <hr>
     <div class="task_container col-sm-12">
     <div class="task_inner col-sm-9">
    <div >
   <div class="list-group">
      @foreach($tasks as $task)   
    <a href="#" class="task list-group-item">
      <h4 class="list-group-item-heading">{{$task->name}}</h4>
      <p class="list-group-item-text">{{$task->description}}</p>
    </a>
      @endforeach
    </div>
</div>
</div>
<div class="lightbox_outer">
      <div class="lightbox_inner col-sm-5">
        <a class="close">X</a>
        <br>
            {!! Form::open([
                'url' => '/createtask'
            ]) !!}
               @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
    
                </div>
            @endif
              @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('start', 'Start:', ['class' => 'control-label']) !!}
                {!! Form::text('date_created', null, array('id' => 'datepicker')) !!}
                {!! Form::label('end', 'End:', ['class' => 'control-label']) !!}
                {!! Form::text('date_ended', null, array('id' => 'datepicker1')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                <br>
                {!! Form::textarea('description', null ,['class' => 'form-control', 'size' => '50x5']) !!}
            </div>

            {!! Form::submit('Create New Task', ['class' => 'btn btn-primary']) !!}
          
            {!! Form::close() !!}
        
      </div>
    </div>
@stop