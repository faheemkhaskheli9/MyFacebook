<?php
session_start();
include_once('../includes/connect.php');
$email		= mysqli_real_escape_string($con,strtolower($_POST['email']));
$password	= mysqli_real_escape_string($con,$_POST['password']);
$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email' AND password = '$password' ");
$count	= mysqli_num_rows($result);
if ($count == 1)
	{
	$row = mysqli_fetch_array($result);
	$_SESSION['user']['uid'] 			= $row['u_id'];
	$_SESSION['user']['role'] 			= $row['role'];
	$_SESSION['user']['status'] 		= $row['status'];
	$_SESSION['user']['firstname'] 		= $row['firstname'];
	$_SESSION['user']['lastname'] 		= $row['lastname'];
	$_SESSION['user']['email'] 			= $row['email'];
	$_SESSION['user']['display_image'] 	= $row['display_image'];
	$u_id = $row['u_id'];
	if ($_SESSION['user']['status'] == 'Student')
		{
		$result_2 = mysqli_query($con,"SELECT * FROM students WHERE u_id = $u_id ");
		$row_2	= mysqli_fetch_array($result_2);
		$_SESSION['user']['batch'] 			= $row_2['batch'];
		$_SESSION['user']['department'] 	= $row_2['department'];
		$_SESSION['user']['rollnumber'] 	= $row_2['rollnumber'];
		$_SESSION['user']['enrollmentno'] 	= $row_2['enrollmentno'];
		$_SESSION['user']['current_term'] 	= $row_2['current_term'];
		$_SESSION['user']['join_date'] 		= $row_2['join_date'];		
		}
	header('Location: ../updates');
	}
else
	{
	$_SESSION['error']['name'] = "Error: Wrong Email Or Password !!!";
	$_SESSION['error']['description']	= "ReEnter Your Email and Password." .
	header('Location: ../');
	}
mysqli_close($con);
?>