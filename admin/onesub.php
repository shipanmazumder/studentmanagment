<?php
	session_start();
	if(!$_SESSION['aemail'])
	{
		header("location:../index.php");
	}
	require_once('../db.php');
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
        	<?php  require_once("header.php")?>
            <div class="content">
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Subject</span><a href="addsub.php" class="btn btn-default" style="float:right; margin:3px 20px 0px 0px; background-color:#2D2D2D; color:#FFFFFF;"><span class="glyphicon glyphicon-plus-sign"></span> Add New Subject</a>
                	<div class="t_routine">
                    	<table class="table table-bordered">
                    	<thead>
                        	<tr class="tr_b">
                            	<th>Class</th>
                                <th>Subject Name</th>
                                <th>Section</th>
                                <th>Teacher</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
							$result=mysql_query("SELECT * FROM subject");
							while($row=mysql_fetch_array($result)){
								echo '<tr>
										<td class="td2">'.$row['class'].'</td>
										<td class="td2">'.$row['name'].'</td>
										<td class="td2">'.$row['section'].'</td>
										<td class="td2">'.$row['teacher'].'</td>
										<td>
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">';?>
                                                <li><a href="editsub.php?subject_id=<?php echo $row['subject_id'];?>"><span  class="glyphicon glyphicon-edit"></span> Edit </a></li>
                                                <li><a href="delete.php?subject_id=<?php echo $row['subject_id'];?>" onclick="return confirm('Are you want to delete this record?'); "><span  class="glyphicon glyphicon-trash"></span> Delete</a></li>
                                              </ul>
                                        	</div>
                                        </td><?php
								echo  '</tr>';	
							}
						?>
                        </tbody>
                    </table>
                    </div>
                
            </div>
            <?php require_once("footer.php"); ?>
        </div>
    </div>	
  </body>
</html>