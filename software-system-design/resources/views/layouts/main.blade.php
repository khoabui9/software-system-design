<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://use.fontawesome.com/9b92ee9d70.js"></script>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inconsolata">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway Dots">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open Sans">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
		 <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
		   <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
	<div class="row">
		<div class="header col-sm-12">
			<h1 class="app-name">JustCollab</h1>
		</div>
		<div class="something col-sm-12"></div>
	</div>
	<div class="row">
		<div class="dashboard col-sm-12">
			<div class="dashboard-left col-sm-3">
				<ul class="menu-list">
				  <a href="#"><li>Dashboard</li></a>
				  <a href="projects"><li>Projects</li></a>
				  <a href="tasks"><li>Tasks</li></a>
				  <a href="users"><li>Users</li></a>
				</ul> 
			</div>
			<div class="dashboard-right col-sm-9">
			<div class="dashboard-right-inner">
            	@yield('content')
			</div>
			</div>
		</div>
	</div>
</body>
</html>
