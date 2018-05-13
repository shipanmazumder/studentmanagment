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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Show Attendance </span>
                	<div class="t_routine">
                    	<form class="form-inline" method="post">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" id="a_from" class="form-control" name="date" required >
                         </div>
                          <div class="form-group">
                            <label>Class</label>
                            <select id="a_from" class="form-control" name="class" required >
                            	<option value="">Select Class</option>
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
                                <option value="a">A</option>
                                <option value="b">B</option>
                            </select>
                          </div><br /><br />
                          <button id="a_from" style="background:#21A9E1; color:#FFFFFF; margin-left:280px;"  type="submit" class="btn btn-default" name="submit"> Show Attendance</button>
                        </form><br />
                        <div id="t_routine">
                          <?php
                         if(isset($_POST['submit'])){
                           $section=$_POST['section'];
                            $date=$_POST['date'];
							$class=$_POST['class'];
							
                           $result2=mysql_query("SELECT * FROM attendance WHERE date='$date' AND section='$section'  AND class='$class'");
                            if(mysql_num_rows($result2)){
								
                              $result3=mysql_query("SELECT * FROM attendance WHERE date='$date' AND section='$section'  AND class='$class'");
							  $rows=mysql_fetch_array($result3);
							 
							   echo '<div class="m_txt">
									<strong>Attendance Of Class '.$rows['class'].'</strong><br />
									Section: '.$rows['section'].'<br />
									Date: '.$rows['date'].'
								</div><br />';
								echo
									 '<table class="table table-bordered">
										<thead>
											<tr class="tr_b">
												<td align="center">Sl</td>
												<td align="center">Name</td>
												<td align="center">Attendance</td>
											</tr>
										</thead>
										<tbody>';
										 $i=1;
							$result4=mysql_query("SELECT * FROM attendance WHERE date='$date' AND section='$section'  AND class='$class'");
                              while ($row=mysql_fetch_array($result4)) {
								  echo '<tr>
								  			<td class="td2" align="center">'.$i.'</td>
											<td class="td2" align="center">'.$row['name'].'</td>
											<td class="td2" align="center">'.$row['atten'].'</td>
								  		</tr>';
										$i++;
							  }
							  echo  '</tbody>
								</table>
								</div>';?>
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
            <?php require_once("footer.php"); ?>
        </div>
    </div>
	<?php require_once('../print.php'); ?>

  </body>
</html>