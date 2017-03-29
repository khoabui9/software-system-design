@extends('layouts.header')
@section('content')
<h1>Tasks</h1>
     <hr>
     <a class="create">Create new task</a>
     <hr>
     <div class="task_container col-sm-12">
     <div class="task_inner">
    <div >
    <ul  class="taskList">
      @foreach($tasks as $task)   
   <li class="taskItem">
          <span class="title complete">{{ $task->name }}</span> 
          <br>
           <span class="complete">{{ $task->description }}</span> 
          <strong class="taskDate"><i class="fa fa-calendar"></i>{{ $task->date_ended }}</strong>
          <span class="edit edit{{$task->id}}">
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
                {!! Form::text('name', $task->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('start', 'Start:', ['class' => 'control-label']) !!}
                {!! Form::text('date_created', $task->date_created, array('id' => 'datepicker')) !!}
                {!! Form::label('end', 'End:', ['class' => 'control-label']) !!}
                {!! Form::text('date_ended', $task->date_ended, array('id' => 'datepicker1')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                <br>
                {!! Form::textarea('description', $task->description ,['class' => 'form-control', 'size' => '50x5']) !!}
            </div>
            {!! Form::submit('Update task', ['class' => 'btn btn-primary']) !!}
            <a id='{{$task->id}}' class="close_edit btn btn-danger btn-sm"><span class="" >cancel</span></a>
            {!! Form::close() !!}
            
          </span>
          <span class="pull-right">
              <button id='{{$task->id}}' class="open_edit btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
              <button id='{{$task->id}}' class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" ></span></button>
        </span>
    </li>
      @endforeach
    </ul>
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