<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	require_once('../db.php');
	if(isset($_GET['routine_id'])){
		$routine_id = explode(",", $_GET["routine_id"]);
	}
	$result=mysql_query("SELECT * FROM class_routine WHERE routine_id='$routine_id[0]'");
	$row=mysql_fetch_array($result);
	if(isset($_POST['submit'])){
		$class=$_POST['class'];
		$section=$_POST['section'];
		$subject=$_POST['subject'];
		$day=$_POST['day'];
		$teacher=$_POST['teacher'];
		$s_hour=$_POST['s_hour'];
		$s_minite=$_POST['s_minite'];
		$s_am=$_POST['e_am'];
		$e_hour=$_POST['e_hour'];
		$e_minite=$_POST['e_minite'];
		$e_am=$_POST['e_am'];
		$update=mysql_query("UPDATE class_routine SET class='$class',section='$section',subject='$subject',day='$day',teacher='$teacher' ,shour='$s_hour',sminite='$s_minite',s_am='$s_am',ehour='$e_hour',eminite='$e_minite',s_am='$e_am' WHERE routine_id='$routine_id[0]'");
		if($update){
			 if($class=="One"){
		   header('location:croutine.php');
		   }
		    if($class=="Two"){
		   header('location:routineTwo.php');
		   }
		    if($class=="Three"){
		   header('location:routinethree.php');
		   }
		    if($class=="Four"){
		   header('location:routinefour.php');
		   }
		    if($class=="Five"){
		   header('location:routinefive.php');
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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Class Routine</span>
                	<div class="t_routine">
                            <table  class="table">
                                <tr>
                                    <td><span class="glyphicon glyphicon-plus-sign"></span> Edit Class Routine</td>
                                </tr>
                             </table>
                         <form class="form-inline" method="POST">
                            <table  class="table table-bordered">
                                 <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-15px;">Class</span> <select  id="form" name="class"  class="form-control" required >
                                    	<option value="One">One</option>
                                        <option value="Two">Two</option>
                                        <option value="Three">Three</option>
                                        <option value="Four">Four</option>
                                        <option value="Five">Five</option>
                                    </select>
                                    </td>
                                 </tr>
                                <tr>
                                   <td align="center"><span style="padding:0px; margin-left:-26px;">Section</span> <input type="text" value="<?php echo $row['section']; ?>" id="form"  name="section"  class="form-control" required />
                                    </td>
                                </tr>
                                 <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-25px;">Subject</span> <input type="text" id="form" name="subject" value="<?php echo $row['subject']; ?>"   class="form-control" required  />
                                    	
                                    </td>
                                 </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-5px;">Day</span> <input type="text" value="<?php echo $row['day']; ?>" id="form" name="day"  class="form-control" required />
                                    </td>
                                 </tr>
                                 <tr>
                                  <td align="center"><span style="padding:0px; margin-left:-25px;">Teacher</span>
                                  <select id="form" name="teacher"  class="form-control" required >
                                    <option value="<?php echo $row['teacher']; ?>"><?php echo $row['teacher']; ?></option>
                                     <?php 
										$res=mysql_query("SELECT * from teacher");
										while($rows=mysql_fetch_array($result)){
											echo '<option value="'.$rows['name'].'">'.$rows['name'].'</option>';
										}
									
									 ?>
                                        </select>
                                    </td>
                                 </tr>
                               </table>
                              <table class="table table-bordered">
                               <tr>
                                  <td align="center"><span style="padding:0px; margin-left:22px;"> Start Time</span> <input type="text" value="<?php echo $row['shour']; ?>"  name="s_hour"  class="form-control" required />
                            
                                    </td>
                                    <td align="center"> <input type="text" value="<?php echo $row['sminite']; ?>"  name="s_minite"  class="form-control" required />
                                    </td>
                                    <td align="center"> <input type="text" value="<?php echo $row['s_am']; ?>"  name="s_am"  class="form-control" required/ >
                                    </td>
                                 </tr>
                                    <tr>
                                  <td align="center"><span style="padding:0px; margin-left:25px;">End Time</span> <input type="text" value="<?php echo $row['ehour']; ?>"  name="e_hour"  class="form-control" required />
                            
                                    </td>
                                    <td align="center"> <input type="text" value="<?php echo $row['eminite']; ?>"  name="e_minite"  class="form-control" required />
                                    </td>
                                    <td align="center"> <input type="text" value="<?php echo $row['e_am']; ?>"  name="e_am"  class="form-control" required/ >
                                    </td>
                                 </tr>
                               </table>
                               <table class="table table-bordered">
                                 <tr>
                                	<td align="center"><button style="  color:#FFFFFF; width:300px; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="submit">Save Changes</button></td>
                                </tr>
                             </table>
                             </form>

                    </div>
                
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>	
  </body>
</html>