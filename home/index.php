<?php
include('../config.php');
if (!isset($_SESSION['user']))
header('Location: ./');
else
header('Location: ../updates');
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Entire Web is a General Purpose Website Here you will find lots of usefull things , it support lots of different features such as Social Network, Blog, Question & Answers, Free Ads">
<meta name="keywords" content="demsite,Demonic Website,Faheem Khaskheli,Meet New People,Make New Friends,Find Friends">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title><?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'];?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="./style.css" rel="stylesheet" type="text/css" />
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
<script src="./script.js"></script>
</head>

<body oncontextmenu="return false;">

<?php 
include_once('../includes/header.php');
?>

<center>
<div id="nav">

<div class="tab">

<div id="heading"><h2>Basic</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="../profile/index.php"><div class="icon"><div id="icon-image"><img src="../images/icons/silhouette5 (1).png" height="100" ></div>
<div>Profile</div></div></a>
</td>
<td>
<a href="../updates"><div class="icon"><div id="icon-image"><img src="../images/icons/share5 (1).png" height="100"></div>
<div>Updates</div></div></a>
</td>
<td>
<a href="../settings"><div class="icon"><div id="icon-image"><img src="../images/icons/settings18.png" width="100" height="100"></div>
<div>Setting</div></div></a>
</td>
<td>
<a href="../help"><div class="icon"><div id="icon-image"><img src="../images/icons/question14 (2).png" width="100" height="100"></div>
<div>Help</div></div></a>
</td>
</tr>
</table>
</div>

<div class="tab">

