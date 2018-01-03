<?php
include('../config.php');
if (!isset($_SESSION['user']))
header('Location: '.$_SESSION['base_url']);
include('../includes/Time_Passed.php');
if (isset($_GET['id']))
	{
	include('../includes/connect.php');
	$result = mysqli_query($con,"SELECT * FROM groups WHERE g_id = ".mysqli_real_escape_string($con,$_GET['id']));
	$row = mysqli_fetch_array($result);
	}
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
<script src="../updates/script.js"></script>
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
<tr><td ><div class="sub_menu_icon" onClick="show_ajaxById('./group_post_form','<?php echo $_GET['id'];?>')"><img src="../images/icons/question14 (2).png"><br/>New Post</div></td></tr>
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
echo '<div id="group">
<table cellpadding="10" cellspacing="0" border="0">
<tr><td><img src="'.$row['g_logo'].'"></td><td>'.$row['gname'].'</td><td></td></tr>
<tr><td></td><td colspan="2">'.$row['description'].'</td></tr>
<tr>';
$result1 = mysqli_query($con,"SELECT * FROM user WHERE u_id = ".$_SESSION['user']['uid']);
$row1 = mysqli_fetch_array($result1);
echo '<td><img src="'.$row1['display_image'].'" width="100"/></td><td>'.ucfirst($row1['firstname']).' '.ucfirst($row1['lastname']).' (Admin)</td><td></td>';
echo '</tr>';
$result3	=	mysqli_query($con,"SELECT u_id FROM group_members WHERE g_id = ".$row['g_id']);
if ($result3)
{
$count_members	=	mysqli_num_rows($result3);
echo '<tr><td>Members</td><td>'.$count_members.'</td><td></td></tr>';
}
echo'
</table>
</div>';
?>

<div id="new_update_result_cell"></div>
<div id="latest_updates"></div>
<?php
include_once('../includes/connect.php');
include_once('../includes/Time_Passed.php');
$uid	=	$_SESSION['user']['uid'];

$post_result = mysqli_query($con,"SELECT * FROM posts WHERE loc_id = ".$_GET['id']." AND loc = 'group' ORDER BY time DESC");
while($rows = mysqli_fetch_array($post_result))
	{
	$user_result = mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $rows['u_id']);
	$u_row = mysqli_fetch_array($user_result);
?>
    <div class="tab clickable" onClick="clicked_post(<?php echo $rows['post_id'];?>)">
	<div id="heading"
    <?php
    if ($rows['u_id'] == $_SESSION['user']['uid'])
	{
	echo 'style="background-color:red;"';
	}
	?>
    ><h2><?php echo $rows['title'];?></h2></div>
	<div id="status" ><?php echo $rows['post']?></div>
	<div id="detail"><span>Posted <?php echo humanTiming($rows['time']);?> Ago By <span style="color:#00F;"><?php echo ucfirst($u_row['firstname']) . ' ' . ucfirst($u_row['lastname']);?></span></span>&nbsp;</div>
    </div>
	<?php
	}
	?>

<?php
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