<?php
include('../config.php');
include('../includes/Time_Passed.php');
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Entire Web is a General Purpose Website Here you will find lots of usefull things , it support lots of different features such as Social Network, Blog, Question & Answers, Free Ads">
<meta name="keywords" content="demsite,Demonic Website,Faheem Khaskheli,Meet New People,Make New Friends,Find Friends">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title>Ask Questions</title>
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
<tr><td ><a href="./"><div class="sub_menu_icon"><img src="../images/"><br/>Recent Question</div></a></td></tr>
<tr><td ><a href="./?sort=unanswered"><div class="sub_menu_icon"><img src="../images/"><br/>Unanswered</div></a></td></tr>
<tr><td ><a href="./?sort=most_viewed"><div class="sub_menu_icon"><img src="../images/"><br/>Most Viewed</div></a></td></tr>
</table>
</div>
</td>
<td id="sub_menu_title" onClick="sub_menu()"><div class="heading">Questions</div></td>
</tr>
</table>
</div>

<div class="tab" id="ask_question">
<div id="heading" style="color:#FFFFFF;"><h2>Ask Question</h2></div>

<table cellpadding="10" cellspacing="10">
<tr><td width="150">Title</td>		<td width="500"><input type="text" name="question_title" id="question_title"></td></tr>
<tr><td width="150">Question</td>	<td width="500"><div id="new_question" rows="10" cols="50" contenteditable></div></td></tr>
<tr><td colspan="2"><center><button onClick="ask_question()">Ask</button></center></td></tr>

</table>

</div>
<?php
include_once('../other.php');
?>

</div>
</center>

</body>
</html>