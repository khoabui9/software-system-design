@extends('layouts.app')
@section('content')
    <div class="col-sm-12 aboutpic">
        <div class="text">
        <h1>JUSTCOLLAB</h1>
        <p>JustCollab is the easiest way for teams to track their<br>work—and get results.</p>
        <a href="/login" class="btns loginre btn btn-primary btn-lg">Login</a>
        <a href="/register" class="btns registerre btn btn-primary btn-lg">Register now</a>
        </div>
    </div>
    <div class="col-sm-12 about-main">
        <div class="text">
         <h1>Great teamwork gets great result</h1>
        <p>From companies with off-the-charts growth to<br>local businesses and non-profits, teams love JustCollab.</p>
        </div>
    </div>
    <div class="col-sm-12 featurepic">
    </div>
    <div class="col-sm-12 feature-main">
        <div class="text2 col-sm-12">
         <h1>Feature</h1>
           <div class="row">
    <div class="col-sm-3">
      <img src="../lib/1.gif" class="img-responsive" style="width:100%" alt="Image">
       <h3>Project Management</h3>
       <p>Assign tasks to the project. Well orangized workflow help you and your teammate manage the project better</p>
    </div>
    <div class="col-sm-3"> 
      <img src="../lib/2.gif" class="img-responsive" style="width:100%" alt="Image">
       <h3>Task Management</h3>
       <p>Create tasks easily for yourself. Tasks help you to keep track of the work you own. Update or delete the task easily when you need to do it. </p>
    </div>
    <div class="col-sm-3">      
      <img src="../lib/3.gif" class="img-responsive" style="width:100%" alt="Image">
       <h3>Project conversation</h3>
       <p>Fast communication thourgh our chat makes the work more efficient.</p>
    </div>
    <div class="col-sm-3">     
      <img src="../lib/4.gif" class="img-responsive" style="width:100%" alt="Image">
       <h3>Time Tracking</h3>
       <p>Track your work every minute that ensure your task will be completed on time</p>
    </div>
  </div>
        </div>
    </div>
    <div class="col-sm-12 footerpic">
    </div>
    <footer class="container-fluid text-center">
   <p>Copyright &copy; JustCollab 2017</p>
    </footer>
@stop