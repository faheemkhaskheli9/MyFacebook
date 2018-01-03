<?php
session_start();
if (isset($_SESSION['user']['uid']))
	{
	include_once('../includes/connect.php');
	$uid	= mysqli_real_escape_string($con,$_POST['uid']);
	$user_id	=	$_SESSION['user']['uid'];
	$relation   = 'Acquaintance';
	$result = mysqli_query($con,"SELECT * FROM contacts WHERE user_Id = " . $_SESSION['user']['uid']." AND target_id = ". $uid." AND hide = 1");
	$count	= mysqli_num_rows($result);
	if ($count != 1)
		{
		$time = time();
		mysqli_query($con,"INSERT INTO contacts (user_Id,target_id,relation,add_date) VALUES('$user_id',$uid,'$relation',$time)");
		}
	else if ($count == 1)
		{
		mysqli_query($con,"UPDATE contacts SET hide = '0' WHERE (user_Id = '$uid' AND target_id = '$user_id') OR (user_Id = '$user_id' AND target_id = '$uid')");
		}
	mysqli_close($con);
	}
?>
<tr><td id="friend_button"><div class="sub_menu_icon" onClick="remove_friend('<?php echo $uid;?>')"><img src="../images/icons/remove5.png"><br/>Remove Friend</div></td></tr>