<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
include '../includes/connect.php';
include '../includes/Time_Passed.php';

session_start();
$uid		=	$_SESSION['user']['uid'];

$result		=	mysqli_query($con,"SELECT * FROM follower WHERE u_id = " . $uid );
$count 		=	mysqli_num_rows($result);
if($count == 0)
exit();
$all_uid = '';
while($row = mysqli_fetch_array($result))
	{
	if ($all_uid == '')
	$all_uid = $row['target_id'];
	else
	$all_uid .= ','.$row['target_id'];
	}
$result		=	mysqli_query($con,"SELECT * FROM posts WHERE seen = 0 AND u_id in (" . $all_uid .")");
$count		=	mysqli_num_rows($result);

if( $count != 0 )
	{
	$row			=	mysqli_fetch_array($result);
	$time_passed	=	humanTiming($row['time']);
	$title			=	$row['title'];
	$post			=	$row['post'];
	
	$user			=	mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $row['uid']);
	$rows			=	mysqli_fetch_array($user);
	
	echo "event: updates\n";
	$fn			= $rows['firstname'];
	$ln			= $rows['lastname'];
		
	echo "data: <div id=\"temp_latest_updates\"></div>\n";
	echo "data: <div id=\"new_temp_update\">\n";
	echo "data: <div class=\"tab_div clickable\">\n";

	echo "data: <div id=\"status\" >".$post."</div>\n";
	echo "data: <div id=\"detail\"><span>Posted 1 Sec Ago By ". $fn . ' ' . $ln."</span>&nbsp;</div>\n";
	echo "data: </div>\n";
	echo "data: </div>\n\n";
	mysqli_query($con,"UPDATE posts SET seen = '1' WHERE post_id = " . $row['id']);
	}
ob_flush();
flush();

retry(1000);
mysqli_close($con);

?>