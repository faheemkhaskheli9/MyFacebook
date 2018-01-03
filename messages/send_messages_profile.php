<?php
include '../includes/connect.php';
include '../includes/Time_Passed.php';
include 'include_messages.php';
$reciever		=	mysqli_real_escape_string($con,$_POST['message_reciever']);
$message		=	mysqli_real_escape_string($con,$_POST['message']);
$time			=	time();
if ( $reciever != '' )
	{
	mysqli_query($con,"INSERT INTO messages (sender,receiver,msg,time) VALUES('".$_SESSION['user']['uid']."','$reciever','$message','$time')");
	}
mysqli_close($con);
?>