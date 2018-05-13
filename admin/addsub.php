<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	require_once('../db.php');
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$class=$_POST['class'];
		$teacher=$_POST['teacher'];
		$section=$_POST['section'];
		$query=mysql_query("SELECT * FROM subject WHERE (name='$name' AND class='$class' AND teacher='$teacher' AND section='$section') OR (name='$name' AND class='$class' AND section='$section')");
		 if(mysql_num_rows($query)>0)
		 {?>
			 
			<script>alert('This  already exits.');</script>
            <?php
		 }
		 else{
			 $insert=mysql_query("INSERT INTO subject(name,class,teacher,section) VALUE('$name','$class','$teacher','$section')");
			 if($insert){
				 header("location:onesub.php");
			 }
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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Subject</span>
                	<div class="t_routine">
                    	<form class="form-inline" method="POST">
                            <table  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><span class="glyphicon glyphicon-plus-sign"></span> Add Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-55px;">Subject Name</span> <input type="text" name="name" id="form"  class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td align="center">Class <select id="form" name="class"  class="form-control" required >
                                    	<option value="">Select Class</option>
                                        <option value="One">Class One</option>
                                        <option value="Two">Class Two</option>
                                        <option value="Three">Class Three</option>
                                        <option value="Four">Class Four</option>
                                        <option value="Five">Class Five</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-10px;">Section</span> <select id="form" name="section"  class="form-control" required >
                                    	<option value="">Select Section</option>
                                        <option value="A"> Section A</option>
                                        <option value="B"> Section B</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-15px;">Teacher</span> <select id="form" name="teacher"  class="form-control" required >
                                    	<option value="">Select Teacher</option>
                                        <?php 
										$result=mysql_query("SELECT * from teacher");
										while($row=mysql_fetch_array($result)){
											echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
										}
									
									 ?>
                                        </select>
                                    </td>
                                 </tr>
                                 <tr>
                                	<td align="center"><button style=" margin-left:-145px; color:#FFFFFF; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="submit">Add Subject</button></td>
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