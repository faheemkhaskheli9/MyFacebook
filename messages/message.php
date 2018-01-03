<?php
include '../includes/connect.php';
$uid	=	$_SESSION['user']['uid'];
?>
<div id="messagesenders">
<?php
$message_persons	=	mysqli_query($con,"SELECT DISTINCT sender,receiver FROM messages WHERE (receiver = '$uid' AND hide NOT IN (2,3)) OR (sender = '$uid' AND hide NOT IN (1,3))");
//$message_senders	=	mysqli_query($con,"SELECT DISTINCT sender FROM messages WHERE receiver = '$uid' AND hide NOT IN (2,3)");
//$message_resevers	=	mysqli_query($con,"SELECT DISTINCT receiver FROM messages WHERE sender = '$uid' AND hide NOT IN (1,3)");
$members	=	array();
/*
if( !isset($message_senders) )
	{
	$message_senders = "";
	}

while ( $message_sender		=	mysqli_fetch_array($message_senders) )
	{
	array_push($members, $message_sender['sender']);
	}
while ( $message_resever	=	mysqli_fetch_array($message_resevers) )
	{
	array_push($members, $message_resever['receiver']);
	}
$all_members	=	array_unique($members);
*/
while ( $message_person	=	mysqli_fetch_array($message_persons) )
	{
	if ($message_person['receiver'] == $uid)
	array_push($members, $message_person['sender']);
	if ($message_person['sender'] == $uid)
	array_push($members, $message_person['receiver']);
	}
$all_members	=	array_unique($members);

foreach ($all_members as $other_member)
	{
	$other_person 			= 	mysqli_query($con,"SELECT * FROM user WHERE u_id = '$other_member'");
	$other_person			=	mysqli_fetch_array($other_person);
	//$all_message		=	mysqli_query($con,"SELECT * FROM messages WHERE (sender = '$other_member' AND receiver = '$uid' AND hide NOT IN (2,3)) OR (receiver = '$other_member' AND sender = '$uid' AND hide NOT IN (1,3))");
	/*
	$inboxed_message		=	mysqli_query($con,"SELECT * FROM messages WHERE sender = '$other_member' AND receiver = '$uid' AND hide NOT IN (2,3)");
	$count_inboxed_message	=	mysqli_num_rows($inboxed_message);
	$outboxed_message		=	mysqli_query($con,"SELECT * FROM messages WHERE receiver = '$other_member' AND sender = '$uid' AND hide NOT IN (1,3)");
	$count_outboxed_message	=	mysqli_num_rows($outboxed_message);
	*/
	?>
	<div id="member_messaged_id_<?php echo $other_member;?>" class="member_messaged" onclick="show_this_members_messages('<?php echo $other_member;?>')" style="cursor:pointer">
	<table>
    <tr><td width="35"><img src="<?php echo $other_person['display_image'];?>" width="30" height="30"/></td>
    <td><?php echo $other_person['firstname'] . ' ' . $other_person['lastname'];?></td></tr>
	<!--
    <tr><td>Received <?php //echo ':' . $count_inboxed_message;?></td></tr>
	<tr><td>Send <?php //echo ': ' . $count_outboxed_message;?></td></tr>
	-->
    </table>
	</div>
	<?php
	}
?>
</div>