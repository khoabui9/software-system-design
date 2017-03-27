@extends('layouts.header')
@section('content')
      @foreach($projects as $project)

  <div class="col-sm-4">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">{{{$project->name}}}</h3>
        <p class="card-text">{{{$project->description}}}</p>
        <a href="/project/{{{$project->id}}}" class="btn btn-primary">Show</a>
        <a href="/project/delete/{{{ $project->id }}}" class="btn btn-primary">Delete</a>
      </div>
    </div>
    </div>
  
      @endforeach
@stop