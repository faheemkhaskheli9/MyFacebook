<?php
session_start();
if (isset($_SESSION['user']['uid']))
	{
	include_once('../includes/connect.php');
	$uid	= mysqli_real_escape_string($con,$_GET['uid']);
	$time = time();
	mysqli_query($con,"UPDATE follower SET hide = 1 WHERE u_id = ".$_SESSION['user']['uid']." AND f_id = ".$uid);
	mysqli_close($con);
	}
?><div class="button" style="display:inline-block;" onclick="get_update('<?php echo $uid;?>')">Follow</div>