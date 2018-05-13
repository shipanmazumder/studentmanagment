<?php
	session_start();
	if(!$_SESSION['temail']){
		header('location:../index.php');
	}
	require_once('../db.php');
	
	if(isset($_GET['student_id'])){
		$student_id=$_GET['student_id'];
	}
	$res=mysql_query("SELECT * FROM exam WHERE student_id='$student_id'");
	$rows=mysql_fetch_array($res);
	
	 if(isset($_POST['submit'])){
		 $class=$_POST['class'];
		 $section=$_POST['section'];
		 $roll=$_POST['roll'];
		 $subject=$_POST['subject'];
		 $exam=$_POST['exam'];
		 $mark=$_POST['mark'];
		 $comment=$_POST['comment'];
		 $name=$_POST['student'];
		 $result=mysql_query("SELECT * FROM student where name='$name'");
		$row=mysql_fetch_array($result);
		$student_id=$row['student_id'];
		$query=mysql_query("SELECT * FROM exam WHERE class='$class' AND roll='$roll' AND section='$section' AND subject='$subject' AND exam='$exam' AND student_id='$student_id'");
		 if(mysql_num_rows($query)>0)
		 {?>
			 
			<script>alert('This Student already exits.');</script>
            <?php
		 }
		 else{
			 $insert=mysql_query("INSERT INTO exam(name,class,section,roll,subject,exam,mark,student_id,comment) VALUE('$name','$class','$section','$roll','$subject','$exam','$mark','$student_id','$comment')");
		 
		 if($insert){
			?>
				<script>alert("Sucessfully Update Mark");</script>
			<?php
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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Mark</span>
                	<div class="t_routine">
                    	<form class="form-inline" method="POST">
                            <table  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><span class="glyphicon glyphicon-plus-sign"></span> Add Exam Mark</th>
                                </tr>
                            </thead>
                            <tbody>
                         			<tr>
                                    <td align="center"><span style="padding:0px; margin-left:-15px;">Class</span>
                                  	<input type="text" readonly id="form" class="form-control" value="<?php echo $rows['class'] ?>" name="class" />
                                       
                                    </td>
                                 </tr>
                            	<tr>
                                 		<td align="center"><span style="padding:0px; margin-left:-25px;">Student</span> 
                                       <input type="text" readonly id="form" class="form-control" value="<?php echo $rows['name'] ?>" name="student" readonly>
                                        </td>
                                </tr>
                                	<tr>
                                 		<td align="center"><span style="padding:0px; margin-left:-5px;">Roll</span> 
                                       <input type="text" readonly id="form" class="form-control" value="<?php echo $rows['roll'] ?>" name="roll">
                                        </td>
                                </tr>
                                <tr>
                                 		<td align="center"><span style="padding:0px; margin-left:-25px;">Subject</span> 
                                        
                                        <select id="form" name="subject"  class="form-control" required >
                                        <option value="">Select Subject</option>
                                        <option value="Bangla">Bangla</option>
                                        <option value="Math">Math</option>
                                        <option value="English">English</option>
                                         </select>
                                        </td>
                                </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-25px;">Section</span>
                                    <input type="text" readonly id="form" class="form-control" value="<?php echo $rows['section'] ?>" name="section" readonly value="One">
                                    </td>
                                 </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-10px;">Exam</span> <select id="form" name="exam"  class="form-control" required >
                                    	<option value="">Select Exam</option>
                                        <option value="1st">First Trem</option>
                                        <option value="2nd">Second Trem</option>
                                        <option value="3rd">Third Trem</option>
                                        </select>
                                    </td>
                                 </tr>
                                 <tr>
                                 	 <td align="center"><span style="padding:0px; margin-left:-10px;">Mark</span> <input type="text" id="form" name="mark"  class="form-control" required >
                                 </tr>
                                 <tr>
                                 	 <td align="center"><span style="padding:0px; margin-left:-40px;">Comment</span> <textarea id="form" name="comment"  class="form-control" required ></textarea>
                                 </tr>
                                 <tr>
                                	<td align="center"><button style=" margin-left:-180px; color:#FFFFFF; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="submit">Add Mark</button></td>
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