@extends('layouts.header')
@section('content')
<h1>Users</h1>
     <hr>
     <a class="create">Create new User</a>
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
     <hr>
     <div class="user_container col-sm-12">
     <div class="user_inner">
    <div >
    <ul  class="userList">
      @foreach($users as $user)   
   <li class="userItem">
          <span class="title complete">{{ $user->name }}</span>
          <span>{{ $user->email }}</span> 
          <br>
          <span class="edit edit{{$user->id}}">
             {!! Form::open([
                'url' => '/user/update/'.$user->id
            ]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('Update user', ['class' => 'btn btn-primary']) !!}
            <a id='{{$user->id}}' class="close_edit btn btn-danger btn-sm"><span class="" >cancel</span></a>
            {!! Form::close() !!}
          </span>
          <span class="pull-right">
              <button id='{{$user->id}}' class="open_edit btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
              <a href="/user/delete/{{{ $user->id }}}" id='{{$user->id}}' class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" ></span></a>
        </span>
    </li>
      @endforeach
    </ul>
</div>
</div>
<div class="lightbox_outer">
      <div class="lightbox_inner col-sm-5">
        <a class="btn btn-danger btn-sm close">X</a>
        <br>
            {!! Form::open([
                'url' => '/user/create'
            ]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                 {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('Create New user', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
      </div>
    </div>
@stop