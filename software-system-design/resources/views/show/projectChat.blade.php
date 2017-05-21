
@extends('layouts.show')
@section('content')
<script>
    window.onload = function () {    
        var objDiv = document.getElementById("chat");
        objDiv.scrollTop = objDiv.scrollHeight;
     }
</script>
<h1>{{ $chat->name }}</h1>
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
<div class="chat-container col-xs-12">
   <div class='col-xs-2 chat-menu'>
      <h1>Users:</h1>
      @foreach($users as $user)
      <h2>{{$user->name}}</h2>
      @endforeach
   </div>
   <div class='col-xs-10 chat'>
   <div class='chat-messages' id="chat">
      @foreach($messages as $message)
      <div class='message'>
         <p>{{$message->name}}</p>
         <h3>{{ $message->content }}</h3>
         <p class="message-date">{{ $message->created_at }}</p>
      </div>
      @endforeach
      </div>
      <div>
         {!! Form::open([
         'url' => '/chat/message/'.$chat->id,
         'method' => 'POST'
         ]) !!}
         <div class="form-group">
            {!! Form::textarea('message', null ,['class' => 'form-control', 'size' => '50x5']) !!}
         </div>
         {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
         {!! Form::close() !!}
   </div>
   </div>
</div>
@stop

