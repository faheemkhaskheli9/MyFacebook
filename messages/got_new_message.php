<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
include '../includes/connect.php';
include '../includes/Time_Passed.php';

session_start();
$uid		=	$_SESSION['user']['uid'];
$result		=	mysqli_query($con,"SELECT * FROM messages WHERE update_live = '0' AND receiver = " . $uid);
$count		=	mysqli_num_rows($result);
if( $count != 0 )
	{	
	$row			=	mysqli_fetch_array($result);
	$time_passed	=	humanTiming($row['time']);
	$sender			=	$row['sender'];

	$senders		=	mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $sender);
	$rows			=	mysqli_fetch_array($senders);
	
	echo "event: show_new_message\n";
	$mid		= $row['id'];
	$dp			= $rows['display_image'];
	$fn			= $rows['firstname'];
	$ln			= $rows['lastname'];
	$message	= $row['message'];
	echo "data: <tr><td><table class=\"whole_message_box messages_sender\" id=\"".$mid." message_box_".$mid."\" title=\"Message Sent About ".$time_passed." Ago\" onclick=\"message_options(".$mid.")\">\n";
    echo "data: <tr><td height=\"35\"><img src=\"".$dp."\" width=\"30\" height=\"30\"></td>\n";
    echo "data: <td><div class=\"messege_sender_name\">".$fn . ' ' . $ln ."</div></td></tr>\n";
    echo "data: <tr><td></td><td>". $message ."</td></tr></table></td></tr>\n\n";
    
	mysqli_query($con,"UPDATE messages SET update_live = '1' WHERE msg_id = " . $mid);
	   
	ob_flush();
	flush();
	}
retry(100);
mysqli_close($con);
?>