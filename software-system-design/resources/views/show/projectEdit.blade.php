@extends('layouts.show')
@section('content')
      <h1>{{ $project->name }}</h1>
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
            <a href='/project/{{$project->id}}' class="close_edit btn btn-danger btn-sm"><span class="" >Back</span></a>
            {!! Form::close() !!}
            
          </span>
@stop