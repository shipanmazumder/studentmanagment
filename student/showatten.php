<?php
	session_start();
	if(!$_SESSION['semail'])
	{
		header("location:../index.php");
	}
	require_once('../db.php');
	$email=$_SESSION['semail'];
	$res=mysql_query("SELECT * FROM student WHERE semail='$email'");
	$rows=mysql_fetch_array($res);
	$student_id=$rows['student_id'];
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
    <link href="../css/font-awesome.min.css" type="text/css" rel="stylesheet" />
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
            	<span class="t_d"><span class="glyphicon glyphicon-list"> </span> Attendance List</span>
                	<div class="t_routine">
                    <div id="t_routine">
                         <?php
							$result2=mysql_query("SELECT * FROM attendance WHERE student_id='$student_id' ");
							$rows=mysql_fetch_array($result2);
							echo '<div class="m_txt">
									<strong>Attendance Of '.$rows['name'].'</strong><br />
									Class '.$rows['class'].': Section '.$rows['section'].'<br />
									Roll: '.$rows['roll'].'
								</div><br />';
								echo
									 '<table class="table table-bordered">
										<thead>
											<tr class="tr_b">
												<td align="center">Sl</td>
												<td align="center">Date</td>
												<td align="center">Attendance</td>
											</tr>
										</thead>
										<tbody>';
							$result=mysql_query("SELECT * FROM attendance WHERE student_id='$student_id' ");
							$i=1;
							while($row=mysql_fetch_array($result)){
								echo '<tr>
										<td class="td2" align="center">'.$i.'</td>
										<td class="td2" align="center">'.$row['date'].'</td>
										<td class="td2" align="center">'.$row['atten'].'</td>
									 </tr>';
									 $i++;
									}
								?>
                        </tbody>
                    </table>
                    </div>
                    <button style="margin-left:250px; width:200px; " class="btn btn-default" onClick="printContent('t_routine')"><i class="fa fa-print"></i> Print</button>
                    </div>
                
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>
	<?php require_once('../print.php'); ?>
  </body>
</html>