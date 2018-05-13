<?php
	session_start();
	if(!$_SESSION['temail'])
	{
		header("location:../index.php");
	}
	require_once("../db.php");
	if(isset($_GET['id'])){
		$class=$_GET['id'];
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
        	<?php  require_once("header.php");?>
            <div class="content">
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Attendance</span>
                	<div class="t_routine">
                    	<form class="form-inline" method="post">
                          <div class="form-group">
                            <label>Date</label>
                            <input type="date" id="a_from" class="form-control" name="date" required />
                          </div>
                          <div class="form-group">
                            <label>class</label>
                            <select id="a_from" class="form-control" name="class" required >
                            	<option value="">Select class</option>
                                <option value="One">Class One</option>
                                <option value="Two">Class Two</option>
                                <option value="Three">Class Three</option>
                                <option value="Four">Class Four</option>
                                <option value="Five">Class Five</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Section</label>
                            <select id="a_from" class="form-control" name="section" required >
                            	<option value="">Select Section</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                          </div><br /><br />
                          <button id="a_from" style="background:#21A9E1; color:#FFFFFF; margin-left:250px;"  type="submit" class="btn btn-default" name="submit">Manage Attendance</button>
                        </form><br />
                          <?php
                         if(isset($_POST['submit'])){
                           $section=$_POST['section'];
                            $date=$_POST['date'];
							$class=$_POST['class'];
							
                           $result2=mysql_query("SELECT * FROM student WHERE section='$section'  AND class='$class'");
                            if(mysql_num_rows($result2)){
							   echo '<div class="m_txt">
									<strong>Attendance Of Class '.$class.'</strong><br />
									Section: '.$section.'<br />
									Date: '. $date.'
								</div><br />';
								echo
									 '<table class="table table-bordered">
										<thead>
											<tr class="tr_b">
												<td align="center">Sl</td>
												<td align="center">Roll</td>
												<td align="center">Attendance</td>
											</tr>
										</thead>
										<tbody>';
                              $result3=mysql_query("SELECT * FROM student WHERE section='$section'  AND class='$class'");
							  $i=1;
                              while ($row=mysql_fetch_array($result3)) {
								  echo '<tr>
								  			<form method="post">
								  			<td class="td2" align="center">'.$i.'</td>
											<td class="td2" align="center">'.$row['roll'].'</td>
											<td  class="td2" align="center">
												<div class="btn-group">
													<select class="form-control" name="atten[]" required>
														<option value="Absent">Absent</option>
														<option value="Present">Present</option>
													</select>
											</div>
											</td>
											<input type="hidden" name="class" value="'.$class.'">
											<input type="hidden" name="name[]" value="'.$row['name'].'">
											<input type="hidden" name="section" value="'.$row['section'].'">
											<input type="hidden" name="roll[]" value="'.$row['roll'].'">
											<input type="hidden" name="date" value="'.$date.'">
											<input type="hidden" name="student_id[]" value="'.$row['student_id'].'">
								  		</tr>';
										$i++;
							  }
							  echo  '</tbody>
									</table>
									 <button type="submit" style=" margin-left:250px; background:#00A651; color:#FFFFFF; width:180px;" class="btn btn-default" name="sub"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
									 </form>';
							}
							else{
								echo "No Search Result";
							}
							
						 }
						 if(isset($_POST['atten'])){
							 $class=$_POST['class'];
							 $name=$_POST['name'];
							 $section=$_POST['section'];
							 $date=$_POST['date'];
							 $student_id=$_POST['student_id'];
							 $roll=$_POST['roll'];
							 $atten=$_POST['atten'];
							 //$a=implode(",",$atten);
							 //$r=implode(",",$roll);
							 $count=count($atten);
							for($i=0;$i<$count;$i++){
								//echo $atten[$i];
							 $insert=mysql_query("INSERT INTO attendance(name,class,section,date,roll,atten,student_id) VALUES('".$name[$i]."','$class','$section','$date','".$roll[$i]."','".$atten[$i]."','".$student_id[$i]."')");
							}
							if($insert){?>
                            	<script>alert("Successfully Your Attendance");</script>
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