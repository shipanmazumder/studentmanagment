<?php
	session_start();
	if(!$_SESSION['temail'])
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
    <link href="../css/font-awesome.min.css" type="text/css" rel="stylesheet" />
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
  	<div class="main2">
  	<?php require_once("rightsidebar2.php"); ?>
        <div class="left_sidebar">
        	<?php  require_once("header.php")?>
            <div class="content2">
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Show Mark </span>
                	<div class="t_routine">
                    	<form class="form-inline" method="post">
                        <div class="form-group">
                            <label>Roll</label><br />
                            <input type="text" id="b_from" class="form-control" name="roll" required >
                         </div>
                          <div class="form-group">
                            <label>Class</label><br/>
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
                                <option value="a">A</option>
                                <option value="b">B</option>
                            </select>
                          </div>
                           <div class="form-group">
                            <label>Exam</label><br />
                            <select id="b_from" class="form-control" name="exam" required >
                            	<option value="">Select Exam</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Year</label><br />
                            <input type="text" id="b_from" class="form-control" name="year" required >
                         </div><br /><br />
                          <button id="b_from" style="background:#21A9E1; color:#FFFFFF; margin-left:280px;"  type="submit" class="btn btn-default" name="submit"> Show Marksheet</button>
                        </form><br />
                        <div id="t_routine">
                          <?php
                         if(isset($_POST['submit'])){
                           $section=$_POST['section'];
						   $roll=$_POST['roll'];
							$class=$_POST['class'];
							$year=$_POST['year'];
							$exam=$_POST['exam'];
							
                           $result2=mysql_query("SELECT * FROM exam WHERE exam='$exam' AND roll='$roll' AND section='$section'  AND class='$class' AND year='$year'");
                            if(mysql_num_rows($result2)){
								
                              $result3=mysql_query("SELECT * FROM exam WHERE exam='$exam' AND roll='$roll' AND section='$section'  AND class='$class' AND year='$year'");
							  $rows=mysql_fetch_array($result3);
							 
							   echo '<div class="m_txt2">
									<strong><span class="h_txt">Student Managment System</span></strong><br />
									<span style="font-size:16px;">'.$rows['exam'].' Trem Exam Class '.$rows['class'].'<br />
									Year:'.$rows['year'].'</span>
								</div><br />';
								
										 
							$result4=mysql_query("SELECT * FROM exam WHERE exam='$exam' AND roll='$roll' AND year='$year' AND section='$section'  AND class='$class'");				echo '<table class="table" >';
                             $row=mysql_fetch_array($result4);
									
								  echo '<tr>
								  			<td class="td2">Name</td>
											<td class="td2">: '.$row['name'].'</td>
								  		</tr>
										<tr>
								  			<td class="td2" >Roll</td>
											<td class="td2">: '.$row['roll'].'</td>
								  		</tr>
										<tr>
								  			<td class="td2" >Class</td>
											<td class="td2">: '.$row['class'].'</td>
								  		</tr>
										<tr>
								  			<td class="td2" >Section</td>
											<td class="td2">: '.$row['section'].'</td>
								  		</tr>
										<tr>
								  			<td class="td2" >Year</td>
											<td class="td2">: '.$row['year'].'</td>
								  		</tr>
										<tr>
								  			<td class="td2" ></td>
											<td class="td2"></td>
								  		</tr>';
										
							  
							  echo  '</tbody>
								</table>
								<table class="table table-bordered">
									<tr>
										<td>Subject</td>
										<td>Mark</td>
										<td>Grade</td>
										<td>Point</td>
									</tr>';
									$result5=mysql_query("SELECT * FROM exam WHERE exam='$exam' AND roll='$roll' AND year='$year' AND section='$section'  AND class='$class'");	
									 while($row=mysql_fetch_array($result5)){
										 echo '
									<tr>
										<td>'.$row['subject'].'</td>
										<td>'.$row['mark'].'</td>';?>
                                         <td>
											<?php
											if($exam=='1st'){
                                            $point=mysql_query("SELECT mark  from exam WHERE subject='".$row['subject']."' AND class='".$row['class']."' AND section='".$row['section']."' AND student_id='".$row['student_id']."' AND exam='1st'");
                                             $rowm=mysql_fetch_array($point);
                                             if($rowm['mark']<=100 AND $rowm['mark']>=80 ){
                                                 echo 'A+';
                                             }
                                             else if($rowm['mark']>=70 ){
                                                 echo 'A';
                                             }
                                             else if ($rowm['mark']>=60){
                                                 echo 'A-';
                                             }
                                             else if ($rowm['mark']>=50){
                                                 echo 'B';
                                             }
                                             else if ($rowm['mark']>=40){
                                                 echo 'C';
                                             }
                                             else if ($rowm['mark']>=33){
                                                 echo 'D';
                                             }
                                             else {
                                                 echo 'F';
                                             }
                                            }
                                            if($exam=='2nd'){
                                            $point=mysql_query("SELECT mark  from exam WHERE subject='".$row['subject']."' AND class='".$row['class']."' AND section='".$row['section']."' AND student_id='".$row['student_id']."' AND exam='2nd'");
                                             $rowm=mysql_fetch_array($point);
                                             if($rowm['mark']<=100 AND $rowm['mark']>=80 ){
                                                 echo 'A+';
                                             }
                                             else if($rowm['mark']>=70 ){
                                                 echo 'A';
                                             }
                                             else if ($rowm['mark']>=60){
                                                 echo 'A-';
                                             }
                                             else if ($rowm['mark']>=50){
                                                 echo 'B';
                                             }
                                             else if ($rowm['mark']>=40){
                                                 echo 'C';
                                             }
                                             else if ($rowm['mark']>=33){
                                                 echo 'D';
                                             }
                                             else {
                                                 echo 'F';
                                             }
                                            }
                                            if($exam=='3rd'){
                                            $point=mysql_query("SELECT mark  from exam WHERE subject='".$row['subject']."' AND class='".$row['class']."' AND section='".$row['section']."' AND student_id='".$row['student_id']."' AND exam='3rd'");
                                             $rowm=mysql_fetch_array($point);
                                             if($rowm['mark']<=100 AND $rowm['mark']>=80 ){
                                                 echo 'A+';
                                             }
                                             else if($rowm['mark']>=70 ){
                                                 echo 'A';
                                             }
                                             else if ($rowm['mark']>=60){
                                                 echo 'A-';
                                             }
                                             else if ($rowm['mark']>=50){
                                                 echo 'B';
                                             }
                                             else if ($rowm['mark']>=40){
                                                 echo 'C';
                                             }
                                             else if ($rowm['mark']>=33){
                                                 echo 'D';
                                             }
                                             else {
                                                 echo 'F';
                                             }
                                            }
                                             ?>
                                            </td>
                                            <td>
											<?php
											if($exam=="1st"){
                                            $point=mysql_query("SELECT mark  from exam WHERE subject='".$row['subject']."' AND class='".$row['class']."' AND section='".$row['section']."' AND student_id='".$row['student_id']."' AND exam='1st'");
                                             $rowm=mysql_fetch_array($point);
                                             if($rowm['mark']<=100 AND $rowm['mark']>=80 ){
                                                 echo '5';
                                             }
                                             else if($rowm['mark']>=70 ){
                                                 echo '4';
                                             }
                                             else if ($rowm['mark']>=60){
                                                 echo '3.50';
                                             }
                                             else if ($rowm['mark']>=50){
                                                 echo '3';
                                             }
                                             else if ($rowm['mark']>=40){
                                                 echo '2';
                                             }
                                             else if ($rowm['mark']>=33){
                                                 echo '1';
                                             }
                                             else {
                                                 echo '00';
                                             }
                                            }
                                            if($exam=="2nd"){
                                            $point=mysql_query("SELECT mark  from exam WHERE subject='".$row['subject']."' AND class='".$row['class']."' AND section='".$row['section']."' AND student_id='".$row['student_id']."' AND exam='2nd'");
                                             $rowm=mysql_fetch_array($point);
                                             if($rowm['mark']<=100 AND $rowm['mark']>=80 ){
                                                 echo '5';
                                             }
                                             else if($rowm['mark']>=70 ){
                                                 echo '4';
                                             }
                                             else if ($rowm['mark']>=60){
                                                 echo '3.50';
                                             }
                                             else if ($rowm['mark']>=50){
                                                 echo '3';
                                             }
                                             else if ($rowm['mark']>=40){
                                                 echo '2';
                                             }
                                             else if ($rowm['mark']>=33){
                                                 echo '1';
                                             }
                                             else {
                                                 echo '00';
                                             }
                                            }
                                            if($exam=="3rd"){
                                            $point=mysql_query("SELECT mark  from exam WHERE subject='".$row['subject']."' AND class='".$row['class']."' AND section='".$row['section']."' AND student_id='".$row['student_id']."' AND exam='3rd'");
                                             $rowm=mysql_fetch_array($point);
                                             if($rowm['mark']<=100 AND $rowm['mark']>=80 ){
                                                 echo '5';
                                             }
                                             else if($rowm['mark']>=70 ){
                                                 echo '4';
                                             }
                                             else if ($rowm['mark']>=60){
                                                 echo '3.50';
                                             }
                                             else if ($rowm['mark']>=50){
                                                 echo '3';
                                             }
                                             else if ($rowm['mark']>=40){
                                                 echo '2';
                                             }
                                             else if ($rowm['mark']>=33){
                                                 echo '1';
                                             }
                                             else {
                                                 echo '00';
                                             }
                                            }
                                             ?>
                                            
                                            </td>
											<?php
										
									echo '</tr>';}?>
								</table>
                                
                                </div>
								
								<button style=" margin-left:280px; width:200px; padding:10px; " class="btn btn-default" onClick="printContent('t_routine')"><i class="fa fa-print"></i> Print</button>
                                <?php
							}
							else{
								echo '<span class="error">No Search Result</span>';
							}
							
						 }
						 ?>
                        </div>
                    </div>
                
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>
	<?php require_once('../print.php'); ?>

  </body>
</html>