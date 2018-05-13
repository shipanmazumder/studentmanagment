<?php
	require_once("../db.php");
	 if(isset($_GET['student_id'])){
       $student_id=$_GET['student_id'];
	   $delete=mysql_query("DELETE FROM student WHERE student_id='$student_id'");
	   if($delete){
		   header('location:student.php');
	   }
    }
	if(isset($_GET['teacher_id'])){
       $teacher_id=$_GET['teacher_id'];
	   $delete=mysql_query("DELETE FROM teacher WHERE teacher_id='$teacher_id'");
	   if($delete){
		   header('location:teacher.php');
	   }
    }
	if(isset($_GET['subject_id'])){
       $subject_id=$_GET['subject_id'];
	   $delete=mysql_query("DELETE FROM subject WHERE subject_id='$subject_id'");
	   if($delete){
		   header('location:onesub.php');
	   }
    }
	if(isset($_GET['routine_id'])){
		$routine_id = explode(",", $_GET["routine_id"]);
	   $delete=mysql_query("DELETE FROM class_routine WHERE routine_id='$routine_id[0]'");
	   if($delete){
		   if($routine_id[1]=="One"){
		   header('location:croutine.php');
		   }
		    if($routine_id[1]=="Two"){
		   header('location:routineTwo.php');
		   }
		    if($routine_id[1]=="Three"){
		   header('location:routinethree.php');
		   }
		    if($routine_id[1]=="Four"){
		   header('location:routinefour.php');
		   }
		    if($routine_id[1]=="Five"){
		   header('location:routinefive.php');
		   }
	   }
    }
	if(isset($_GET['payment_id'])){
       $payment_id=$_GET['payment_id'];
	   $delete=mysql_query("DELETE FROM payment WHERE payment_id='$payment_id'");
	   if($delete){
		   header('location:showpayment.php');
	   }
    }
	if(isset($_GET['notice_id'])){
       $notice_id=$_GET['notice_id'];
	   $delete=mysql_query("DELETE FROM notice WHERE notice_id='$notice_id'");
	   if($delete){
		   header('location:tnoticbord.php');
	   }
    }
	
?>