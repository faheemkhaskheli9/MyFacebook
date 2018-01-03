<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
include '../includes/connect.php';
include '../includes/Time_Passed.php';

session_start();
$uid		=	$_SESSION['user']['uid'];
$result		= mysqli_query($con,"SELECT * FROM notification WHERE is_read = 0 AND receiver = " . $uid ." AND detail = 'New Message'");
$count		=	mysqli_num_rows($result);
if ($count != 0)
	{
	echo "event: new_msg_counts\n";
	echo "data: <span>$count</span>\n\n";
	$row = mysqli_fetch_array($result);
	mysqli_query($con,"UPDATE notification SET seen = '1' WHERE notify_id = " . $row['notify_id']);	
	}
ob_flush();
flush();
retry(1000);
mysqli_close($con);
?>