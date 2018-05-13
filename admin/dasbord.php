<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href='../css/fullcalendar.css' rel='stylesheet' />
	<link href='../css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="../css/main.css" type="text/css" rel="stylesheet" />
     <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src='../js/moment.min.js'></script>
    <script src='../js/fullcalendar.min.js'></script>
    <script src='../js/gcal.js'></script>
    <script src="../js/script.js"></script>
	<script>
			$(document).ready(function() {
	
				$('#calendar').fullCalendar({
		
					// THIS KEY WON'T WORK IN PRODUCTION!!!
					// To make your own Google API key, follow the directions here:
					// http://fullcalendar.io/docs/google_calendar/
					googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',
					
					
					eventClick: function(event) {
						// opens events in a popup window
						window.open(event.url, 'gcalevent', 'width=700,height=600');
						return false;
					},
					
					loading: function(bool) {
						$('#loading').toggle(bool);
					}
					
				});
				
			});
	</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="main">
  	<?php require_once("rightsidebar.php"); ?>
        <div class="left_sidebar">
        	<?php  require_once("header.php")?>
            <div class="content">
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Admin Dashboard</span>
                <div class="t_routin">
                	<div class="t_n">
                    	<span class="glyphicon glyphicon-calendar"></span> Event Schedule
                    </div>
                	<div class="t_m">
                    	<div id='loading'>loading...</div>

						<div id='calendar'></div>
                    </div>
                </div>
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>
  </body>
</html>