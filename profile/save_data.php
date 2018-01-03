<?php
include('../config.php');
if (!isset($_SESSION['user']))
	header('Location: ../');
include_once('../includes/connect.php');
$uid = $_SESSION['user']['uid'];
$firstname		= mysqli_real_escape_string($con,$_POST['firstname']);
$lastname		= mysqli_real_escape_string($con,$_POST['lastname']);
$relation		= mysqli_real_escape_string($con,$_POST['relationship_value']);
$gender			= mysqli_real_escape_string($con,$_POST['gender_value']);
$hometown		= mysqli_real_escape_string($con,$_POST['home_town_value']);
$dob_day		= mysqli_real_escape_string($con,$_POST['dob_day_value']);
$dob_month		= mysqli_real_escape_string($con,$_POST['dob_mon_value']);
$dob_year		= mysqli_real_escape_string($con,$_POST['dob_yrs_value']);
$phonenumber		= mysqli_real_escape_string($con,$_POST['phonenumber']);
$email			= mysqli_real_escape_string($con,$_POST['email']);
$department		= mysqli_real_escape_string($con,$_POST['department']);
$batch			= mysqli_real_escape_string($con,$_POST['batch']);
$rollnumber		= mysqli_real_escape_string($con,$_POST['rollnumber']);
$enrollno		= mysqli_real_escape_string($con,$_POST['enrollno']);
$join_dob_day		= mysqli_real_escape_string($con,$_POST['join_day_value']);
$join_dob_month		= mysqli_real_escape_string($con,$_POST['join_mon_value']);
$join_dob_year		= mysqli_real_escape_string($con,$_POST['join_yrs_value']);

// select department id from db

$dept_id = '0';

if (validate_email($email) || validate_name($firstname,$lastname) || validate_gender($gender))
	{	
	mysqli_query($con,"UPDATE user  SET email = '$email' ,firstname = '$firstname' ,lastname = '$lastname' ,gender = '$gender' , dob_yrs ='$dob_year' , dob_mon = '$dob_month' ,dob_day = '$dob_day' ,home_town = '$hometown', relationship = '$relation' ,phone_number = '$phonenumber' WHERE u_id = '$uid'");
	
	mysqli_query($con,"UPDATE student SET department = '$department' , batch = '$batch', rollnumber = '$rollnumber' ,enrollmentno = '$enrollno'");
	
	$_SESSION['msg']['update']['name'] = 'Done';
	$_SESSION['msg']['update']['description'] = 'Your Profile Was Updated!!!';
	}
header('location: ./');

function validate_email($email)
	{
	if ($email == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'None';
		return false;
		}
	return true;
	}
function validate_name($firstname,$lastname)
	{
	if ($lastname == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'None';
		return false;
		}
	if ($firstname == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'None';
		return false;
		}
	return true;
	}
function validate_gender($gender)
	{
	if ($gender == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'None';
		return false;
		}
	if ($gender != 'Male' || $gender != 'Female')
		{
		$_SESSION['error']['update']['name'] = 'Unkown Gender';
		$_SESSION['error']['update']['description'] = 'Please Select Either Male/Female';
		return false;
		}
	return true;
	}
function validate_relationship($relationship)
	{
	if ($relationship == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'None';
		return false;
		}
	return true;
	}
function validate_hometown($hometown)
	{
	if ($hometown == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'None';
		return false;
		}
	return true;
	}
function validate_phoneno($phoneno)
	{
	if ($phoneno == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'Phone Number Cannot Be Empty';
		return false;
		}
	return true;
	}
function validate_department($department)
	{
	if ($department == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'Department Cannot Be Empty';
		return false;
		}
	return true;
	}
function validate_batch($batch)
	{
	if ($batch == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'Batch Cannot Be Empty';
		return false;
		}
	if ($batch < 0 || $batch > 99)
		{
		$_SESSION['error']['update']['name'] = 'Invalid Number';
		$_SESSION['error']['update']['description'] = 'Please Insert Your Batch ( 00-99 ) ';
		return false;
		}
	return true;
	}
function validate_rollno($rollno)
	{
	if ($rollno == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'None';
		return false;
		}
	if ($rollno < 1 || $rollno > 300)
		{
		$_SESSION['error']['update']['name'] = 'Invalid Number';
		$_SESSION['error']['update']['description'] = 'Please Insert Your Roll Number ( 01-299 ) ';
		return false;
		}
	return true;
	}
function validate_enrollno($enrollno)
	{
	if ($enrollno == '')
		{
		$_SESSION['error']['update']['name'] = 'Error';
		$_SESSION['error']['update']['description'] = 'Cannot Be Empty';
		return false;
		}
	return true;
	}
?>