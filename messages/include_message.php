<?php
function show_message($message_row,$other_data)
	{
	if ( $message_row['hide'] != 1 && $message_row['sender'] == $_SESSION['user']['uid'] )
		{	
		$template['message']['id'] 					= $message_row['msg_id'];
		$template['message']['time'] 				= $message_row['time'];
		$template['message']['msg'] 				= $message_row['msg'];
		$template['message']['user']['pic']			= $_SESSION['user']['display_image'];
		$template['message']['user']['id']			= $_SESSION['user']['uid'];
		$template['message']['user']['firstname']	= $_SESSION['user']['firstname'];
		$template['message']['user']['lastname']	= $_SESSION['user']['lastname'];
		include '../template/message.php';
		/*
?>
		<tr><td>
		<table class="whole_message_box messages_receiver" id="<?php echo $message_row['msg_id'];?> message_box_<?php echo $message_row['msg_id'];?>" title="Message Sent About <?php echo humanTiming($message_row['time']);?> Ago" onclick="message_options(<?php echo $message_row['msg_id'];?>)">
        <tr><td height="35"><img src="<?php echo $_SESSION['user']['display_image'];?>" width="30" height="30"></td>
        <td><div class="messege_receiver_name"><?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'];?></div></td></tr>
        <tr><td></td><td><?php echo $message_row['msg'];?></td></tr>
		</table>
        </td></tr>
<?php
		*/
		}
	if ( $message_row['hide'] != 2 && $message_row['receiver'] == $_SESSION['user']['uid'] )
		{
		$template['message']['id'] 					= $message_row['msg_id'];
		$template['message']['time'] 				= $message_row['time'];
		$template['message']['msg'] 				= $message_row['msg'];
		$template['message']['user']['pic']			= $other_data['display_image'];
		$template['message']['user']['id']			= $other_data['u_id'];
		$template['message']['user']['firstname']	= $other_data['firstname'];
		$template['message']['user']['lastname']	= $other_data['lastname'];
		include '../template/message.php';
		/*
?>
		<tr><td>
		<table class="whole_message_box messages_sender" id="<?php echo $message_row['msg_id'];?> message_box_<?php echo $message_row['msg_id'];?>" title="Message Sent About <?php echo humanTiming($message_row['time']);?> Ago" onclick="message_options(<?php echo $message_row['msg_id'];?>)">
        <tr><td height="35"><img src="<?php echo $other_data['display_image'];?>" width="30" height="30"></td>
        <td><div onclick="show_profile(' <?php echo $other_data['u_id'];?>')" class="messege_sender_name">
		<?php echo $other_data['firstname'] . ' ' . $other_data['lastname'];?></div></td></tr>
        <tr><td></td><td rowspan="2"><?php echo $message_row['msg'];?></td></tr>
		</table>
        </td></tr>
<?php
		*/
		}	
	}
?>