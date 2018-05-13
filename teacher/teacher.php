<?php
	session_start();
	if(!$_SESSION['temail'])
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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Teacher</span>
                	<div class="t_routine">
                    	<table class="table table-bordered">
                    	<thead>
                        	<tr>
                            	<th id="th">Sl</th>
                                <th class="td">Photo</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
							$result=mysql_query("SELECT * FROM teacher");
							$i=1;
							while($row=mysql_fetch_array($result)){
								echo '<tr>
										<td class="td2" id="th" align="center">'.$i.'</td>
										<td class="td"><img class="img2" src="../admin/upload/'.$row['picture'].'" alt="No Review" /></td>
										<td class="td2">'.$row['name'].'</td>
										<td class="td2">'.$row['mobile'].'</td>
										<td class="td2">'.$row['address'].'</td>
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