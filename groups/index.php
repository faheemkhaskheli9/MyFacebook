<?php
include('../config.php');
if (!isset($_SESSION['user']))
header('Location: ../');
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Entire Web is a General Purpose Website Here you will find lots of usefull things , it support lots of different features such as Social Network, Blog, Question & Answers, Free Ads">
<meta name="keywords" content="demsite,Demonic Website,Faheem Khaskheli,Meet New People,Make New Friends,Find Friends">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title>Groups</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
<script src="script.js"></script>
</head>

<body oncontextmenu="return false;">

<?php 
include_once('../includes/header.php');
?>

<center>
<div id="nav">

<div id="sub_menu" class="sub_menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td>
<div id="sub_menu_item">

<table>
<tr><td ><div class="sub_menu_icon" onClick="show_ajaxById('create_group',0)"><img src="../images/icons/question14 (2).png"><br/>Create New Group</div></td></tr>
<tr><td ><a href="../search/?type=group"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Search Groups</div></a></td></tr>
</table>
</div>
</td>
<td id="sub_menu_title" onClick="sub_menu()"><div class="heading">Groups</div></td>
</tr>
</table>
</div>

<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();
$uid	= $_SESSION['user']['uid'];
$result = mysqli_query($con,"SELECT * FROM groups WHERE g_id IN (SELECT g_id FROM group_members WHERE u_id = $uid) OR admin = $uid");
echo '<div class="results">';
while ($row = mysqli_fetch_array($result))
	{
	echo '<div id="group" onclick="window.open(\'./show.php?id='.$row['g_id'].'\')">
	<table cellpadding="10" cellspacing="0" border="0">
	<tr><td><img src="'.$row['g_logo'].'"></td><td>'.$row['gname'].'</td><td></td></tr>
	<tr><td></td><td colspan="2">'.$row['description'].'</td></tr>
	<tr>';
	$result1 = mysqli_query($con,"SELECT * FROM user WHERE u_id = $uid");
	$row1 = mysqli_fetch_array($result1);
	echo '<td><img src="'.$row1['display_image'].'" width="100"/></td><td>'.ucfirst($row1['firstname']).' '.ucfirst($row1['lastname']).' (Admin)</td><td></td>';
	echo '</tr>';
	$result3	=	mysqli_query($con,"SELECT u_id FROM group_members WHERE g_id = ".$row['g_id']);
	$count_members	=	mysqli_num_rows($result3);
	echo '<tr><td>Members</td><td>'.$count_members.'</td><td></td></tr>';
	echo'
	</table>
	</div>';
	}
echo '</div>';

mysqli_close($con);
include_once('../other.php');
?>

</div>
</center>
<!--
<div id="sidebar">
</div>
-->

<?php
include_once('../notification/notification.php');
?>

</body>
</html>