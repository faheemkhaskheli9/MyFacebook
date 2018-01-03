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
<title>Question and Answers</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
<script src="script.js"></script>
</head>

<body>

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
<tr><td ><a href="./"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Recent Question</div></a></td></tr>
<tr><td ><a href="./?show_only=unanswered"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Unanswered</div></a></td></tr>
<tr><td ><a href="./?show_only=answered"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Answered</div></a></td></tr>
<tr><td ><a href="./?sort=most_viewed"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Most Viewed</div></a></td></tr>
<tr><td ><a onClick="show_ajaxById('../question/new_question_form',0)"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Ask Question</div></a></td></tr>
</table>
</div>
</td>
<td id="sub_menu_title" onClick="sub_menu()"><div class="heading">Questions</div></td>
</tr>
</table>
</div>

<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();

$query = "SELECT * FROM questions WHERE hide <> 1 ";
if (isset($_GET['show_only']))
if ($_GET['show_only'] == 'unanswered')
	$query .= " AND status = 'Unanswered'";
else if ($_GET['show_only'] == 'answered')
	$query .= " AND status = 'Answered'";
if (!isset($_GET['sort']))
	$query .= 'ORDER BY time DESC';
else if ($_GET['sort'] == 'most_viewed')
	$query .= 'ORDER BY hits';
else
	$query .= 'ORDER BY time DESC';

$question_result	= mysqli_query($con,$query);
$question_count	= mysqli_num_rows($question_result);

if ($question_count > 0)
	{
	while($question_row = mysqli_fetch_array($question_result))
		{
			$q_id			= $question_row['q_id'];
			$q_title		= $question_row['title'];
			$question 		= $question_row['question'];
			$posted_by		= $question_row['posted_by'];
			$time			= $question_row['time'];
			$status			= $question_row['status'];
			?>
            <a href="./show.php?id=<?php echo $q_id;?>" style="color:#000000;text-decoration:none;">
			<div class="tab">
			<div style="color:#000000;text-align:left;padding-left:20px;"><h2><?php echo $q_title;?></h2></div>
            <hr>
			<div style="color:#333333;text-align:left;padding:10px;"><?php echo $question;?></div>
			<?php
    		$user_result	= mysqli_query($con,"SELECT * FROM user WHERE u_id = $posted_by");
			$users = mysqli_fetch_array($user_result); ?>
            <div style="text-align:left;padding:10px;"><a href="../profile/?id=<?php echo $posted_by;?>"><?php echo $users['firstname'].' '.$users['lastname'];?></a>&nbsp;&nbsp;&nbsp;<?php echo humanTiming($time);?> ago
            <?php if ($status == 'Unanswered') 
				{
			?>
            <div style="display:inline;text-align:left;padding:10px;color:#FF0000;"><b><?php echo $status;?></b></div>
            <?php
            	}
			?>
            <?php if ($status == 'Answered') 
				{
			?>
            <div style="display:inline;text-align:left;padding:10px;color:#00FF00;"><b><?php echo $status;?></b></div>
            <?php
            	}
				?>
            </div>            
			</div>
            </a>
    	<?php
		}
	mysqli_close($con);
	}
include_once('../other.php');
?>

</div>
</center>

<?php
include_once('../notification/notification.php');
?>

</body>
</html>