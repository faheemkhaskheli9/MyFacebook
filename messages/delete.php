<?php
include '../include/connect.php';
session_start();
$uid				=	$_SESSION['user']['uid'];
$mid				=	mysqli_real_escape_string($con,$_POST['message_id']);

$message_to_hide	=	mysqli_query($con,"SELECT * FROM messages WHERE msg_id='$mid'");
$row				=	mysqli_fetch_array($message_to_hide);
$hide = $row['hide'];
if ( $row['sender']			==	$uid )
	{
	$hide = $hide + 1;
	}
else if ( $row['receiver']	==	$uid )
	{
	$hide = $hide + 2;
	}
mysqli_query($con,"UPDATE messages SET hide = $hide WHERE msg_id='$mid'");
mysqli_close($con);
?>