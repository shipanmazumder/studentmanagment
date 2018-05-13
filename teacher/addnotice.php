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
            	<span class="t_d"><span class="glyphicon glyphicon-tasks"></span> Manage Notice</span>
                	<div class="t_routine">
                    	<form class="form-inline">
                            <table  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><span class="glyphicon glyphicon-plus-sign"></span> Add Notice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">Title <input type="text" name="name" id="form"  class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td align="center">Notice <textarea id="form" name="class"  class="form-control" required ></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">Date <input type="date" name="name" id="form"  class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td align="center"><span style="padding:0px; margin-left:-15px;">Send TO</span> <select id="form" name="section"  class="form-control" required >
                                    	<option value="all">All</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="student">Student</option>
                                        </select>
                                    </td>
                                 </tr>
                                 <tr>
                                	<td align="center"><button style=" margin-left:-145px; color:#FFFFFF; background-color:#21A9E1; " type="submit" class=" btn btn-default" name="submit">Add Subject</button></td>
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