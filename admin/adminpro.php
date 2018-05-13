<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	$eamil=$_SESSION['aemail'];
	require_once("../db.php");
	$result=mysql_query("SELECT * FROM admin WHERE aemail='$eamil'");
	$row=mysql_fetch_array($result);
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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> My Profile</span>
                	<div class="a_student">
                        <table  class="table">
                            <tr>
                                <td class="p_td"><?php  echo '<img class="p_img" src="upload/'.$row['photo'].'">'; ?></td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                        	<tr>
                            	<td>Name</td>
                                <td><?php echo $row['name']; ?></td>
                            </tr>
                            <tr>
                            	<td>Email</td>
                                <td><?php echo $row['aemail']; ?></td>
                            </tr>
                            <tr>
                            	<td>Birthday</td>
                                <td><?php echo $row['birthday']; ?></td>
                            </tr>
                            <tr>
                            	<td>Gender</td>
                                <td><?php echo $row['gender']; ?></td>
                            </tr>
                          <tr>
                            	<td>Address</td>
                                <td><?php echo $row['address']; ?></td>
                            </tr>
                            <tr>
                            	<td>Mobile</td>
                                <td><?php echo $row['mobile']; ?></td>
                            </tr>
                        </table>
                                
                    </div>
                
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>
  </body>
</html><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>