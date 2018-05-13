<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	require_once("../db.php");
	if(isset($_POST['submit']))
    {
		$name=$_POST['name'];
		$section=$_POST['section'];
		$roll=$_POST['roll'];
		$class=$_POST['class'];
		$mobile=$_POST['mobile'];
		$month=$_POST['month'];
		$date=$_POST['date'];
		$status=$_POST['status'];
		$payment=$_POST['payment'];
		$total=$_POST['total'];
		$res=mysql_query("SELECT * FROM student WHERE  roll='$roll' AND section='$section' AND class='$class'");
		$rows=mysql_fetch_array($res);
		$student_id=$rows['student_id'];
		$name=$rows['name'];
		$insert=mysql_query("INSERT INTO payment(name,section,roll,class,mobile,month,date,status,pay,total,student_id) VALUE('$name','$section','$roll','$class','$mobile','$month','$date','$status','$payment','$total','$student_id')");
		if($insert){
			header('location:showpayment.php');
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
  	<div class="main2">
  	<?php require_once("rightsidebar2.php"); ?>
        <div class="left_sidebar">
        	<?php  require_once("header.php")?>
            <div class="content2">
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Create Student Payment</span>
                	<div class="a_student">
                            <table  class="table">
                                <tr class="tr_b">
                                    <td align="center">Invoice Information</td>
                                </tr>
                             </table>
                         <form class="form-inline" method="POST">
                            <table  class="table table-bordered">
                             	  <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-60px;">Student Roll</span>  <input list="roll" id="form" name="roll"  class="form-control" placeholder="Search The Roll" required >
                                    <datalist id="roll">
                                     <?php 
										$result=mysql_query("SELECT * from student");
										while($row=mysql_fetch_array($result)){
											echo '<option value="'.$row['roll'].'">'.$row['roll'];
												
										}
									
									 ?>
                                    </datalist>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-15px;">Class</span> <select id="form" name="class"  class="form-control" required >
                                    	<option value="">Select Class</option>
                                        <option value="One">Class One</option>
                                        <option value="Two">Class Two</option>
                                        <option value="Three">Class Three</option>
                                        <option value="Four">Class Four</option>
                                        <option value="Five">Class Five</option>
                                        </select>
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
                                    <td align="center"><span style="padding:0px; margin-left:-20px;">Month</span> <select id="form" name="month"  class="form-control" required >
                                    	<option value="">Select Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="Septembar">Septembar</option>
                                        <option value="Octobar">Octobar</option>
                                        <option value="Novembar">Novembar</option>
                                        <option value="Decembar">Decembar</option>
                                        </select>
                                    </td>
                                 </tr>
                                   <tr>
                                  <td align="center"><span style="padding:0px; margin-left:-10px;">Date</span> <input type="date" id="form" name="date"  class="form-control" required >
                                    </td>
                                 </tr>
                                 <tr>
                                  <td align="center"><span style="padding:0px; margin-left:-20px;">Mobile</span> <input type="text" id="form" name="mobile"  class="form-control" required >
                                    </td>
                                 </tr>
                               </table>
                              <table class="table table-bordered">
                               <tr class="tr_b">    
                                	<td align="center"> Payment Information</td>                             
                                </tr>
                                <tr>
                                <td align="center"><span style="padding:0px; margin-left:-15px;">Total</span> <input type="text" id="form" name="total"  class="form-control" required >
                                </tr>
                                <tr>
                                <td align="center"><span style="padding:0px; margin-left:-40px;">Payment</span> <input type="text" id="form" name="payment"  class="form-control" required >
                                </tr>
                               <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-25px;">Status</span> <select  name="status" id="form" class="form-control" required >
                                    	 <option value="Paid">Paid</option>
                            			<option value="Unpaid">Unpaid</option>
                                        </select>
                                    </td>
                                 </tr>
                                 <tr>
                                	<td align="center"><button style="  color:#FFFFFF; margin-left:29px; width:300px; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="submit">Add Payment</button></td>
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