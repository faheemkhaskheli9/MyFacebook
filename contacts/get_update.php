<?php
session_start();
if (isset($_SESSION['user']['uid']))
	{
	include_once('../includes/connect.php');
	$uid	= mysqli_real_escape_string($con,$_GET['uid']);
	$time = time();
	$f_result = mysqli_query($con,"SELECT * FROM follower WHERE u_id = ".$_SESSION['user']['uid']." AND f_id = $uid");
	$f_count = mysqli_num_rows($f_result);
	if ($f_count == 0)
		mysqli_query($con,"INSERT INTO follower (u_id,f_id,follow_date) VALUES(".$_SESSION['user']['uid'].",$uid,$time)");
	else
		mysqli_query($con,"UPDATE follower SET hide = 0 WHERE u_id = ".$_SESSION['user']['uid']." AND f_id = ".$uid);
	mysqli_close($con);
	}
?>
<div class="button" style="display:inline-block;background-color:#00CC00" onclick="stop_update('<?php echo $uid;?>')">Following</div>