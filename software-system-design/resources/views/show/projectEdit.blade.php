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
            {!! Form::submit('Update project info', ['class' => 'btn btn-primary']) !!}
            <a href="/project/{{$project->id}}" id='{{$project->id}}' class="close_edit btn btn-danger btn-sm"><span class="" >cancel</span></a>
            {!! Form::close() !!}
          </span>
        <h2>
                 Users:
       </h2>
       <table class="table_users">
       <th>Name</th>   
       <th>Email</th>
    @foreach($users as $user)   
        <tr>
        <td class="table_users">{{$user->name }}</td>
        <td class="table_users">{{$user->email}}</td>
         <td>   <a href="/project/removeUser/{{{$project->id}}}/{{{$user->email}}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" ></span></a></td>
        </tr>
    @endforeach
     </table>
  <!--  <div class="form-controll">
    Add user:
        <select name="restUsersList" form="carform">
        @foreach($restUsers as $user)   
            <option value="{{{$user->email}}}">{{$user->name}}</option>
        @endforeach
        </select>-->
        <p/>
         <span>
             {!! Form::open([
                'url' => '/project/addUser/'.$project->id,
                'method' => 'POST'
            ]) !!}
            <div class="form-group">
            {!! Form::Label('users', 'Add user:') !!}
            <select name="addUser">
                 <option selected disabled>Select user</option>
                @foreach($restUsers as $user)   
                  <option value="{{$user->email}}">{{$user->name." ".$user->email}}</option>
                @endforeach
            </select>
            {!! Form::submit('Add user', ['class' => 'btn btn-primary btn-sm']) !!}
            </div>
            {!! Form::close() !!}
          </span>
        <div class="pull-right">
            <a href="/project/delete/{{$project->id}}" class="btn btn-danger">Delete this project</a>
        </div>
@stop