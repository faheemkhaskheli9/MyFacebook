<?php
include('../includes/connect.php');
if (isset($_GET['id']))
{
$id = mysqli_real_escape_string($con,$_GET['id']);
$result = mysqli_query($con,"SELECT * FROM user WHERE u_id = $id ");
$row = mysqli_fetch_array($result);
	$this_id				= $row['u_id'];
	$this_firstname			= $row['firstname'];
	$this_lastname 			= $row['lastname'];
	$this_display_image		= $row['display_image'];
?>
<div id="send_message_interface">
<table>
<tr><td width="100"><img src="<?php echo $this_display_image?>" width="50"></td><td><span><?php echo ucfirst($this_firstname) . ' ' . ucfirst($this_lastname);?></span></td></tr>
<tr><td colspan="2"><div contenteditable id="new_message"></div></td></tr>
<tr><td colspan="2"> <center><button onClick="send_message(<?php echo $this_id;?>)">Send</button></center></td></tr>
</table>
</div>
<?php
	}
?>