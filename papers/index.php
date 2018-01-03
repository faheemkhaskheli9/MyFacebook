<?php
include('../config.php');
include('../includes/Time_Passed.php');
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
<title>Previous Papers</title>
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
<tr>
	<td><div class="sub_menu_icon" onClick="show_ajaxById('../papers/addpaper',0)"><img src="../images/icons/question14 (2).png"><br/>Add Paper</div></td>
</tr>
<tr><td ><a href="../search/?type=papers"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Search Paper</div></a></td></tr>
</table>
</div>
</td>
<td id="sub_menu_title" onClick="sub_menu()"><div class="heading">Papers</div></td>
</tr>
</table>
</div>

<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();

$u_id = $_SESSION['user']['uid'];
$result = mysqli_query($con,"SELECT * FROM paper WHERE posted_by = $u_id ORDER BY term DESC");

echo '<div class="results">';
while ($row = mysqli_fetch_array($result))
	{
	echo '<div id="paper">';
	echo '<table cellpadding="10" cellspacing="0" border="1">';
	$result2 = mysqli_query($con,"SELECT * FROM departments WHERE dept_id = ".$row['department']);
	$result3 = mysqli_query($con,"SELECT * FROM subjects WHERE subid = ".$row['subject']);
	$row2 = mysqli_fetch_array($result2);
	$row3 = mysqli_fetch_array($result3);
	echo '
	<tr><td>Departments</td><td>'.$row2['dept_name'].'</td></tr>
	<tr><td>Batch</td><td>'.$row['batch'].'</td></tr>
	<tr><td>Subject</td><td>'.$row3['name'].'</td></tr>
	<tr><td>Date Of Conduct</td><td>'.$row['date'].'</td></tr>
	<tr><td>Term</td><td>'.$row['term'].'</td></tr>';	
	echo '<tr><td colspan="2">';
	if (is_file($row['photo1']))
	echo '<div id="paper_Image"><img src="'.$row['photo1'].'" /></div>';
	if (is_file($row['photo2']))
	echo '<div id="paper_Image"><img src="'.$row['photo2'].'" /></div>';
	if (is_file($row['photo3']))
	echo '<div id="paper_Image"><img src="'.$row['photo3'].'" /></div>';
	if (is_file($row['photo4']))
	echo '<div id="paper_Image"><img src="'.$row['photo4'].'" /></div>';	
	echo '</td></tr></table></div>';
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