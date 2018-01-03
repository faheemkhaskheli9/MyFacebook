<?php
session_start();
if (isset($_SESSION['user']['uid']))
	{
	include_once('../includes/connect.php');
	$id	=	mysqli_real_escape_string($con,$_POST['uid']);
	$user_id	=	$_SESSION['user']['uid'];
	$friend_result = mysqli_query($con,"SELECT * FROM contacts WHERE (user_Id = '$id' AND target_id = '$user_id') OR (user_Id = '$user_id' AND target_id = '$id') ");
	$is_friend = mysqli_num_rows($friend_result);
	if ($is_friend == 1)
		{
		$time = time();
		mysqli_query($con,"UPDATE contacts SET hide = '1' WHERE (user_Id = '$id' AND target_id = '$user_id') OR (user_Id = '$user_id' AND target_id = '$id')");
		}
	}
?>
<tr><td id="contacts_button_<?php echo $id;?>"><div class="button" style="color:#FFFFFF; background-color:#00FF00;" onClick="add_to_contact('<?php echo $id;?>')">Add to Contact</div></td></tr>