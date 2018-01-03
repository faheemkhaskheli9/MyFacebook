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
<title>Payment</title>
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
	<td><div class="sub_menu_icon" onClick="open_file('papers/addpaper')"><img src="../images/icons/question14 (2).png"><br/>Unpaid</div></td>
</tr>
<tr>
	<td><div class="sub_menu_icon" onClick="open_file('papers/addpaper')"><img src="../images/icons/question14 (2).png"><br/>Paid</div></td>
</tr>
<tr><td ><a href="../search/?type=papers"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Search Invoice</div></a></td></tr>
</table>
</div>
</td>
<td id="sub_menu_title" onClick="sub_menu()"><div class="heading">Invoices</div></td>
</tr>
</table>
</div>

<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();
$u_id = $_SESSION['user']['uid'];
$result = mysqli_query($con,"SELECT * FROM invoice WHERE u_id = $u_id ORDER BY inv_id DESC");

echo '
<div class="results">
<table cellpadding="10" cellspacing="0" border="1">
<tr><th>Invoice Id</th><th>Amount</th><th>Issue Date</th><th>Due Date</th><th>Status</th></tr>
';
while ($row = mysqli_fetch_array($result))
	{
	echo '
	<tr>
	<td>'.$row['inv_id'].'</td>
	<td>'.$row['amount'].'</td>
	<td>'.$row['date_time'].'</td>
	<td>'.$row['due_date'].'</td>
	<td>'.$row['status'].'</td>
	</tr>
	';
	}
echo '</table></div>';
mysqli_close($con);
include_once('../other.php');
?>

</div>
</center>

</body>
</html>