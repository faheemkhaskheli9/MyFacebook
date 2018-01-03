<?php
session_start();

$uid			= $_SESSION['user']['uid'];
$gender			= mysqli_real_escape_string($con,$_POST['gender']);
$dob_day		= mysqli_real_escape_string($con,$_POST['dob_day']);
$dob_mon		= mysqli_real_escape_string($con,$_POST['dob_mon']);
$dob_yrs		= mysqli_real_escape_string($con,$_POST['dob_yrs']);
$home_town		= mysqli_real_escape_string($con,$_POST['home_town']);
$relationship	= mysqli_real_escape_string($con,$_POST['relationship']);
$phone_number	= mysqli_real_escape_string($con,$_POST['phone_number']);
$email			= mysqli_real_escape_string($con,$_POST['email']);

include_once('../includes/connect.php');
mysqli_query($con,"UPDATE user SET gender = '$gender' , dob_day = '$dob_day' , dob_mon = '$dob_mon' , dob_yrs = '$dob_yrs' ,home_town = '$home_town' , relationship = '$relationship' , phone_number = '$phone_number' , email = '$email' WHERE u_id = '$uid'");
mysqli_close($con);
?>