<?php
include '../includes/connect.php';
include_once('../includes/Time_Passed.php');
session_start();
if (isset($_SESSION['user']['uid']) && isset($_GET['post_id']))
	{
	$uid		=	$_SESSION['user']['uid'];
	$post_id	=	$_GET['post_id'];
	$comment	=	mysqli_real_escape_string($con,$_GET['comment']);
	$time		=	time();
	
	mysqli_query($con,"INSERT INTO comments(u_id,post_id,comment,time) VALUES($uid,$post_id,'$comment',$time)");
	
	$comment_user_id			=	$uid;
	$comment_user_dp			=	$_SESSION['user']['display_image'];
	$comment_user_first_name	=	ucfirst($_SESSION['user']['firstname']);
	$comment_user_last_name		=	ucfirst($_SESSION['user']['lastname']);
	$comment					=	$comment;
	$comment_time				=	humanTiming($time);
	include'../template/comment.php';
		
	}
?>