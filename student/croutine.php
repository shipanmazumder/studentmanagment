<?php
	session_start();
	if(!$_SESSION['semail'])
	{
		header("location:../index.php");
	}
	require_once('../db.php');
	$semail=$_SESSION['semail'];
	$res=mysql_query("SELECT * FROM student WHERE semail='$semail' ");
	$rows=mysql_fetch_array($res);
	$class=$rows['class'];
	$section=$rows['section'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/main.css" type="text/css" rel="stylesheet" />
    <script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>

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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Class Routine</span>
                	<div class="t_routine">
						 <div class="routine">
                        	<div class="r_routine">
                            	Class <?php echo $class; ?>: <?php echo $section; ?>
                            </div>
                             <div class="table">
                            	<table class="table table-bordered">
                                	 <tbody>
                                     	<tr>
                                     	<td class="c_routine">Saturday</td>
                                        <td>
                                     	<?php
											$result=mysql_query("SELECT * FROM class_routine WHERE day='Satarday' AND section='$section' AND class='$class' ");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')
														  </button>';?>
														</div>
												<?php
											}
										?>
                                        </tr>
                                        <tr>
                                            <td class="c_routine">Sunday</td>
                                            <td>
                                             <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE day='Sunday' AND section='$section' AND class='$class' ");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')
														  </button>';?>
														</div>
												<?php
											}
										?>
                                        </tr>   
                                    <tr>
                                        <td class="c_routine">Monday</td>
                                        <td>
										<?php
											$result=mysql_query("SELECT * FROM class_routine WHERE day='Monday' AND section='$section' AND class='$class' ");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')
														  </button>';?>
														</div>
												<?php
											}
										?>
                                    </tr>
                                    <tr>
                                        <td class="c_routine">Tuesday</td>
                                        <td>
                                       <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE day='Tuesday' AND section='$section' AND class='$class' ");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')
														  </button>';?>
														</div>
												<?php
											}
										?>
                                    </tr>
                                     <tr>
                                        <td class="c_routine">Wednesday</td>
                                        <td> <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE day='Wednesday' AND section='$section' AND class='$class' ");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')
														  </button>';?>
														</div>
												<?php
											}
										?>
                                    </tr>
                                     <tr>
                                        <td class="c_routine">Thusday</td>
                                        <td>
                                       <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE day='Thusday' AND section='$section' AND class='$class' ");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')
														  </button>';?>
													</div>
												<?php
											}
										?>
                                    </tr>
                                    </tbody>
                                 </table>
                            </div>
                           
                       </div><!--end routine-->
                </div> <!--end t_routine-->
              </div> <!--end content-->     
            <?php require_once("footer.php"); ?>
        </div>
    </div>
  </body>
</html>