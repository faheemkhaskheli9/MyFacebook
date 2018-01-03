<?php
include '../includes/connect.php';
include '../includes/Time_Passed.php';

session_start();
$uid		=	$_SESSION['user']['uid'];
$result		= mysqli_query($con,"SELECT * FROM notification WHERE seen IN (0,1,2,3) AND receiver = " . $uid);
$count		=	mysqli_num_rows($result);
echo '<div id="complete_notification_preview_box">
Notifications
<hr style="color:gray"/>
<div id="preview_body">
';
while ($row	= mysqli_fetch_array($result))
	{
	$sender_result		= mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $row['sender'] );
	$rows			=	mysqli_fetch_array($sender_result);
	$nid		= $row['notify_id'];
	$dp			= $rows['display_image'];
	$fn			= $rows['firstname'];
	$ln			= $rows['lastname'];
	$detail		= $row['detail'];
	$time_passed	=	humanTiming($row['time']);
	echo "<table class=\"notification_preview_inner\" id=\"notifiction_preview_$nid\" onclick=\"remove_notification('notifiction_preview_$nid')\" title=\"About $time_passed Ago\">	
	<tr>
		<td height=\"35\"><img src=\" $dp \" width=\"30\" height=\"30\"></td>
		<td>$fn $ln </td></tr>
		<tr><td></td><td> $detail </td>
	</tr>
	</table>
	<hr style='color:gray'/>
	";
	$seen = $row['seen'] + 4;
	mysqli_query($con,"UPDATE notification SET seen = '4' WHERE notify_id = " . $nid);
	}
echo '</div><a href="../messages/">See All</a></div>';
mysqli_close($con);
?>