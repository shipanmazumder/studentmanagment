<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	require_once("../db.php");
	if(isset($_FILES['image']))
    {
		$name=$_POST['name'];
		$address=$_POST['address'];
		$birthday=$_POST['birthday'];
		$gender=$_POST['gender'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$pass=md5($_POST['password']);
        $target_dir = "upload/";
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $errors=$_FILES['image']['error'];
        $target_file = $target_dir .basename($file_name);
        $upload=1;
        $file_ext=pathinfo($target_file, PATHINFO_EXTENSION);
        if($file_size>2097152){
            $error="File to large.";
            $upload=0;
        }
        if($file_ext!="jpg" or $file_ext!="png" or $file_ext!="jpeg" or $file_ext!="gif"){
            $error="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload=0;
        }
        if($upload==0){
            $error="Sorry your file is not upload";
        }
        if(move_uploaded_file($file_tmp, $target_file)){
            $success="Your file is upload successfully";
        }
        else{
            $error="Sorry, there was an error uploading your file.";
        }
		$query=mysql_query("SELECT * FROM teacher,admin,student WHERE  temail='$email' OR aemail='$email' OR semail='$email'  ");
		 if(mysql_num_rows($query)>0)
		 {?>
			 
			<script>alert('This student already register');</script>
            <?php
		 }
		 else{
				if($insert=mysql_query("INSERT INTO admin(name,birthday,gender,address,aemail,mobile,password,photo,lavel) VALUE('$name','$birthday','$gender','$address','$email','$mobile','$pass','$file_name',1)")){
					header("location:dasbord.php");
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
  	<div class="main2">
  	<?php require_once("rightsidebar2.php"); ?>
        <div class="left_sidebar">
        	<?php  require_once("header.php")?>
            <div class="content2">
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Admin</span>
                	<div class="a_student">
                    	<form class="form-inline" method="POST" enctype="multipart/form-data">
                            <table  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><span class="glyphicon glyphicon-plus-sign"></span> Add New Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">Name <input type="text" name="name" id="form"  class="form-control" required /></td>
                                </tr>
                                <tr>
                                	<td align="center"><span style="padding:0px; margin-left:-10px;">Gender</span> <select id="form" name="gender"  class="form-control" required >
                                    	<option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                	<td align="center"><span style=" margin-left:-12px;">Address</span> <textarea style="resize:none;" id="form" name="address" class="form-control" required ></textarea></td>
                                </tr>
                                <tr>
                                	 <td align="center"><span style=" margin-left:-10px;">Birthday</span> <input type="date" id="form" name="birthday" class="form-control" required /></td>
                                </tr>
                                <tr>
                                	 <td align="center"><span style=" margin-left:-5px;">Mobile</span> <input type="text" id="form" name="mobile" class="form-control" required /></td>
                                </tr>
                                <tr>
                                	<td align="center"><span style=" margin-left:0px;">Email</span> <input type="email" id="form" name="email" class="form-control" required /></td>
                                </tr>
                                <tr>
                                	<td align="center"><span style=" margin-left:-25px;">Password</span> <input type="password" id="form" name="password" class="form-control" required /></td>
                                </tr>
                                <tr>
                                	<td align="center"><span style=" margin-left:-8px;">Picture</span> <input type="file" id="form" name="image" class="form-control" required /></td>
                                </tr>
                                <tr>
                                	<td align="center"><button style=" margin-left:-150px; color:#FFFFFF; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="submit">Add Admin</button></td>
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