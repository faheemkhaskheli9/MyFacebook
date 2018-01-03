<?php
include '../includes/connect.php';
session_start();
if (isset($_GET['type']))
	$type = mysqli_real_escape_string($con,$_GET['type']);
if (isset($_GET['type']))
	$unique_id = mysqli_real_escape_string($con,$_GET['id']);
if (isset($_SESSION['user']['uid']) && $type = 'answer' && $unique_id > 0)
	{
	$uid		=	$_SESSION['user']['uid'];
	$ans_id		=	$unique_id;
	$vote		=	mysqli_real_escape_string($con,$_GET['vote']);
	$time		=	time();
	
	$result = mysqli_query($con,"SELECT * FROM answer_vote WHERE u_id = '$uid' AND ans_id = '$ans_id'");
	$counts = mysqli_num_rows($result);
	if ($counts == 1)
		mysqli_query($con,"UPDATE answer_vote SET vote = '$vote', time = '$time' WHERE u_id = '$uid' AND ans_id = '$ans_id'");
	else
		mysqli_query($con,"INSERT INTO answer_vote(u_id,ans_id,vote,time) VALUES($uid,$ans_id,'$vote',$time)");
		echo mysqli_error($con);
	}
elseif (isset($_SESSION['user']['uid']) && $type = 'question' && $unique_id > 0)
	{
	$uid		=	mysqli_real_escape_string($con,$_SESSION['user']['uid']);
	$ques_id	=	$unique_id;
	$vote		=	mysqli_real_escape_string($con,$_GET['vote']);
	$time		=	time();
	
	$result = mysqli_query($con,"SELECT * FROM question_vote WHERE u_id = '$uid' AND ques_id = '$ques_id'");
	$counts = mysqli_num_rows($result);
	if ($counts == 0)
		mysqli_query($con,"INSERT INTO question_vote(u_id,ques_id,vote,time) VALUES($uid,$ques_id,'$vote',$time)");
	else if ($counts == 1)
		mysqli_query($con,"UPDATE question_vote SET vote = '$vote', time = '$time' WHERE u_id = '$uid' AND ques_id = '$ques_id'");
	}
include('get_votes.php');
?>