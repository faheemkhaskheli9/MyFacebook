<?php
session_start();
include_once('../includes/connect.php');
$uid		= $_SESSION['user']['uid'];
$title		= mysqli_real_escape_string($con,$_POST['question_title']);
$question	= mysqli_real_escape_string($con,$_POST['question']);
$time		= time();
if (validatePost($question) && validatePost($title))
{
	mysqli_query($con,"INSERT INTO questions (posted_by,title,question,time) VALUES('$uid','$title','$question','$time') ");
	echo '<h3>Your Question Was Posted</h3>';
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