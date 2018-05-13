<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Class Routine</span><a href="addclass.php?id=Four" class="btn btn-default" style="float:right; margin:3px 20px 0px 0px; background-color:#2D2D2D; color:#FFFFFF;"><span class="glyphicon glyphicon-plus-sign"></span> Add Class Routine</a>
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
											$result=mysql_query("SELECT * FROM class_routine WHERE Class='Four' AND day='Satarday' AND section='A'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                        </tr>
                                        <tr>
                                            <td class="c_routine">Sunday</td>
                                            <td>
                                             <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Sunday' AND section='A'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                        </tr>   
                                    <tr>
                                        <td class="c_routine">Monday</td>
                                        <td>
										<?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Monday' AND section='A'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                    </tr>
                                    <tr>
                                        <td class="c_routine">Tuesday</td>
                                        <td>
                                       <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Tuesday' AND section='A'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                    </tr>
                                     <tr>
                                        <td class="c_routine">Wednesday</td>
                                        <td> <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Wednesday' AND section='A'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                    </tr>
                                     <tr>
                                        <td class="c_routine">Thusday</td>
                                        <td>
                                       <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Thusday' AND section='A'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
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
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Satarday' AND section='B'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                        </tr>
                                        <tr>
                                            <td class="c_routine">Sunday</td>
                                            <td>
                                             <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Sunday' AND section='B'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                        </tr>   
                                    <tr>
                                        <td class="c_routine">Monday</td>
                                        <td>
										<?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Monday' AND section='B'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                    </tr>
                                    <tr>
                                        <td class="c_routine">Tuesday</td>
                                        <td>
                                       <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Tuesday' AND section='B'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                    </tr>
                                     <tr>
                                        <td class="c_routine">Wednesday</td>
                                        <td> <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Wednesday' AND section='B'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
														</div>
												<?php
											}
										?>
                                    </tr>
                                     <tr>
                                        <td class="c_routine">Thusday</td>
                                        <td>
                                       <?php
											$result=mysql_query("SELECT * FROM class_routine WHERE class='Four' AND day='Thusday' AND section='B'");
											
											while($row=mysql_fetch_array($result)){
												echo '														
													 <div class="btn-group">
														  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row['subject'].'('.$row['shour'].':'.$row['sminite'].'-'.$row['ehour'].':'.$row['eminite'].')<span class="caret"></span>
														  </button>
														  <ul class="dropdown-menu">';?>
															<li><a href="editclass.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Routine</a></li>
															<li><a href="delete.php?routine_id=<?php echo $row['routine_id'].','.$row['class']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete Routine</a></li>
														  </ul>
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