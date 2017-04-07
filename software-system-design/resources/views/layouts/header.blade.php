<html lang="en" class="gr__v4-alpha_getbootstrap_com"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/project.css') }}"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/task.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts/glyphicons-halflings-regular.eot') }}"/>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body data-gr-c-s-loaded="true">
  <div class="row">
<div class="col-sm-12">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">JustCollab</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="/">Dashboard</a></li>
        <li><a href="projects">Projects</a></li>
        <li><a href="tasks">Tasks</a></li>
      </ul>
    </div>
  </div>
  	<div class="something col-sm-12"></div>
</nav>
</div>
</div>

    <div class="container">
     <div class="row">
        <div class="_container col-sm-12">
          @yield('content')
      </div>
    </div>
       
    </div>
    <div class="row">
    <!--<div class="col-sm-12">
      <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top pull-right" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
    </div>-->
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="{{asset('js/main.js')}}"></script>
      <script src="{{asset('js/app.js')}}"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
    $( ".datepicker" ).each(function() {
      $(this).datepicker();
    });
  </script>
</body>
</html>