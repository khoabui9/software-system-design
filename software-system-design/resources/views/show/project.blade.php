@extends('layouts.show')
@section('content')
      <h1>{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
        <hr>
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
    </div>-
        <a href="/projects" class="btn btn-info">Back</a>
        <a href="/project/showEdit/{{$project->id}}" class="edit_project btn btn-primary">Edit</a>
    </div>
        <div class="pull-right">
            <a href="/project/delete/{{$project->id}}" class="btn btn-danger">Delete</a>
        </div>


@stop