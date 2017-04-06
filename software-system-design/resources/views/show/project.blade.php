@extends('layouts.show')
@section('content')
      <h1>{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
        <hr>
       <h2>
       Users:
       </h2>
    @foreach($users as $user)   
        <div  class="lead">
        {{$user->name }}
        {{$user->email}}
        </div>
    @endforeach
        <a href="/projects" class="btn btn-info">Back</a>
        <a href="/project/showEdit/{{$project->id}}" class="edit_project btn btn-primary">Edit</a>
    </div>
        <div class="pull-right">
            <a href="/project/delete/{{$project->id}}" class="btn btn-danger">Delete</a>
        </div>
@stop