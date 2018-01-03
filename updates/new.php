<?php
session_start();
include_once('../includes/connect.php');
include_once('../includes/Time_Passed.php');
$uid		= $_SESSION['user']['uid'];
$posts		= mysqli_real_escape_string($con,$_POST['post']);
$loc		= mysqli_real_escape_string($con,$_POST['type']);
$loc_id		= mysqli_real_escape_string($con,$_POST['loc_id']);
$time		= time();
if (validatePost($posts))
{
	mysqli_query($con,"INSERT INTO posts (u_id,post,time,loc,loc_id) VALUES('$uid','$posts','$time','$loc','$loc_id') ");	
	
	$post_result = mysqli_query($con,"SELECT * FROM posts WHERE u_id = '".$uid."' AND time = '".$time."'");
	$rows = mysqli_fetch_array($post_result);

	$user_result = mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $uid);
	$u_row = mysqli_fetch_array($user_result);
	$post['id'] 			= $rows['post_id'];
	$post['post'] 			= $posts;
	$post['time'] 			= ($time-1);
	$users['id'] 			= $uid;
	$users['firstname'] 	= $u_row['firstname'];
	$users['lastname'] 		= $u_row['lastname'];
	$users['display_image'] = $u_row['display_image'];
	include('../template/post.php');
		
	?>
    
    <?php
	
	mysqli_close($con);
}
function validatePost($post)
	{
	if (trim($post) == '' || trim($post,'<br>') == '' || $post == null || $post == ' ' || strlen($post) < 1)
		{
		return false;
		}
	return true;
	}
?>