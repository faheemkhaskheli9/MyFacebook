<?php
session_start();
include_once('../includes/connect.php');
$uid		= $_SESSION['user']['uid'];
$answer	= mysqli_real_escape_string($con,$_POST['answer']);
$qid	= mysqli_real_escape_string($con,$_POST['qid']);
$time		= time();
if (validatePost($answer))
{
	mysqli_query($con,"INSERT INTO answers (posted_by,answer,q_id,time) VALUES('$uid','$answer','$qid','$time') ");
	echo '<h3>Your Answer Was Posted</h3>';
	echo mysqli_error($con);
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