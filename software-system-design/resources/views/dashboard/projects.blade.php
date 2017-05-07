@extends('layouts.header')
@section('content')
<h1>Projects</h1>
     <hr>
     <a class="create pull-left">Create new project</a>
     {!! Form::open([
                'url' => 'sort',
                'class' => 'form-fix'
            ]) !!}
     <!--<a href="sort" class="sort">Sort by date</a>-->
     <div class="pull-right">
     {!! Form::label('sort', 'Sort by:', ['class' => 'control-label']) !!}
      {!! Form::select('sortby',
            [
                '' => 'choose',
                'default' => 'default',
                'date' => 'date',
                'name' => 'name',
            ],
      null, ['class' => 'form-group','id' => 'select', 'onchange' => 'this.form.submit()']) 
      !!}
      </div>
    {!! Form::close() !!}
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
    <br>
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
     
      </div>
      <div class="lightbox_outer">
      <div class="lightbox_inner">
        <a class="close">X</a>
        <br>
            {!! Form::open([
                'method' => 'POST',
                'url' => '/project/create'
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