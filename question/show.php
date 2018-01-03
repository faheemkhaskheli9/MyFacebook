<?php
include('../config.php');
include('../includes/Time_Passed.php');
if (!isset($_SESSION['user']))
header('Location: '.$_SESSION['base_url']);
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
<link href="../vote/style.css" rel="stylesheet" type="text/css" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../vote/script.js"></script>
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
<tr><td><a href="./show.php?id=<?php echo $_GET['id'];?>"><div class="sub_menu_icon"><img src="../images/icons/questions-mark.png"><br/>Refresh</div></a></td></tr>
<tr><td onClick="show_ajaxById('./new_answer_form','<?php echo $_GET['id'];?>')"><div class="sub_menu_icon"><img src="../images/icons/pencil29.png"><br/>Submit Answer</div></td></tr>
<tr><td ><a href="./"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Recent Question</div></a></td></tr>
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
if (isset($_GET['id']))
	{
	$q_id = mysqli_real_escape_string($con,$_GET['id']);
	$query = "SELECT * FROM questions WHERE q_id = $q_id ";
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
				
			$best_answer_result = mysqli_query($con,"SELECT best_answer FROM questions WHERE q_id = $q_id AND best_answer <> 0");
			$best_answer_row = mysqli_fetch_array($best_answer_result);
			$best_answer = $best_answer_row['best_answer'];
			?>
			<div class="tab">
			<div style="color:#000000;text-align:left;padding-left:20px;"><h2><?php echo $q_title;?></h2></div>
            <hr>
			<div style="color:#333333;text-align:left;padding:10px;"><?php echo $question;?></div>
			<?php
			$user_result	= mysqli_query($con,"SELECT * FROM user WHERE u_id = $posted_by");
			$users = mysqli_fetch_array($user_result);
			?>
			<div style="text-align:left;padding:10px;"><a href="../profile/?id=<?php echo $posted_by;?>"><?php echo $users['firstname'].' '.$users['lastname'];?></a>&nbsp;&nbsp;&nbsp;<?php echo humanTiming($time);?> ago
            <?php if ($status == 'Unanswered') 
				{
			?>
				<div style="display:inline;text-align:left;padding:10px;color:#FF0000;"><b><?php echo $status;?></b></div>
			<?php
				}
			if ($status == 'Answered') 
				{
			?>
				<div style="display:inline;text-align:left;padding:10px;color:#00FF00;"><b><?php echo $status;?></b></div>
			<?php
				}
				?>
            </div>
			</div>
            
            <div id="answers">
 			<?php
			$answers_result	= mysqli_query($con,"SELECT * FROM answers WHERE q_id = $q_id AND hide <> 1 ORDER BY selected DESC,likes DESC,time DESC");
			echo mysqli_error($con);
			if (mysqli_num_rows($answers_result) == 0)
				{
				echo '<h2>No Answer Yet!</h2>';
				}
			else
				{
				echo '<div id="heading" style="color:#FFFFFF;"><h2>Answers</h2></div>';
				}
			if ($answers_result)
			while ($answers_row = mysqli_fetch_array($answers_result))
				{
				?>
				<div class="answer" id="answer_<?php echo $answers_row['ans_id'];?>">
                <table cellpadding="10">
                <?php 
				$answer_posted_by = $answers_row['posted_by'];
                $user_result	= mysqli_query($con,"SELECT * FROM user WHERE u_id = $answer_posted_by");
				$users = mysqli_fetch_array($user_result);
					?>
                <tr>
                <td rowspan="3"><div align="center" style="vertical-align:top;"><a href="../profile/?id=<?php echo $answer_posted_by;?>"><img src="<?php echo $users['display_image'];?>" width="50"><br/><?php echo ucfirst($users['firstname']).' '.ucfirst($users['lastname']);?></a></div></td>
                <td colspan="3">
                <div style="padding:10px;">
                <?php echo $answers_row['answer'];?><br><br>
                Posted <?php echo humanTiming($answers_row['time']);?> ago</a><br />
                </div>
                </td>
                </tr>
                <tr>
              	<td colspan="4">
				<?php if ($answers_row['posted_by'] == $_SESSION['user']['uid']) 
					{
					?>
                    <span onClick="deletethis('<?php echo $answers_row['ans_id'];?>','answer')" style="cursor:pointer" title="Delete"><img src="../images/icons/recycle2.png" width="30"></span>
					<?php 
					if ($best_answer == '' || $best_answer == 0 || $best_answer == '0') 
						{
						?>
						<span onClick="chose_as_best('<?php echo $answers_row['ans_id'];?>','<?php echo $q_id;?>')" style="cursor:pointer" title="Best Answer"><img src="../images/icons/target51.png"></span>
						<?php
						}
					else if($answers_row['ans_id'] == $best_answer)
						{
						?>
						<span onClick="remove_as_best('<?php echo $answers_row['ans_id'];?>','<?php echo $q_id;?>')" class="other_button" title="Not Best Answer">Not Best Answer</span>
						<?php
						}
					}
					?>
           			<?php
				if ($answers_row['ans_id'] == $best_answer) 
					{
					?>
					<div id="selected" style="display:inline;">Selected Answer</div>
					<?php
					}
				else
					{
					echo '<div id="select_as_best_'.$answers_row['ans_id'].'" style="display:inline;"></div>';
					}
				$unique_id = $answers_row['ans_id'];
				$type = 'answer';
				echo '<div id="'.$unique_id.'_vote_div" style="display:inline;">';
				include('../vote/get_votes.php');
				echo '</div>';
				?>          
                </td>
            	</tr>
                </table>
                </div>
                <?php
				}
				?>
                </div>
			<?php
			}
		mysqli_close($con);
		}
	}
else
	header('Location: ./');
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