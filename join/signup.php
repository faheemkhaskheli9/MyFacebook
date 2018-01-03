<?php
session_start();
include_once('../includes/connect.php');
$firstname	= mysqli_real_escape_string($con,strtolower($_POST['firstname']));
$lastname	= mysqli_real_escape_string($con,strtolower($_POST['lastname']));
$email		= mysqli_real_escape_string($con,strtolower($_POST['email']));
$password	= mysqli_real_escape_string($con,$_POST['password']);
$repass		= mysqli_real_escape_string($con,$_POST['repass']);

require_once('../includes/recaptchalib.php');
if ($_POST["recaptcha_response_field"]) 
	{
	$privatekey = "6LdwbPcSAAAAAFoXx6i7DsjWtj7TjYSABomS5kcF";
  	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  	if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
	$_SESSION['error']['name'] = "Error: Wrong reCAPTCHA !!!";
	$_SESSION['error']['description']	= "The reCAPTCHA wasn't entered correctly. Go back and try it again."."(reCAPTCHA said: " . $resp->error . ")";
    header("Location: ../?page=account");
    exit();
    //die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
    //     "(reCAPTCHA said: " . $resp->error . ")");
  	}
}
else
{
	$_SESSION['error']['name'] = "Error: Wrong reCAPTCHA !!!";
	$_SESSION['error']['description']	= "The reCAPTCHA wasn't entered Correctly. You Cannot Leave reCAPTCHA empty.";
header("Location: ../?page=account");
    exit();
}

if (validatePassword($password,$repass) && validateFirstname($firstname) && validateLastname($lastname) && validateEmail($email))
{
	mysqli_query($con,"INSERT INTO user (firstname,lastname,email,password) VALUES('$firstname','$lastname','$email','$password') ");
	$result = mysqli_query($con,"SELECT u_id FROM user WHERE email = '$email' AND password = '$password'");
	$row = mysqli_fetch_array($result);
	$_SESSION['user']['uid']			= $row['u_id'];
	$_SESSION['user']['firstname'] 		= $firstname;
	$_SESSION['user']['lastname'] 		= $lastname;
	$_SESSION['user']['email'] 			= $email;
	$_SESSION['user']['display_image'] 	= '../images/icons/default_image.png';
	$_SESSION['message']['name'] = "Congratulation !!!<br/>Your Account Is Successfully Created";
	$_SESSION['message']['description'] = "You are Succesfully Logged in.";
}
else
	{
    header("Location: ../?page=account");	
	exit();
	}

mysqli_close($con);
header('Location: ../updates');
	
function validateFirstname($name)
	{
	if ($name == '')
		{
		$_SESSION['error']['name'] = "Error: Firstname Cannot be Empty !!!";
		$_SESSION['error']['description']	= "";
		return false;
		}
	return true;
	}
function validateLastname($name)
	{
	if ($name == '')
		{
		$_SESSION['error']['name'] = "Error: Lastname Cannot be Empty !!!";
		$_SESSION['error']['description']	= "";
		return false;
		}
	return true;
	}
function validateEmail($email)
	{
	if ($email == '')
		{
		$_SESSION['error']['name'] = "Error: Email Cannot be Empty !!!";
		$_SESSION['error']['description']	= "";
		return false;
		}
	$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email'");
	$count	= mysqli_num_rows($result);
	if ($count == 1)
		{
		$_SESSION['error']['name'] = "Error: Email Already Exist In Our Database !!!";
		$_SESSION['error']['description']	= "";
		return false;
		}
	return true;
	}
function validatePassword($pass,$repass)
	{
	if ($pass != $repass)
		{
		$_SESSION['error']['name'] = "Error: Password Donot Match!!!";
		$_SESSION['error']['description']	= "";		
		return false;
		}
	return true;
	}
?>