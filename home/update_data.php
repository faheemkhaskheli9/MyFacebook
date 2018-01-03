<?php
session_start();
include('../includes/connect.php');
$u_id 	= $_SESSION['user']['uid'];
$status	= mysqli_real_escape_string($con,$_GET['status']);
$dept	= mysqli_real_escape_string($con,$_GET['dept']);
$batch	= mysqli_real_escape_string($con,$_GET['batch']);
$rollno	= mysqli_real_escape_string($con,$_GET['rollno']);
mysqli_query($con,"UPDATE user SET status = '$status' WHERE u_id = $u_id");
if ($status == 'Student')
	{
	$result = mysqli_query($con,"SELECT dept_id FROM departments WHERE dept_short = '$dept'");
	$row = mysqli_fetch_array($result);
	$dept = $row['dept_id'];
	mysqli_query($con,"INSERT INTO students (department,batch,rollnumber,u_id) VALUES($dept,$batch,$rollno,$u_id)");
	}
?>