<?php
	session_start();
	if(!$_SESSION['temail']){
		header('location:../index.php');
	}
	require_once('../db.php');
	if(isset($_GET['student_id'])){
		$student_id=$_GET['student_id'];
	}
	$res=mysql_query("SELECT * FROM student WHERE student_id='$student_id'");
	$rows=mysql_fetch_array($res);
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
  	<div class="main3">
  	<?php require_once("rightsidebar3.php"); ?>
        <div class="left_sidebar">
        	<?php  require_once("header.php")?>
            <div class="content3">
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Marksheet for <?php echo $rows['name']; ?></span><a href="editmark.php?student_id=<?php echo $student_id; ?>" class="btn btn-default" style="float:right; margin:3px 20px 0px 0px; background-color:#2D2D2D; color:#FFFFFF;"><span class="glyphicon glyphicon-plus-sign"></span> Add Mark</a>
                	<div class="t_routine">
					 <div class="marksheet">
                        	<div class="t_mark">
                            	1st Trem
                            </div>
                            <div class="table">
                            	<table class="table table-bordered">
                                    <thead>
                                        <tr class="tr_b">
                                            <th>Subject</th>
                                            <th>Obtain Marks</th>
                                            <th>Higest Mark</th>
                                            <th>Grade</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                    <?Php
										$result=mysql_query("SELECT * FROM exam WHERE student_id='$student_id' AND exam='1st' ");
										while($row=mysql_fetch_array($result)){
												$subject=$row['subject'];
												$class=$row['class'];
												$section=$row['section'];
											echo '<tr>
													<td>'.$row['subject'].'</td>
													<td>'.$row['mark'].'</td>';?>
													<td>
													
													<?php 
													 $max=mysql_query("SELECT MAX(mark)  from exam WHERE subject='$subject' AND class='$class' AND section='$section' AND exam='1st'");
													 $rowm=mysql_fetch_array($max);
													 echo $rowm['0'];
													?>
                                                    
                                                    </td>
                                                    <td>
                                                    <?php
                                                    $point=mysql_query("SELECT mark  from exam WHERE subject='$subject' AND class='$class' AND section='$section' AND student_id='$student_id' AND exam='1st'");
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
													 
													 ?>
                                                    </td>
											<?php	echo '
													<td>'.$row['comment'].'</td>
												</tr>';
										}
									?>   
                                    </tbody>
                                 </table>
                             </div>
                        </div>
                        <div class="marksheet">
                        	<div class="t_mark">
                            	2nd Trem
                            </div>
                            <div class="table">
                              	<table class="table table-bordered">
                                    <thead>
                                        <tr class="tr_b">
                                            <th>Subject</th>
                                            <th>Obtain Marks</th>
                                            <th>Higest Mark</th>
                                            <th>Grade</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                    <?Php
										$result=mysql_query("SELECT * FROM exam WHERE student_id='$student_id' AND exam='2nd' ");
										while($row=mysql_fetch_array($result)){
												$subject=$row['subject'];
												$class=$row['class'];
												$section=$row['section'];
											echo '<tr>
													<td>'.$row['subject'].'</td>
													<td>'.$row['mark'].'</td>';?>
													<td>
													
													<?php 
													 $max=mysql_query("SELECT MAX(mark)  from exam WHERE subject='$subject' AND class='$class' AND section='$section'  AND exam='2nd'");
													 $rowm=mysql_fetch_array($max);
													 echo $rowm['0'];
													?>
                                                    
                                                    </td>
                                                    <td>
                                                    <?php
                                                    $point=mysql_query("SELECT mark  from exam WHERE subject='$subject' AND class='$class' AND section='$section' AND student_id='$student_id' AND exam='2nd'");
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
													 
													 ?>
                                                    </td>
											<?php	echo '
													<td>'.$row['comment'].'</td>
												</tr>';
										}
									?>   
                                    </tbody>
                                 </table>
                            </div>
                        </div>
                        <div class="marksheet">
                        	<div class="t_mark">
                            	3rd Trem
                            </div>
                            <div class="table">
                            	<table class="table table-bordered">
                                    <thead>
                                        <tr class="tr_b">
                                            <th>Subject</th>
                                            <th>Obtain Marks</th>
                                            <th>Higest Mark</th>
                                            <th>Grade</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                    <?Php
										$result=mysql_query("SELECT * FROM exam WHERE student_id='$student_id' AND exam='3rd' ");
										while($row=mysql_fetch_array($result)){
												$subject=$row['subject'];
												$class=$row['class'];
												$section=$row['section'];
											echo '<tr>
													<td>'.$row['subject'].'</td>
													<td>'.$row['mark'].'</td>';?>
													<td>
													
													<?php 
													 $max=mysql_query("SELECT MAX(mark)  from exam WHERE subject='$subject' AND class='$class' AND section='$section' AND exam='3rd'");
													 $rowm=mysql_fetch_array($max);
													 echo $rowm['0'];
													?>
                                                    
                                                    </td>
                                                    <td>
                                                    <?php
                                                    $point=mysql_query("SELECT mark  from exam WHERE subject='$subject' AND class='$class' AND section='$section' AND student_id='$student_id' AND exam='3rd'");
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
													 
													 ?>
                                                    </td>
											<?php	echo '
													<td>'.$row['comment'].'</td>
												</tr>';
										}
									?>   
                                    </tbody>
                                 </table>
                           </div>
                        </div>
                        
                    </div>
                
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>
  </body>
</html>