@extends('layouts.show')
@section('content')
      <h1>{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
        <hr>

        <a href="/projects" class="btn btn-info">Back</a>
        <a href="#" class="edit btn btn-primary">Edit</a>
<div class="lightbox_outer">
      <div class="lightbox_inner">
        <a class="close">X</a>
        <br>
            {!! Form::open([
                'url' => '/project/update/'.$project->id
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

            {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
          
            {!! Form::close() !!}
        
      </div>
    </div>
        <div class="pull-right">
            <a href="/project/delete/{{$project->id}}" class="btn btn-danger">Delete</a>
        </div>
        
@stop