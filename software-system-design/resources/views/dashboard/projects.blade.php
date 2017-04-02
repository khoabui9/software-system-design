@extends('layouts.header')
@section('content')
<h1>Projects</h1>
     <hr>
     <a class="create">Create new project</a>
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
      <div class="pagination col-sm-12">
      {{ $projects->links() }}
      </div>
      <div class="lightbox_outer">
      <div class="lightbox_inner">
        <a class="close">X</a>
        <br>
            {!! Form::open([
                'url' => '/create'
            ]) !!}
               
            <div class="form-group">
                {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                <br>
                {!! Form::textarea('description', null ,['class' => 'form-control', 'size' => '50x5']) !!}
            </div>

            {!! Form::submit('Create New Project', ['class' => 'btn btn-primary']) !!}
          
            {!! Form::close() !!}
        
      </div>
    </div>
@stop