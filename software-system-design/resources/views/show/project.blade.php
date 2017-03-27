@extends('layouts.show')
@section('content')
      <h1>{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
        <hr>

        <a href="/projects" class="btn btn-info">Back</a>
        <a href="#" class="btn btn-primary">Edit</a>

        <div class="pull-right">
            <a href="/project/delete/{{$project->id}}" class="btn btn-danger">Delete</a>
        </div>
@stop