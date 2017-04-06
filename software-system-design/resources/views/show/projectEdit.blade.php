@extends('layouts.show')
@section('content')
      <h1>{{ $project->name }}</h1>
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
                    <a><span class="close_alert pull-right btn btn-danger"></span></a>
                </div>
            @endif
        <hr>
          <span class="edit edit{{$project->id}}">
             {!! Form::open([
                'url' => '/project/update/'.$project->id,
                'method' => 'POST'
            ]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                {!! Form::text('name', $project->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                <br>
                {!! Form::textarea('description', $project->description ,['class' => 'form-control', 'size' => '50x5']) !!}
            </div>
            {!! Form::submit('Update project', ['class' => 'btn btn-primary']) !!}
            <a href="/project/{{$project->id}}" id='{{$project->id}}' class="close_edit btn btn-danger btn-sm"><span class="" >cancel</span></a>
            {!! Form::close() !!}
            
          </span>
          <span class="pull-right">
              <button id='{{$project->id}}' class="open_edit btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
              <a href="/project/delete/{{{ $project->id }}}" id='{{$project->id}}' class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" ></span></a>
        </span>
@stop