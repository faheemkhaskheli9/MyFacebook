<?php
session_start();
include('../includes/connect.php');
if (isset($_POST['ans_id']))
	$ans_id = $_POST['ans_id'];
if (isset($_POST['ques_id']))
	$ques_id = $_POST['ques_id'];
if (isset($_SESSION['user']['uid']))
	$uid = $_SESSION['user']['uid'];
if ($ans_id > 0 && $ques_id > 0)
	{
	mysqli_query($con,"UPDATE questions SET best_answer = '$ans_id' , status = 'Answered' WHERE posted_by = '$uid' AND q_id = '$ques_id'");
	echo '<div id="selected">Selected Answer</div>';
	}
else
	{
	}
?>