<div id="heading"><h2>Contacts</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="../contacts"><div id="request" class="icon"><div id="icon-image"><img src="../images/icons/1438974232_05_phonebook.png" width="100" height="100"></div>
<div>Contacts List</div></div></a>
</td>
<!--
<td>
<div class="icon"><div id="icon-image"><img src="../images/icons/1438974528_users.png" width="100" height="100"></div>
<div>People You May Know</div></div>
</td>
-->
<td>
<a href="../contacts/friendmap.php"><div class="icon"><div id="icon-image"><img src="../images/icons/placeholder4.png" width="100" height="100"></div>
<div>Friends` Map</div></div></a>
</td>
</tr>
</table>
</div>

<div class="tab">

<div id="heading"><h2>Messages</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="../messages/index.php?folder=inbox"><div class="icon"><div id="icon-image"><img src="../images/icons/mailbox12.png" height="100"></div>
<div>Inbox</div></div></a>
</td>
<!--
<td>
<div class="icon"><div id="icon-image"><img src="../images/" width="100" height="100"></div>
<div>Archived</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="../images/" width="100" height="100"></div>
<div>Spam</div></div>
</td>
-->
</tr>
</table>
</div>

<div class="tab">

<div id="heading"><h2>Question and Answers</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<div class="icon" onClick="show_ajaxById('../question/new_question_form',0)"><div id="icon-image"><img src="../images/icons/question14 (1).png" width="100" height="100"></div>
<div>Ask Question</div></div>
</td>
<td>
<a href="../question/"><div class="icon"><div id="icon-image"><img src="../images/icons/question14 (1).png" width="100" height="100"></div>
<div>Recent Question</div></div></a>
</td>
<td>
<a href="../question/?sort=top"><div class="icon"><div id="icon-image"><img src="../images/icons/question14 (1).png" width="100" height="100"></div>
<div>Top Question</div></div></a>
</td>
<td>
<a href="../question/?sort=answered.php"><div class="icon"><div id="icon-image"><img src="../images/icons/question14 (1).png" width="100" height="100"></div>
<div>Answered Question</div></div></a>
</td>
</tr>
<tr>
<td>
<a href="../question/?sort=unanswered.php"><div class="icon"><div id="icon-image"><img src="../images/icons/question14 (1).png" width="100" height="100"></div>
<div>Unanswered Question</div></div>
</td>
</tr>
</table>
</div>

<div class="tab">

<div id="heading"><h2>Photos</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="../webcam/"><div class="icon" ><div id="icon-image"><img src="../images/icons/gamepad.png" width="100" height="100"></div>
<div>Capture Photo</div></div></a>
</td>
<td>
<a href="../photos/?id=<?php echo $uid;?>"><div class="icon"><div id="icon-image"><img src="../images/" width="100" height="100"></div>
<div>Images</div></div></div>
</td>
</tr>
</table>
</div>

<div class="tab">

<div id="heading"><h2>Notes</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="../notes/"><div class="icon"><div id="icon-image"><img src="../images/icons/pencil34.png" width="100" height="100"></div>
<div>Add Notes</div></div></a>
</td>
<td>
<a href="../notes/"><div class="icon"><div id="icon-image"><img src="../images/icons/1438974632_icon-game-controller-b.png" width="100" height="100"></div>
<div>My Notes</div></div></a>
</td>
<td>
<a href="../notes/"><div class="icon"><div id="icon-image"><img src="../images/icons/search-2-512.gif" width="100" height="100"></div>
<div>Search Notes</div></div></a>
</td>
</tr>
</table>
</div>

<div class="tab">

<div id="heading"><h2>Result</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="../results/"><div class="icon"><div id="icon-image"><img src="../images/icons/graphic4 (1).png" width="100" height="100"></div>
<div>My Result</div></div></a>
</td>
<td>
<a href="../results/"><div class="icon"><div id="icon-image"><img src="../images/icons/search-2-512.gif" width="100" height="100"></div>
<div>Search Result</div></div></a>
</td>
</tr>
</table>
</div>

<div class="tab">

<div id="heading"><h2>Papers</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="../papers/"><div class="icon"><div id="icon-image"><img src="../images/icons/gamepad.png" width="100" height="100"></div>
<div>Previous Papers</div></div></a>
</td>
<td>
<div class="icon" onClick="show_ajaxById('../papers/addpaper',0)"><div id="icon-image"><img src="../images/icons/gamepad.png" width="100" height="100"></div>
<div>Add Papers</div></div>
</td>
<td>
<a href="../search/?type=papers"><div class="icon"><div id="icon-image"><img src="../images/icons/search-2-512.gif" width="100" height="100"></div>
<div>Search Papers</div></div></a>
</td>
</tr>
</table>
</div>

<div class="tab">

<div id="heading"><h2>Groups</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="../groups"><div id="request" class="icon"><div id="icon-image"><img src="../images/icons/1438974232_05_phonebook.png" width="100" height="100"></div>
<div>My Groups</div></div></a>
</td>
<td>
<a href="../search/?type=group"><div class="icon"><div id="icon-image"><img src="../images/icons/search-2-512.gif" width="100" height="100"></div>
<div>Search Groups</div></div></a>
</td>
<td>
<div class="icon" onClick="show_ajaxById('../groups/create_group',0)"><div id="icon-image"><img src="../images/icons/1438974528_users.png" width="100" height="100"></div>
<div>Create New Groups</div></div>
</td>
</tr>
</table>
</div>
<!--
<div class="tab">
<div id="heading"><h2>Emails</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>New Email</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Inbox</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Archived</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Spam</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/icons/recycle2.png" width="100" height="100"></div>
<div>Trash</div></div>
</td>
</tr>
</table>
</div>
-->
<div class="tab">

<div id="heading"><h2>Files</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<div class="icon"><div id="icon-image"><img src="../images/" width="100" height="100"></div>
<div>All Files</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="../images/" width="100" height="100"></div>
<div>Create Directory</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="../images/" width="100" height="100"></div>
<div>Create File</div></div>
</td>
</tr>
</table>
</div>

<div class="tab">

<div id="heading"><h2>Payment</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="../payment/"><div class="icon"><div id="icon-image"><img src="../images/icons/gamepad.png" width="100" height="100"></div>
<div>Payment History</div></div></a>
</td>
<td>
<a href="../payment/"><div class="icon"><div id="icon-image"><img src="../images/icons/1438974632_icon-game-controller-b.png" width="100" height="100"></div>
<div>Invoice</div></div></a>
</td>
</tr>
</table>
</div>
<!--
<div class="tab">

<div id="heading"><h2>Advertisment</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="<?php echo $_SESSION['base_url'];?>/ads/show.php?show=featured"><div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Feautred Advertisment</div></div></a>
</td>
<td>
<a href="<?php echo $_SESSION['base_url'];?>/ads/show.php?show=list"><div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Advertisment List</div></div></a>
</td>
<td>
<a href="<?php echo $_SESSION['base_url'];?>/ads/show.php?show=catagory"><div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Advertisment Catagory</div></div></a>
</td>
<td>
<a href="<?php echo $_SESSION['base_url'];?>/ads/show.php?show=myads"><div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>My Advertisments</div></div></a>
</td>
<td>
<a href="<?php echo $_SESSION['base_url'];?>/ads/index.php"><div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Publish New Advertisment</div></div></a>
</td>
</tr>
</table>
</div>
-->
<div class="tab">

<div id="heading"><h2>Websites</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Websites List</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Websites Catagory</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>My Web Pages</div></div>
</td>
<td>
<div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/" width="100" height="100"></div>
<div>Create Web Page</div></div>
</td>
</tr>
</table>
</div>
<!--
<div class="tab">

<div id="heading"><h2>Games</h2></div>
<table cellpadding="5" cellspacing="10">
<tr>
<td>
<a href="<?php echo $_SESSION['base_url'];?>/games/"><div class="icon"><div id="icon-image"><img src="<?php echo $_SESSION['base_url'];?>/images/icons/gamepad.png" width="100" height="100"></div>
<div>Catagories</div></div></a>
</td>
<td>
<a href="<?php echo $_SESSION['base_url'];?>/games/"><div class="icon"><div id="icon-image"><img src="../images/icons/1438974632_icon-game-controller-b.png" width="100" height="100"></div>
<div>Top Games</div></div></a>
</td>
</tr>
</table>
</div>
-->

<?php
include('../includes/connect.php');
$u_id = $_SESSION['user']['uid'];
$result = mysqli_query($con,"SELECT * FROM user WHERE u_id = $u_id");
$row = mysqli_fetch_array($result);
if ($row['status'] == '')
	{
?>
<div id="missing_data_main">
<div id="missing_data">
Please Provide Few Information About Your Self.<br><br>
<table>
<tr><td width="300">Your Status In MUET</td><td>
<select id="missing_status" onChange="show_other_fields()">
<option value="Student">Student</option>
<option value="Teacher">Teacher</option>
<option value="Satff">Staff</option>
<option value="Guest" selected>Guest</option>
</select>
</td></tr>
<tr><td colspan="3"><div id="other_info"></div></td></tr>
<tr><td colspan="3"><center><button onClick="update_missing_info()">Update</button></center></td></tr>
</table>
</div>
<?php
	}
?>
<?php
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
//include_once('../chat/chat.php');
?>
<div id="notification_preview"></div>
</body>
</html>