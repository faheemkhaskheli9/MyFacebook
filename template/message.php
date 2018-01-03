<tr><td>
<table class="whole_message_box <?php if ($template['message']['user']['id'] == $_SESSION['user']['uid']) { ?>messages_receiver<?php } else {?>messages_sender<?php } ?>" id="<?php echo $template['message']['id'];?> message_box_<?php echo $template['message']['id'];?>" title="Message Sent About <?php echo humanTiming($template['message']['time']);?> Ago" onclick="message_options(<?php echo $template['message']['id'];?>)">
<tr><td height="35"><img src="<?php echo $template['message']['user']['pic'];?>" width="30" height="30"></td>
<td><div onclick="show_profile(' <?php echo $template['message']['user']['id'];?>')" class="messege_sender_name">
<?php echo $template['message']['user']['firstname'] . ' ' . $template['message']['user']['lastname'];?></div></td></tr>
<tr><td></td><td rowspan="2"><?php echo $template['message']['msg'];?></td></tr>
</table>
</td></tr>