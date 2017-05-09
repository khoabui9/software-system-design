@extends('layouts.show')
@section('content')
        <h4>{{ $project->name }}</h4>
        <p id="{{$project->id}}" class="lead">{{ $project->description }}</p>
        <hr>
    
      @if($errors->any())
                <div class="alert alert-danger">
                 <a><span class="close_alert pull-right btn btn-danger">X</span></a>
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
     @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                <a><span class="close_alert pull-right btn btn-danger">X</span></a>
                </div>
     @endif
     <hr>
        <div class="card_wrapper col-sm-4">
        <div class="mycard c1" id="1">
            <div class="card_header">
               <h5 class="header_text">TODO</h5>
            </div>
            <a class="create">Create new task</a>
            @foreach($taskss as $task)
            @if ($task->card_id == 1)
            <div id="{{$task->id}}" class="card-task">
                <h2 class="task_id_here" id="{{$task->card_id}}">{{$task->name}}</h2>
            </div>
            @endif
            @endforeach
        </div>
        </div>
        <div class="card_wrapper col-sm-4">
        <div class="mycard c2" id="2">
            <div class="card_header">
                <h5 class="header_text">WORK IN PROGRESS</h5>
            </div>
            <a class="create">Create new task</a>
            @foreach($taskss as $task)
            @if ($task->card_id == 2)
            <div id="{{$task->id}}" class="card-task">
                <h2 class="task_id_here" id="{{$task->card_id}}">{{$task->name}}</h2>
            </div>
            @endif
            @endforeach
        </div>
        </div>
        <div class="card_wrapper col-sm-4">
        <div class="mycard c3" id="3">
            <div class="card_header">
                <h5 class="header_text">DONE</h5>
            </div>
            <a class="create">Create new task</a>
            @foreach($taskss as $task)
            @if ($task->card_id == 3)
            <div id="{{$task->id}}" class="card-task">
                <h2 class="task_id_here" id="{{$task->card_id}}">{{$task->name}}</h2>
            </div>
            @endif
            @endforeach
        </div>
        </div>
        <br>
        <div class="col-sm-12">
              <hr>
        <a href="/projects" class="btn btn-info">Back</a>
        <a href="/project/showEdit/{{$project->id}}" class="edit_project btn btn-primary">Edit</a>
        <a href="/project/chat/{{$project->id}}" class="btn btn-primary">Chat</a>
        </div>
    </div>
    <div class="lightbox_outer">
      <div class="lightbox_inner">
        <a class="close">X</a>
        <br>
            {!! Form::open([
                'id'  => 'form'
            ]) !!}
            
            <div class="form-group">
                {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'title form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('start', 'Start:', ['class' => 'control-label']) !!}
                {!! Form::text('date_created', null, array('class' => 'date_created datepicker')) !!}
                {!! Form::label('end', 'End:', ['class' => 'control-label']) !!}
                {!! Form::text('date_ended', null, array('class' => 'date_ended datepicker')) !!}
                <!--{!! Form::text('project_id', null, array('class' => 'hidden pid')) !!}
                {!! Form::text('card_id', null, array('class' => 'hidden cid')) !!}-->
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                <br>
                {!! Form::textarea('description', null ,['class' => 'description form-control', 'size' => '50x5']) !!}
            </div>
            {!! Form::submit('Create New Task', ['class' => 'new btn btn-primary']) !!}
            {!!  Form::token()  . Form::close() !!}
      </div>
    </div>
    <!--<div class="pull-right">
        <a href="/project/delete/{{$project->id}}" class="btn btn-danger">Delete</a>
    </div>-->
@stop