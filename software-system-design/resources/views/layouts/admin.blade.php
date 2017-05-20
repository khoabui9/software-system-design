<?php
// Timezone
date_default_timezone_set("Europe/Madrid");

// Get prev & next month
if (isset($_GET['ym'])) {
	$ym = $_GET['ym'];
}
else {
	// 	This month
		    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym,"-01");
if ($timestamp === false) {
	$timestamp = time();
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('Y / m', $timestamp);

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));


// Create Calendar
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
	
	$date = $ym.'-'.$day;
	
	if ($today == $date) {
		$week .= '<td class="today">'.$day;
	}
	else {
		$week .= '<td>'.$day;
	}
	$week .= '</td>';
	
	// 	End of the week OR End of the month
		    if ($str % 7 == 6 || $day == $day_count) {
		
		if($day == $day_count) {
			// 			Add empty cell
						            $week .= str_repeat('<td></td>', 6 - ($str % 7));
		}
		
		$weeks[] = '<tr>'.$week.'</tr>';
		
		// 		Prepare for new week
				        $week = '';
		
	}
	
}

?>
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
		<link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}"/>
		   <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
 <div class="row">
<div class="col-sm-12">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">JustCollab</a>
    </div>
	  <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
							Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</li>
	</ul>
  </div>
  	<div class="something col-sm-12"></div>
</nav>
</div>
</div>
	<div class="row">
		<div class="dashboard col-sm-12">
			<div class="dashboard-left col-sm-3">
				<ul class="menu-list">
				  <a href="#"><li>Dashboard</li></a>
				  <a href="/projects"><li>Projects</li></a>
				  <a href="/tasks"><li>Tasks</li></a>
				  <a href="/users"><li>Users</li></a>
				</ul> 
				<hr>
					<h3><a href="?ym=<?php echo $prev;
?>">&lt;</a> <?php echo $html_title;
?> <a href="?ym=<?php echo $next;
?>">&gt;</a></h3>
					<table class="table">
						<tr>
							<th>S</th>
							<th>M</th>
							<th>T</th>
							<th>W</th>
							<th>T</th>
							<th>F</th>
							<th>S</th>
						</tr>
						<?php
							foreach ($weeks as $week) {
	echo $week;
}
?>
					</table>
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
