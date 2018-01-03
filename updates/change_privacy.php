<?php
session_start();
include('../includes/connect.php');
$ctype = $_POST['ctype'];
$privacy = $_POST['privacy'];
$uid	= $_POST['uid'];
$userid	=	$_SESSION['user']['uid'];
if ($privacy == 'private')
	$privacy = 0;
else
	$privacy = 1;
mysqli_query($con,"UPDATE posts SET privacy = ".$privacy." WHERE post_id = ".$uid." AND u_id = ".$userid);

if ($privacy == 0)
	{
	?>
    <img src="../images/icons/lock24 (2).png" width="30" title="Private" onclick="change_privacy('post','public','<?php echo $uid;?>')">
    <?php
    }
else
	{
?>
   	<img src="../images/icons/1438974520_icon-ios7-people.png"" width="30" title="Public" onclick="change_privacy('post','private','<?php echo $uid;?>')">
     <?php
   	}
?>