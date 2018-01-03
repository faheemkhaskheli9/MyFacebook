<?php
session_start();
include_once('../includes/connect.php');
$uid		= $_SESSION['user']['uid'];
$msg		= mysqli_real_escape_string($con,$_POST['message']);
$receiver	= mysqli_real_escape_string($con,$_POST['u_id']);
$time		= time();
if (validatePost($msg))
{
	mysqli_query($con,"INSERT INTO messages (msg,sender,receiver,time) VALUES('$msg','$uid','$receiver','$time') ");
	echo '<h3>Message Send</h3>';
	mysqli_close($con);
}
else
	echo '<h3>Error!!! <br/>Please Try Again</h3>';
function validatePost($post)
	{
	if (trim($post) == '' || trim($post,'<br>') == '' || $post == null || $post == ' ')
		{
		return false;
		}
	return true;
	}
?>