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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Mark Maintaince</span>
                	<div class="t_routine">
                    	<form class="form-inline" method="post">
                          <div class="form-group">
                            <label>Exam</label><br />
                            <select id="b_from" class="form-control" name="exam" required >
                            	<option value="">Select Exam</option>
                                <option value="1st">First Trem</option>
                                <option value="2nd">Second Trem</option>
                                <option value="3rd">Third Trem</option>
                            </select>
                          </div>
                           <div class="form-group">
                            <label>Class</label><br />
                            <select id="b_from" class="form-control" name="class" required >
                            	<option value="">Select Class</option>
                                <option value="One">Class One</option>
                                <option value="Two">Class Two</option>
                                <option value="Three">Class Three</option>
                                <option value="Four">Class Four</option>
                                <option value="Five">Class Five</option>
                            </select>
                          </div>
                           <div class="form-group">
                            <label>Section</label><br />
                            <select id="b_from" class="form-control" name="section" required >
                            	<option value="">Select Section</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                          </div>
                           <div class="form-group">
                            <label>Subject</label><br />
                            <select id="b_from" class="form-control" name="subject" required >
                            	<option value="">Select Subject</option>
                                <option value="English">English</option>
                                <option value="Bangla">Bangla</option>
                                <option value="Math">Math</option>
                            </select>
                          </div>
                          <button id="b_from" style="background:#21A9E1; color:#FFFFFF; margin-left:5px; margin-top:25px;"  type="submit" class="btn btn-default" name="submit">Manage Mark</button>
                        </form><br />
                         <?php
                         if(isset($_POST['submit'])){
                           $section=$_POST['section'];
							$exam=$_POST['exam'];
							$class=$_POST['class'];
							$subject=$_POST['subject'];
							echo '<div class="m_txt">
								<strong>Marks For '.$exam.' Trem</strong><br />
								Class '.$class.': Section '.$section.'<br />
								Subject:'.$subject.' 
                        	</div><br />';
							echo
                         '<table class="table table-bordered">
							<thead>
								<tr class="tr_b">
									<th>Sl</th>
									<th class="td">Name</th>
									<th>Roll</th>
									<th>Mark Obtained</th>
									<th>Comment</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>';
                           $result2=mysql_query("SELECT * FROM student WHERE section='$section'  AND class='$class'");
                            if(mysql_num_rows($result2)){
                              $result3=mysql_query("SELECT * FROM student WHERE section='$section'  AND class='$class'");
							  $i=1;
                              while ($row=mysql_fetch_array($result3)) {
								  $student_id=$row['student_id'];
								  
								echo '<tr>
								<form method="post" method="POST">
									<td class="td2" align="center">'.$i.'</td>
									<td class="td2">'.$row['name'].'
											<input type="hidden" name="name" readonly  value="'.$row['name'].'" class="form-control"  required />
									</td>
									<td class="td2">'.$row['roll'].'
											<input type="hidden" name="roll" readonly value="'.$row['roll'].'" />
											<input type="hidden" name="subject" readonly value="'.$subject.'" />
											<input type="hidden" name="section" readonly value="'.$row['section'].'" />
											<input type="hidden" name="exam" readonly value="'.$exam.'" />
											<input type="hidden" name="student_id" readonly value="'.$row['student_id'].'" />
											<input type="hidden" name="class" readonly value="'.$row['class'].'" />
									</td>
									<td>
										<div class="btn-group">';?>
										<?php
										$res=mysql_query("SELECT * FROM exam WHERE student_id='$student_id' AND subject='$subject' AND exam='$exam'");
										$rows=mysql_fetch_array($res);
										echo '
											<input type="text" name="mark" value="'.$rows['mark'].'"   class="form-control" id="a_from" required />
										</div>
									</td>
									<td>
										<div class="btn-group">
											<input type="text" name="comment" value="'.$rows['comment'].'"   class="form-control" id="a_from" required />
										</div>
									</td>
									<td>
										<button type="submit" style="  background:#00A651; color:#FFFFFF;" class="btn btn-default" name="sub"><span class="glyphicon glyphicon-ok"></span> Save </button>
									</td>
									</form>
								</tr>';
							 $i++;
								
							  }
							  echo  '</tbody>
							</table>';
							}
						 }
						 if(isset($_POST['sub'])){
							 $class=$_POST['class'];
							 $section=$_POST['section'];
							 $roll=$_POST['roll'];
							 $subject=$_POST['subject'];
							 $exam=$_POST['exam'];
							 $student_id=$_POST['student_id'];
							 $mark=$_POST['mark'];
							 $comment=$_POST['comment'];
							 $name=$_POST['name'];
							 $insert=mysql_query("INSERT INTO exam(name,class,section,roll,subject,exam,mark,student_id,comment) VALUE('$name','$class','$section','$roll','$subject','$exam','$mark','$student_id','$comment')");
							 if($insert){
								?>
                                	<script>alert("Sucessfully Update Mark");</script>
                                <?php
							 }
						
						 }
						 				
						?>
                
            </div>
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>
  </body>
</html>