<?php
session_start();
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
<title><?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'];?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
<script src="script.js"></script>
</head>

<body>

<?php 
include_once('../includes/header.php');
?>

<div id="nav">

<table cellpadding="15" cellspacing="0" style="">
<tr>
<td>
<div id="messages">
<?php include('message.php');?>
</div>
</td>
<td>
<div id="person_messages">

</div>
</td>
</tr>
</table>
</div>

<div id="right_click_menu"></div>

</body>
</html>