<?php
session_start();
include '../includes/connect.php';
include '../includes/Time_Passed.php';
include 'include_message.php';
$other_member	=	mysqli_real_escape_string($con,$_GET['other_member']);
$uid			=	$_SESSION['user']['uid'];
$xresult			= mysqli_query($con,"SELECT * FROM messages WHERE (receiver = '$uid' AND sender = '$other_member') OR (receiver = '$other_member' AND sender = '$uid')");
$xcount = mysqli_num_rows($xresult);
if ($xcount < 11)
	$xcount = 10;
$result			= mysqli_query($con,"SELECT * FROM messages WHERE (receiver = '$uid' AND sender = '$other_member') OR (receiver = '$other_member' AND sender = '$uid') ORDER BY time ASC LIMIT ".($xcount-10).",10");
$other_person 	= 	mysqli_query($con,"SELECT * FROM user WHERE u_id = '$other_member'");
$other_person	=	mysqli_fetch_array($other_person);
?>
<div id="message_box">
<table id="message_box_table">
<?php
while ( $row	=	mysqli_fetch_array($result) )
	{
	if ( $row['hide'] != 3 )
		{
		$mid		= $row['msg_id'];
		mysqli_query($con,"UPDATE messages SET update_live = '1' WHERE msg_id = " . $mid);
		show_message($row,$other_person);
		}
	}
?>
</table>
</div>
<center>
<table>
<tr>
<!--<td colspan="3"><input type="hidden" name="message_receiver" id="message_receiver" value="<?php echo $other_member;?>"></td>-->
</tr>
<tr>
<td colspan="3">
<div id="message_textarea" name="message" id="message_textarea" contenteditable onclick="select_message_textarea()">New Message :</div></td>
</tr>
<tr>
<td>
<center><div onclick="send_message(<?php echo $other_member;?>)" class="button">Send</div></center>
</td>
<td>
<!--
<center>
<div onclick="show_insert_picture_form()" class="button">Insert Picture</div>
<div id="insert_picture_form">
<br/>
<form action="../Upload_Picture.php" method="post" enctype="multipart/form-data" id="imageform" >
<input type="file" name="photoimg" id="photoimg" />
<br/>
<br/>
<div class="button" onclick="upload_image_in_message_box()" id="insert_picture_button">Insert</div>
</form>
<br/>
</div>
</center>
-->
</td>
<td>
<center><div class="button">Option</div></center>
</td>
</tr>
</table>
</center>
</div>
<div id="message_option"></div>