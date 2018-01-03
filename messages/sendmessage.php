<?php
session_start();
include '../includes/connect.php';
include '../includes/Time_Passed.php';
include 'include_message.php';
$receiver		=	mysqli_real_escape_string($con,$_POST['message_receiver']);
$message		=	mysqli_real_escape_string($con,$_POST['message']);
$time			=	time();
if ( $receiver != '' )
	{
	mysqli_query($con,"UPDATE messages SET is_read = 1 WHERE is_read = 0");
	mysqli_query($con,"INSERT INTO messages (sender,receiver,msg,time) VALUES('".$_SESSION['user']['uid']."','$receiver','$message','$time')");
	$new_message	=	mysqli_query($con,"SELECT * FROM messages WHERE is_read = 0 AND sender = '".$_SESSION['user']['uid']."' AND receiver = '$receiver.'");
	$row			=	mysqli_fetch_array($new_message);
	$other_person 	= 	mysqli_query($con,"SELECT * FROM user WHERE u_id = '$receiver'");
	$other_person	=	mysqli_fetch_array($other_person);
	show_message($row,$other_person);
	mysqli_query($con,"INSERT INTO notification (sender,receiver,detail,time) VALUES('".$_SESSION['user']['uid']."','$receiver','New Message','$time')");
	}			
mysqli_close($con);
?>