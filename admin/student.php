<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	require_once("../db.php");
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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Students</span><a href="addstudent.php" class="btn btn-default" style="float:right; margin:3px 20px 0px 0px; background-color:#2D2D2D; color:#FFFFFF;"><span class="glyphicon glyphicon-plus-sign"></span> Add Students</a>
                	<div class="t_routine">
                    	<table class="table table-bordered">
                    	<thead>
                        	<tr>
                            	<th>Sl</th>
                                <th class="td">Photo</th>
                                <th>Roll</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Address</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
							$result=mysql_query("SELECT * FROM student");
							$i=1;
							while($row=mysql_fetch_array($result)){
								echo '<tr>
										<td class="td2" align="center">'.$i.'</td>
										<td class="td"><img class="img2" src="upload/'.$row['picture'].'" alt="No Review" /></td>
										<td class="td2">'.$row['roll'].'1</td>
										<td class="td2">'.$row['name'].'</td>
										<td class="td2">'.$row['class'].'</td>
										<td class="td2">'.$row['address'].'</td>
										<td>
										<div class="btn-group">
										  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Action <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu">';?>
                                        
											<li><a href="marksheet.php?student_id=<?php echo $row['student_id']; ?>"><span  class="glyphicon glyphicon-signal"></span> Mark Sheet</a></li>
                                            <li><a href="showatten.php?student_id=<?php echo $row['student_id']; ?>"><span  class="glyphicon glyphicon-align-justify"></span> Attendance</a></li>
											<li><a href="sprofile.php?student_id=<?php echo $row['student_id']; ?>"><span  class="glyphicon glyphicon-user"></span> Profile</a></li>
											<li><a href="editprofile.php?student_id=<?php echo $row['student_id']; ?>"><span  class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
											<li><a href="delete.php?student_id=<?php echo $row['student_id']; ?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete</a></li><?php 
										 echo '</ul>
										</div>
										</td>
									 </tr>';
									 $i++;
							}
						?>
                        </tbody>
                    </table>
                    </div>
                
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>
  </body>
</html>