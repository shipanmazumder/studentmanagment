<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	$eamil=$_SESSION['aemail'];
	require_once("../db.php");
	$result=mysql_query("SELECT * FROM admin WHERE aemail='$eamil'");
	$row=mysql_fetch_array($result);
	if(isset($_FILES['image']))
    {
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
        if($update=mysql_query("Update admin set photo='$file_name'  WHERE aemail='$eamil' ")){
            header("location:adminpro.php");
        }
    } 
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$address=$_POST['address'];
		$birthday=$_POST['birthday'];
		$gender=$_POST['gender'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		if($update=mysql_query("Update admin set  name='$name',address='$address',birthday='$birthday',gender='$gender', mobile='$mobile',aemail='$eamil'  WHERE aemail='$eamil' ")){
            header("location:adminpro.php");
        }
	}
	if(isset($_POST['password'])){
		$oldpassword=md5($_POST['oldpassword']);
		$newpassword=md5($_POST['newpassword']);
		$confrim = md5($_POST['repassword']);
		$res=mysql_query("SELECT * FROM admin WHERE aemail='$eamil' ");
		$rows=mysql_fetch_array($res);
		if($oldpassword==$rows['password']){
			if($newpassword != $confrim)
			{?>
				<script> alert('Password did not matched');</script>
                <?php
			}
			else{
				if($update=mysql_query("Update admin set password='$newpassword' WHERE aemail='$eamil' ")){
					header("location:adminpro.php");
				}
        	}
		}
		else
		{?>
			<script> alert("It's Not Old Password");</script>
			<?php
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
  	<div class="main3">
  	<?php require_once("rightsidebar3.php"); ?>
        <div class="left_sidebar">
        	<?php  require_once("header.php")?>
            <div class="content3">
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Admin</span><a href="addadmin.php" class="btn btn-default" style="float:right; margin:3px 20px 0px 0px; background-color:#2D2D2D; color:#FFFFFF;"><span class="glyphicon glyphicon-plus-sign"></span> Add Admin</a>
                	<div class="a_student">
                    	<form class="form-inline" method="POST" >
                            <table  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><span class="glyphicon glyphicon-plus-sign"></span> Edit Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">Name <input type="text" name="name" id="form" value="<?php echo $row['name']; ?>"  class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td align="center"><span style=" margin-left:-12px;">Birthday</span> <input type="text" value="<?php echo $row['birthday']; ?>" id="form" name="birthday" class="form-control" required /></td>
                                </tr>
                                <tr>
                                	<td align="center"><span style=" margin-left:-10px;">Gender</span> <input type="text" value="<?php echo $row['gender']; ?>" id="form" name="gender" class="form-control" required /></td>
                                </tr>
                                <tr>
                                	<td align="center"><span style=" margin-left:-12px;">Address</span> <textarea style="resize:none;" id="form" name="address" class="form-control" required ><?php echo $row['address']; ?></textarea></td>
                                </tr>
                                <tr>
                                	 <td align="center"><span style=" margin-left:-5px;">Mobile</span> <input type="text" value="<?php echo $row['mobile']; ?>" id="form" name="mobile" class="form-control" required /></td>
                                </tr>
                                <tr>
                                	<td align="center"><span style=" margin-left:0px;">Email</span> <input type="email" value="<?php echo $row['aemail']; ?>" id="form" name="email" class="form-control" required /></td>
                                </tr>
                                 <tr>
                               	<td align="center"><button style=" margin-left:-130px; color:#FFFFFF; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="submit">Save Changes</button></td>
                                </tr>
                               </tbody>
                               </table>
                               </form>
                               <form class="form-inline" method="POST">
                                   <table class="table table-bordered">
                                   	<tr class="tr_b">
                                    	<td align="center">Change Password</td>
                                    </tr>
                                    <tr>
                                    <td align="center"><span style=" margin-left:-25px;">Old Password</span> <input type="password" id="form" name="oldpassword" class="form-control" required /></td>
                                </tr>
                                 <tr>
                                    <td align="center"><span style=" margin-left:-30px;">New Password</span> <input type="password" id="form" name="newpassword" class="form-control" required /></td>
                                </tr>
                                 <tr>
                                    <td align="center"><span style=" margin-left:-55px;">Confrim Password</span> <input type="password" id="form" name="repassword" class="form-control" required /></td>
                                </tr>
                                 <tr>
                               <td align="center"><button style=" margin-left:-130px; color:#FFFFFF; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="password">Save Changes</button></td>
                                </tr>
                                   </table>
                               </form>
                              </form>
                              <form method="POST" class="form-inline" enctype="multipart/form-data">
                              <table class="table table-bordered">
                              <tr class="tr_b">
                              	<td align="center">Change Picture</td>
                              </tr>
                                <tr>
                                	<td align="center"><?php  echo '<img class="f_img" src="upload/'.$row['photo'].'">'; ?> </td>
                                </tr>
                                <tr>
                                	<td align="center"><span style=" margin-left:-8px;">Picture</span> <input type="file" value="<?php echo $row['picture']; ?>" id="form" name="image" class="form-control" required /></td>
                                </tr>
                                <tr>
                                	<td align="center"><button style=" margin-left:-130px; color:#FFFFFF; background-color:#21A9E1; " type="submit" class=" btn btn-default">Save Changes</button></td>
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