<?php
include '../includes/connect.php';
include_once('../includes/Time_Passed.php');
session_start();
if (isset($_SESSION['user']['uid']) && isset($_GET['post_id']))
	{
	$uid				=	$_SESSION['user']['uid'];
	$post_id			=	$_GET['post_id'];
	$condition = " WHERE post_id = $post_id";
	if (isset($_GET['last_comment_id']))
		{
		$last_comment_id	=	$_GET['last_comment_id'];
		$condition .= " AND c_id < $last_comment_id ";
		}
	$comment_result = mysqli_query($con,"SELECT * FROM comments $condition ORDER BY c_id DESC LIMIT 10");
	while ($row = mysqli_fetch_array($comment_result))
		{
		$user_result = mysqli_query($con,"SELECT * FROM user WHERE u_id = ".$row['u_id']);
		$u_row = mysqli_fetch_array($user_result);

		$comment_user_id			=	$u_row['u_id'];
		$comment_user_dp			=	$u_row['display_image'];
		$comment_user_first_name	=	ucfirst($u_row['firstname']);
		$comment_user_last_name		=	ucfirst($u_row['lastname']);
		$comment					=	$row['comment'];
		$comment_time				=	humanTiming($row['time']);
		include'../template/comment.php';
		
		$last_comment_id = $row['c_id'];
		}
		echo '<div onclick="show_more_comments('.$post_id.','.$last_comment_id.')" id="'.$post_id.'_'.$last_comment_id.'_show_more_comments_button">Show More</div>';
	}
?>