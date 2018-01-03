<?php
include_once('../includes/connect.php');
include_once('../includes/Time_Passed.php');
$pid	=	mysqli_real_escape_string($con,$_POST['pid']);
$last_post_id = $pid;
session_start();
$uid	=	mysqli_real_escape_string($con,$_POST['uid']);

if ($pid != 0)
$q = "AND post_id < ".$last_post_id;
else
$q = '';
$post_result = mysqli_query($con,"SELECT * FROM posts WHERE u_id = '$uid' ".$q." ORDER BY time DESC LIMIT 10");

	$user_result = mysqli_query($con,"SELECT * FROM user WHERE u_id = '$uid'");
	$u_row = mysqli_fetch_array($user_result);

	$users['id'] 			= $u_row['u_id'];
	$users['firstname'] 	= $u_row['firstname'];
	$users['lastname'] 		= $u_row['lastname'];
	$users['display_image'] = $u_row['display_image'];
	
while($rows = mysqli_fetch_array($post_result))
	{
	$post['id'] 			= $rows['post_id'];
	$last_post_id 			= $rows['post_id'];
	$post['post'] 			= $rows['post'];
	$post['time'] 			= $rows['time'];
	include('../template/post.php');
?>
	<?php
	}
	?>
<div id="show_more_div">
<input type="hidden" id="last_post_id" value="<?php echo $last_post_id;?>">
<div onClick="show_more()">Show More</div>
</div>