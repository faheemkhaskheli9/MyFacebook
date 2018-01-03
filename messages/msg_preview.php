<?php
include '../includes/connect.php';
include '../includes/Time_Passed.php';

session_start();
$uid		=	$_SESSION['user']['uid'];
$result		= mysqli_query($con,"SELECT * FROM messages WHERE receiver = $uid OR sender = $uid");
$count		=	mysqli_num_rows($result);

$sender_result		= mysqli_query($con,"SELECT DISTINCT sender,receiver FROM messages WHERE receiver = $uid OR sender = $uid");

echo '<div id="complete_message_preview_box">
Messages
<hr style="color:gray"/>
<div id="preview_body">
';
$all_users = array();
if( $count != 0 )
	while($row			=	mysqli_fetch_array($sender_result))
		{
		$sender			=	$row['sender'];
		$reciever		=	$row['receiver'];
		if ($sender != $uid && !in_array($sender,$all_users))
			{
			array_push($all_users,$sender);
			$senders		=	mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $sender);
			$rows			=	mysqli_fetch_array($senders);
			$row1		= mysqli_fetch_array($result);
			$nid		= $row1['msg_id'];
			$dp			= $rows['display_image'];
			$fn			= $rows['firstname'];
			$ln			= $rows['lastname'];
	
			$result		= mysqli_query($con,"SELECT * FROM messages WHERE seen IN (0,1) AND sender = " . $sender ." OR receiver = " . $sender." ORDER BY msg_id DESC");
			$rowzz		= mysqli_fetch_array($result);
			$time_passed	=	humanTiming($rowzz['time']);
			$msg_id	= '';
			if ($rowzz['is_read'] == 0)
				$msg_id = 'unread';
			else
				$msg_id = 'read';
			echo "<table class=\"msg_preview_inner\" id=\"message_preview_$nid ".$msg_id."_messages\" onclick=\"remove_notification('message_preview_$nid')\" title=\"About $time_passed Ago\">
			<tr>
				<td height=\"50\" rowspan=\"3\"><img src=\" $dp \" width=\"50\" height=\"50\"></td>
				<td>".ucfirst($fn).' '.ucfirst($ln)."</td></tr>
				<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rowzz['msg']."</td>
				<tr><td> ".$time_passed." Ago</td>
			</tr>
			</table>
			<hr style='color:gray'/>
			";
			}
			/*
			$nids	= mysqli_query($con,"SELECT msg_id,seen FROM messages WHERE seen = 0 AND receiver = " . $uid ." AND sender = ".$sender." LIMIT 10");
			
			$q_id = '';
			while ($row = mysqli_fetch_array($nids))
				{
				if ($q_id == '')
				$q_id .= $row['notify_id'];
				else
				$q_id .= ','.$row['notify_id'];
				}
			mysqli_query($con,"UPDATE notification SET seen = '1' WHERE id IN (" . $q_id .")");
			*/
		else if ($reciever != $uid && !in_array($reciever,$all_users))
			{
			array_push($all_users,$reciever);
			$receivers		=	mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $reciever);
			$rows			=	mysqli_fetch_array($receivers);
			$row1		= mysqli_fetch_array($result);
			$nid		= $row1['msg_id'];
			$dp			= $rows['display_image'];
			$fn			= $rows['firstname'];
			$ln			= $rows['lastname'];
	
			$result		= mysqli_query($con,"SELECT * FROM messages WHERE seen IN (0,1) AND receiver = " . $reciever ." OR sender = " . $reciever." ORDER BY msg_id DESC");
			
			$rowzz		= mysqli_fetch_array($result);
			$time_passed	=	humanTiming($rowzz['time']);
			$msg_id	= '';
			if ($rowzz['is_read'] == 0)
				$msg_id = 'unread';
			else
				$msg_id = 'read';
			echo "<table class=\"msg_preview_inner\" id=\"message_preview_$nid ".$msg_id."_messages\" onclick=\"remove_notification('message_preview_$nid')\" title=\"About $time_passed Ago\">
			<tr>
				<td height=\"50\" rowspan=\"3\"><img src=\" $dp \" width=\"50\" height=\"50\"></td>
				<td>".ucfirst($fn).' '.ucfirst($ln)."</td></tr>
				<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rowzz['msg']."</td>
				<tr><td> ".$time_passed." Ago</td>
			</tr>
			</table>
			<hr style='color:gray'/>
			";	
			}
		}
echo '</div><a href="../messages/">Go To Messages</a></div>';
mysqli_close($con);
?>