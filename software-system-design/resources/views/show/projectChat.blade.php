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
            <p>aaa</p>
            @foreach($messages as $message)
                        <p>{{ $message->content }}</p>
            @endforeach
@stop