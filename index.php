<?php
	session_start();
	$message="";
	require_once("db.php");
	if(count($_POST)>0)
	{
		$email=$_POST['email'];
		$pass=md5($_POST['pass']);
		$resulta=mysql_query("SELECT * FROM admin WHERE aemail='$email' AND password='$pass' ");
		$resultt=mysql_query("SELECT * FROM teacher WHERE temail='$email' AND password='$pass' ");
		$results=mysql_query("SELECT * FROM student WHERE semail='$email' AND password='$pass' ");
		$rowa=mysql_fetch_array($resulta);
		$rowt=mysql_fetch_array($resultt);
		$rows=mysql_fetch_array($results);
		if(is_array($rowa))
		{
			$_SESSION['aemail']=$rowa['aemail'];
			$_SESSION['name']=$rowa['name'];
		}
		if(is_array($rowt))
		{
			$_SESSION['temail']=$rowt['temail'];
			$_SESSION['name']=$rowt['name'];
		}
		if(is_array($rows))
		{
			$_SESSION['semail']=$rows['semail'];
			$_SESSION['name']=$rows['name'];
			$_SESSION['class']=$rows['class'];
			$_SESSION['section']=$rows['section'];
		}
		else
		{
		$message = "Invlide UserName Or Password..!";
		}
		if(isset($_SESSION['aemail']))
		{
			header("location:admin/dasbord.php");
		}
		if(isset($_SESSION['temail']))
		{
			header("location:teacher/dasbord.php");
		}
		if(isset($_SESSION['semail']))
		{
			header("location:student/dasbord.php");
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
      <title>STUDENT MANAGEMENT SYSTEM</title>
      <link href="css/style.css" type="text/css" rel="stylesheet" />
      <!--<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet" />-->
  </head>
  <body>
   <div class="main">
        <form class="login" method="post" >
            <p class="title">School Management System</p>
            <span class="msg"><?php if($message!="") echo $message; ?></span>
            <input class="in" type="email" name="email" placeholder="Type your email..." />
            <input class="in" type="password" name="pass" placeholder="Type password..." />
            <input class="sub" type="Submit" value="Log In" /> 
        </form>
      </div>
  </body>
</html>