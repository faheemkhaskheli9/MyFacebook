<?php
include '../includes/connect.php';
session_start();
if (isset($_SESSION['user']['uid']) && isset($_GET['post_id']))
	{
	$uid		=	$_SESSION['user']['uid'];
	$post_id	=	$_GET['post_id'];
	$time		=	time();
	
	mysqli_query($con,"INSERT INTO like_post(u_id,post_id,time) VALUES($uid,$post_id,$time)");
	
	$result = mysqli_query($con,"SELECT * FROM like_post WHERE post_id = $post_id");
	
	echo '<span id="'. $post_id.'likes" class="likes_counts">'.mysqli_num_rows($result).'</span>
	<span onclick="unlikethis(\''.$post_id.'\',\'post\')" class="unlike_button">Unlike</span>';
	}
elseif (isset($_SESSION['user']['uid']) && isset($_GET['img_id']))
	{
	$uid		=	$_SESSION['user']['uid'];
	$img_id	=	$_GET['img_id'];
	$time		=	time();
	
	mysqli_query($con,"INSERT INTO image_like(u_id,img_id,time) VALUES($uid,$img_id,$time)");
	
	$result = mysqli_query($con,"SELECT * FROM image_like WHERE img_id = $img_id");
	
	echo '<span id="'. $img_id.'likes" class="likes_counts">'.mysqli_num_rows($result).'</span>
	<span onclick="unlikethis(\''.$img_id.'\',\'img\')" class="unlike_button">Unlike</span>';
	}
elseif (isset($_SESSION['user']['uid']) && isset($_GET['comment_id']))
	{
	$uid		=	$_SESSION['user']['uid'];
	$c_id		=	$_GET['comment_id'];
	$time		=	time();
	
	mysqli_query($con,"INSERT INTO like_comment(u_id,c_id,time) VALUES($uid,$c_id,$time)");
	
	$result = mysqli_query($con,"SELECT * FROM like_comment WHERE c_id = $c_id");
	
	echo '<span id="'. $c_id.'likes_comment" class="likes_counts">'.mysqli_num_rows($result).'</span>
	<span onclick="unlikethis(\''.$post_id.'\',\'comment\')" class="unlike_button">Unlike</span>';
	}
?>