<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
include '../includes/connect.php';
include '../includes/Time_Passed.php';

session_start();
$uid		=	$_SESSION['user']['uid'];
$result		=	mysqli_query($con,"SELECT * FROM notification WHERE seen IN (0,1) AND receiver = " . $uid . " AND detail != 'New Message'");
$count		=	mysqli_num_rows($result);

if( $count != 0 )
	{
	while($row			=	mysqli_fetch_array($result))
		{
		$time_passed	=	humanTiming($row['time']);
		echo "event: new_notification\n";
		$nid		= $row['notify_id'];
		$detail		= $row['detail'];
		
		$data = "<div id=\"notification_preview_$nid\" onclick=\"remove_notification('notification_preview_$nid')\" title=\"About $time_passed Ago\">$detail</div>";
		echo "data: $data\n\n";
		$seen	= $row['seen']+2;
		mysqli_query($con,"UPDATE notification SET seen = $seen WHERE notify_id = " . $row['notify_id']);
		}
	ob_flush();
	flush();
	}
retry(1000);
mysqli_close($con);
?>