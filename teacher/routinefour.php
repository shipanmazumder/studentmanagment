</span><?php
	session_start();
	if(!$_SESSION['temail'])
	{
		header("location:../index.php");
	}
	require_once('../db.php');
	$temail=$_SESSION['temail'];
	$result=mysql_query("SELECT * FROM teacher WHERE temail='$temail'");
	$row=mysql_fetch_array($result);
	$teacher_id=$row['teacher_id'];
	require_once('../db.php');
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
                            	Class Four: Section A
                            </div>
                            <div class="table">
                            	<table class="table table-bordered">
                                	 <tbody>
                                     	<tr>
                                     	<td class="c_routine">Saturday</td>
                                        <td>
                                     	<?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Satarday' AND section='A' AND teacher_id='$teacher_id'");
											
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
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Sunday' AND section='A' AND teacher_id='$teacher_id'");
											
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
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Monday' AND section='A' AND teacher_id='$teacher_id'");
											
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
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Tuesday' AND section='A' AND teacher_id='$teacher_id'");
											
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
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Wednesday' AND section='A' AND teacher_id='$teacher_id'");
											
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
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Thusday' AND section='A' AND teacher_id='$teacher_id'");
											
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
                        </div>
                          <div class="routine">
                        	<div class="r_routine">
                            	Class Four: Section B
                            </div>
                            <div class="table">
                            	<table class="table table-bordered">
                                	 <tbody>
                                     	<tr>
                                     	<td class="c_routine">Saturday</td>
                                        <td>
                                     	<?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Satarday' AND section='B' AND teacher_id='$teacher_id'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')
														  </button>';?>
]														</div>
												<?php
											}
										?>
                                        </tr>
                                        <tr>
                                            <td class="c_routine">Sunday</td>
                                            <td>
                                             <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Sunday' AND teacher_id='$teacher_id' AND section='B'");
											
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
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Monday' AND section='B' AND teacher_id='$teacher_id'");
											
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
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Tuesday' AND section='B' AND teacher_id='$teacher_id'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')
														  </button>'?>
													</div>
												<?php
											}
										?>
                                    </tr>
                                     <tr>
                                        <td class="c_routine">Wednesday</td>
                                        <td> <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Wednesday' AND section='B' AND teacher_id='$teacher_id'");
											
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
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Thusday' AND section='B' AND teacher_id='$teacher_id'");
											
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
                        </div>	
                         
                    </div>
                 </div>
                
            <?php require_once("footer.php"); ?>
        </div>
    </div>
  </body>
</html>