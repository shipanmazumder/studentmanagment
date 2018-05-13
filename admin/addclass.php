<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}
	require_once('../db.php');
	if(isset($_POST['submit'])){
		$class=$_POST['class'];
		$section=$_POST['section'];
		$subject=$_POST['subject'];
		$day=$_POST['day'];
		$teacher=$_POST['teacher'];
		$s_hour=$_POST['s_hour'];
		$s_minite=$_POST['s_minit'];
		$s_am=$_POST['e_am'];
		$e_hour=$_POST['e_hour'];
		$e_minite=$_POST['e_minit'];
		$e_am=$_POST['e_am'];
		$result=mysql_query("SELECT * FROM teacher where teacher_id='$teacher'");
		$row=mysql_fetch_array($result);
		$teacher_id=$row['teacher_id'];
		$query=mysql_query("SELECT * FROM class_routine WHERE( class='$class' AND section='$section' AND subject='$subject' AND day='$day' AND teacher='$teacher' AND shour='$s_hour' AND sminite='$s_minite' AND s_am='$s_am') OR (class='$class' AND section='$section' AND subject='$subject' AND day='$day' AND teacher='$teacher')  ");
		 if(mysql_num_rows($query)>0)
		 {?>
			 
			<script>alert('This routine already exits.');</script>
            <?php
		 }
		 else
		 {	
			 $insert=mysql_query("INSERT INTO class_routine(class,section,subject,day,teacher,shour,sminite,s_am,ehour,eminite,e_am,teacher_id) VALUE('$class','$section','$subject','$day','$teacher','$s_hour','$s_minite','$s_am','$e_hour','$e_minite','$e_am','$teacher_id')");
			 // $insert2=mysql_query("INSERT INTO class_routine(teacher_id	) ");
			 if($insert)
			 {
				if($id=="One"){
				 header('location:croutine.php');
				}
				if($id=="Two"){
				 header('location:routinetwo.php');
				}
				if($id=="Three"){
				 header('location:routinethree.php');
				}
				if($id=="Four"){
				 header('location:routinefour.php');
				}
				if($id=="Five"){
				 header('location:routinefive.php');
				}
				 
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
                                    <td><span class="glyphicon glyphicon-plus-sign"></span> Add Class Routine</td>
                                </tr>
                             </table>
                         <form class="form-inline" method="POST">
                            <table  class="table table-bordered">
                                 <tr>
                                            <td align="center"><span style="padding:0px; margin-left:-15px;">Class</span>
                                           
											<?php
                                            if($id=="One"){
                                                echo '<input type="text" id="form" class="form-control" name="class" readonly value="One">';
                                                }
                                                if($id=="Two"){
                                                 echo '<input type="text" id="form" class="form-control" name="class" readonly value="Two">';
                                                }
                                                if($id=="Three"){
                                                  echo '<input type="text" id="form" class="form-control" name="class" readonly value="Three">';
                                                }
                                                if($id=="Four"){
                                                  echo '<input type="text" id="form" class="form-control" name="class" readonly value="Four">';
                                                }
                                                if($id=="Five"){
                                                  echo '<input type="text" id="form" class="form-control" name="class" readonly value="Five">';
                                                }
                                ?>
                                       
                                    </td>
                                 </tr>
                                <tr>
                                   <td align="center"><span style="padding:0px; margin-left:-26px;">Section</span> <select id="form"  name="section"  class="form-control" required >
                                    	<option value="">Select Section</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        </select>
                                    </td>
                                </tr>
                                 <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-25px;">Subject</span> <select id="form" name="subject"  class="form-control" required >
                                      <option value="">Select Subject</option>
                                    	<option value="English">English</option>
                                        <option value="Math">Math</option>
                                        <option value="Bangla">Bangla</option>
                                        </select>
                                    </td>
                                 </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-5px;">Day</span>
                                    
                                     <select id="form" name="day"  class="form-control" required >
                                     <option value="">Select Day</option>
                                    	<option value="Satarday">Satarday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                         <option value="Tuesday">Tuesday</option>
                                         <option value="Wednesday">Wednesday</option>
                                         <option value="Thusday">Thusday</option>
                                        </select>
                                    </td>
                                 </tr>
                                 <tr>
                                  <td align="center"><span style="padding:0px; margin-left:-25px;">Teacher</span> 
                                  	
                                    <select id="form" name="teacher"  class="form-control" required >
                                    <option value="">Select Teacher</option>
                                     <?php 
										$result=mysql_query("SELECT * from teacher");
										while($row=mysql_fetch_array($result)){
											
											echo '<option value="'.$row['teacher_id'].$row['name'].'">'.$row['name'].'</option>';
										}
									
									 ?>
                                        </select>
                                    </td>
                                 </tr>
                               </table>
                              <table class="table table-bordered">
                               <tr>
                                  <td align="center"><span style="padding:0px; margin-left:-25px;">Start Time</span> <select  name="s_hour"  class="form-control" required >
                                    	<option value="">Hour</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        </select>
                                    </td>
                                    <td align="center"> <select  name="s_minit"  class="form-control" required >
                                    	<option value="">Minutes</option>
                                        <option value="0">0</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                        </select>
                                    </td>
                                    <td align="center"> <select  name="s_am"  class="form-control" required >
                                    	 <option value="am">am</option>
                            			<option value="pm">pm</option>
                                        </select>
                                    </td>
                                 </tr>
                                                                <tr>
                                  <td align="center"><span style="padding:0px; margin-left:-25px;">End Time</span> <select  name="e_hour"  class="form-control" required >
                                    	<option value="">Hour</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        </select>
                                    </td>
                                    <td align="center"> <select  name="e_minit"  class="form-control" required >
                                    	<option value="">Minutes</option>
                                        <option value="0">0</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                        </select>
                                    </td>
                                    <td align="center"> <select  name="e_am"  class="form-control" required >
                                    	 <option value="am">am</option>
                            			<option value="pm">pm</option>
                                        </select>
                                    </td>
                                 </tr>
                               </table>
                               <table class="table table-bordered">
                                 <tr>
                                	<td align="center"><button style="  color:#FFFFFF; width:300px; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="submit">Add Class Routine</button></td>
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