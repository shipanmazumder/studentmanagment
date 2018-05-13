<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	require_once('../db.php');
	if(isset($_GET['student_id'])){
		$student_id=$_GET['student_id'];
	}
	if(isset($_GET['payment_id'])){
		$payment_id=$_GET['payment_id'];
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
  	<div class="main">
  	<?php require_once("rightsidebar.php"); ?>
        <div class="left_sidebar">
        	<?php  require_once("header.php")?>
            <div class="content">
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Show Payment</span>
                	<div class="t_routine">
                    	<div id="t_routine">
                    	  <table class="table table-bordered">
                          	<tr class="tr_b" >
                            	<td align="center">Payment To</td>
                            </tr>
                            <tr>
                            	<td align="center">School Management System<br>
                                	Faridpur,Dhaka,Bangladesh
                                </td>
                            </tr>
                            <tr class="tr_b" >
                            	<td align="center">Bill To</td>
                            </tr>
                            <?php
								$result=mysql_query("SELECT * FROM payment WHERE student_id='$student_id' ");
								$row=mysql_fetch_array($result);
								
							?>
                            <tr>
                            	<td align="center"><?php echo $row['name']; ?><br>
                                	Class <?php echo $row['class']; ?>
                                </td>
                            </tr>
                          </table> 
                         <table class="table table-bordered">
                         	 <tr class="tr_b" >
                            	<td align="center">Payment History</td>
                            </tr>
                         </table>
                         <table class="table table-bordered">
                         	<tr>
                            	<th>Month</th>
                            	<th>Date</th>
                                <th>Amount</th>
                                <th>Method</th>
                            </tr>
                             <?php
								$result=mysql_query("SELECT * FROM payment WHERE student_id='$student_id' ");
								while($row=mysql_fetch_array($result)){
									echo  '<tr>
								<td class="td2">'.$row['month'].'</td>
                            	<td class="td2">'.$row['date'].'</td>
                                <td class="td2">'.$row['pay'].'</td>
                                <td class="td2">'.$row['status'].'</td>
                            </tr>';
								}
								
							?>
                         </table> 
                         </div>
                         <button style=" margin-left:280px; width:200px; padding:10px; " class="btn btn-default" onClick="printContent('t_routine')"><i class="fa fa-print"></i> Print</button>
            
                     </div>
                
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>
    <?php require_once('../print.php'); ?>
  </body>
</html>