@extends('layouts.show')
@section('content')
        <h4>{{ $project->name }}</h4>
        <p id="{{$project->id}}" class="lead">{{ $project->description }}</p>
          <div class="col-sm-12">
        <hr>
        <a href="/projects" class="btn-sm btn-info">Back</a>
        <a href="/project/showEdit/{{$project->id}}" class="edit_project btn-sm btn-primary">Edit</a>
        </div>
       <br>
    <div class="col-sm-12">
     <br>
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
     </div>
     <hr>
     <br>
        <div class="card_wrapper col-sm-4">
        <div class="mycard c1" id="1">
            <div class="card_header">
               <h4 class="header_text">TODO</h4>
            </div>
            <a class="create">Create new task</a>
            @foreach($taskss as $task)
            @if ($task->card_id == 1)
           <div id="{{$task->id}}" class="card-task">
            <div class="cc row">
                <div class="col-sm-8">
                    <h4 class="task_id_here" id="{{$task->card_id}}">{{$task->name}}</h4>
                    <strong class="taskDate"><i class="fa fa-calendar"></i>{{ $task->date_ended }}</strong>
                </div>
                <div class="col-sm-4">
                    <div class="hover">
                    <a href="/task/delete/{{{ $task->id }}}" id='{{$task->id}}' class="pull-right btn btn-danger"><span class="glyphicon glyphicon-remove" ></span></a>
                    <button id='{{$task->id}}' class="pull-right open_edit_in btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
                    </div>
                </div>
            </div>
            </div>
            @endif
            @endforeach
        </div>
        </div>
        <div class="card_wrapper col-sm-4">
        <div class="mycard c2" id="2">
            <div class="card_header">
                <h4 class="header_text">WORK IN PROGRESS</h4>
            </div>
            <a class="create">Create new task</a>
            @foreach($taskss as $task)
            @if ($task->card_id == 2)
            <div id="{{$task->id}}" class="card-task">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="task_id_here" id="{{$task->card_id}}">{{$task->name}}</h4>
                    <strong class="taskDate"><i class="fa fa-calendar"></i>{{ $task->date_ended }}</strong>
                </div>
                <div class="col-sm-4">
                    <div class="hover">
                    <a href="/task/delete/{{{ $task->id }}}" id='{{$task->id}}' class="pull-right btn btn-danger"><span class="glyphicon glyphicon-remove" ></span></a>
                    <button id='{{$task->id}}' class="pull-right open_edit_in btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
                    </div>
                </div>
            </div>
            </div>
            @endif
            @endforeach
        </div>
        </div>
        <div class="card_wrapper col-sm-4">
        <div class="mycard c3" id="3">
            <div class="card_header">
                <h4 class="header_text">DONE</h4>
            </div>
            <a class="create">Create new task</a>
            @foreach($taskss as $task)
            @if ($task->card_id == 3)
           <div id="{{$task->id}}" class="card-task">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="task_id_here" id="{{$task->card_id}}">{{$task->name}}</h4>
                    <strong class="taskDate"><i class="fa fa-calendar"></i>{{ $task->date_ended }}</strong>
                </div>
                <div class="col-sm-4">
                    <div class="hover">
                    <a href="/task/delete/{{{ $task->id }}}" id='{{$task->id}}' class="pull-right btn btn-danger"><span class="glyphicon glyphicon-remove" ></span></a>
                    <button id='{{$task->id}}' class="pull-right open_edit_in btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
                    </div>
                </div>
            </div>
            </div>
            @endif
            @endforeach
        </div>
        </div>
        <br>
    </div>
    <div class="lightbox_outer">
      <div class="lightbox_inner">
        <a class="btn btn-danger btn-sm close">X</a>
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
            {!!  Form::token() . Form::close() !!}
      </div>
    </div>
     <div class="lightbox_outer_task">
      <div class="lightbox_inner_task">
          <div class="a">
        <a class="btn btn-danger btn-sm close_task pull-right">X</a>
        <br>
            {!! Form::open([
                'url' => '/task/update/'.$task->id,
                'method' => 'POST'
            ]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                {!! Form::text('name', $task->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('start', 'Start:', ['class' => 'control-label']) !!}
                {!! Form::text('date_created', $task->date_created, array('class' => 'datepicker')) !!}
                {!! Form::label('end', 'End:', ['class' => 'control-label']) !!}
                {!! Form::text('date_ended', $task->date_ended, array('class' => 'datepicker')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                <br>
                {!! Form::textarea('description', $task->description ,['class' => 'form-control', 'size' => '50x5']) !!}
            </div>
            {!! Form::submit('Update task', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            </div>
            <div class="b">
            {!! Form::open([
                'id'  => 'formsub'
            ]) !!}
            <div class="form-group">
            {!! Form::Label('users', 'Assign user:') !!}
            <select id='assi' name="assignUser">
                 <option selected disabled>Select user</option>
                @foreach($users as $user)   
                  <option value="{{$user->id}}">{{$user->name." ".$user->email}}</option>
                @endforeach
            </select>
            {!! Form::submit('Assign user', ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::button('Unassign user', ['class' => 'btn btn-primary btn-sm']) !!}
            </div>
            {!!  Form::token() . Form::close() !!}
            </div>
      </div>
    </div>
@stop