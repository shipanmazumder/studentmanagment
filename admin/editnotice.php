<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	require_once('../db.php');
	if(isset($_GET['notice_id'])){
       $notice_id=$_GET['notice_id'];
    }
	$result=mysql_query("SELECT * FROM notice WHERE notice_id='$notice_id'");
	$row=mysql_fetch_array($result);
	if(isset($_POST['submit'])){
		$title=$_POST['title'];
		$notice=$_POST['notice'];
		$date=$_POST['date'];
		$status=$_POST['status'];
		$update=mysql_query("UPDATE notice SET title='$title', notice='$notice',date='$date',status='$status' WHERE notice_id='$notice_id' ");
		if($update){
			header('location:tnoticbord.php');
		}
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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Notice</span>
                	<div class="t_routine">
                    	<form class="form-inline" method="POST">
                            <table  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><span class="glyphicon glyphicon-plus-sign"></span> Edit Notice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">Title <input type="text" name="title" id="form" value="<?php echo $row['title']; ?>"  class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-10px;">Notice</span> <textarea id="form" name="notice"  class="form-control" required ><?php echo $row['notice']; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:5px;">Date</span> <input type="text" value="<?php echo $row['date']; ?>" name="date" id="form"  class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-15px;">Send To</span> <select id="form" name="status"  class="form-control" required >
                                    	<option value="all">All</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="student">Student</option>
                                        </select>
                                    </td>
                                 </tr>
                                 <tr>
                                	<td align="center"><button style=" margin-left:-145px; color:#FFFFFF; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="submit">Save Change</button></td>
                                </tr>
                                </tbody>
                             </table>
                             </form>

                    </div>
                
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>	
  </body>
</html>