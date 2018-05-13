<div class="header_area">
            	<div class="h_top">
                	<p class="s">Student Management System</p>
                </div>
                <div class="h_bottom">
                	<span style="padding:10px; font-weight:bold; display:block; float:left;">Running Year: <?php echo date("Y"); ?></span>
                    <span style="padding:7px; font-weight:bold; display:block; float:left;">Time:&nbsp;<span > <?php date_default_timezone_set('Asia/Dhaka'); echo date("h:i:s a");?></span></span>
                    <span style="float:right; margin-right:20px; ">
                    	<a  style="margin-right:10px; color:#000000;" href="sprofile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['name']; ?></a>
                         <a style=" color:#000000;" href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                     </span>
                </div>
            </div>