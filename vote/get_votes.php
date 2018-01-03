<?php
include '../includes/connect.php';
if ($type == 'answer' && $unique_id > 0)
	{
	$ans_id		=	mysqli_real_escape_string($con,$unique_id);
	if (isset($_SESSION['user']['uid']))
		{
		$uid		=	mysqli_real_escape_string($con,$_SESSION['user']['uid']);
		$my_vote = mysqli_query($con,"SELECT * FROM answer_vote WHERE ans_id = '$ans_id' AND u_id = '$uid'");
		$my_vote = mysqli_fetch_array($my_vote);
		$my_vote = $my_vote['vote'];
		}
	$result = mysqli_query($con,"SELECT * FROM answer_vote WHERE ans_id = '$ans_id' AND vote = 'up'");
	?>
    &nbsp;&nbsp;&nbsp;
    <div id="<?php echo $ans_id.'_vote_up_div'; ?>" class="display_inline">
		<span id="<?php echo $ans_id.'_vote_up'; ?>" class="vote_up_counts">
			<?php echo mysqli_num_rows($result);?>
        </span>
        <?php
		if ($my_vote == 'up')
			{
			?>
	        <span class="my_vote_button" title="Vote Up"><img src="../images/icons/like82 (1).png" width="20"></span>
    	    <?php
        	}
		else
			{
			?>
	        <span onclick="votethis('<?php echo $ans_id;?>','up','answer')" class="vote_up_button" title="Vote Up"><img src="../images/icons/like82 (1).png"  width="15"></span>
    	    <?php
        	}
			?>
    </div>
	<?php $result = mysqli_query($con,"SELECT * FROM answer_vote WHERE ans_id = $ans_id AND vote = 'down'");	?>
    <div id="<?php echo $ans_id.'_vote_down_div'; ?>" class="display_inline">
		<span id="<?php echo $ans_id.'_vote_down'; ?>" class="vote_down_counts">
			<?php echo mysqli_num_rows($result);?>
        </span>
        <?php
		if ($my_vote == 'down')
			{
			?>
	        <span class="my_vote_button" title="Vote Down"><img src="../images/icons/thumb4 (1).png" width="20"></span>
    	    <?php
        	}
		else
			{
			?>
	        <span onclick="votethis('<?php echo $ans_id;?>','down','answer')" class="vote_down_button" title="Vote Down"><img src="../images/icons/thumb4 (1).png" width="15"></span>
    	    <?php
        	}
			?>
	</div>
    <?php
	}
elseif ($type == 'question' && $unique_id > 0)
	{
	$ques_id	=	$unique_id;
	if (isset($_SESSION['user']['uid']))
		{
		$uid		=	$_SESSION['user']['uid'];
		$my_vote = mysqli_query($con,"SELECT * FROM question_vote WHERE ques_id = '$ques_id' AND u_id = '$uid'");
		$my_vote = $my_vote['vote'];
		}	
	$result = mysqli_query($con,"SELECT * FROM question_vote WHERE ques_id = '$ques_id' AND vote = 'up'");
	?>
    <div id="<?php echo $result['ques_id'].'_vote_up_div'; ?>" class="display_inline">
		<span id="<?php echo $result['ques_id'].'_vote_up'; ?>" class="vote_up_counts">
			<?php echo mysqli_num_rows($result);?>
        </span>
        <?php
		if ($my_vote == 'up')
			{
			?>
	        <span class="my_vote_button" title="Vote Up"><img src="../images/icons/like82 (1).png" width="20"></span>
    	    <?php
        	}
		else
			{
			?>
	        <span onclick="votethis('<?php echo $result['ques_id'];;?>','up','question')" class="vote_up_button" title="Vote Up"><img src="../images/icons/like82 (1).png" width="15"></span>
    	    <?php
        	}
		?>
    </div>
	<?php $result = mysqli_query($con,"SELECT * FROM question_vote WHERE ques_id = $ques_id AND vote = 'down'");	?>
    <div id="<?php echo $result['ques_id'].'_vote_down_div'; ?>" class="display_inline">
		<span id="<?php echo $result['ques_id'].'_vote_down'; ?>" class="vote_down_counts">
			<?php echo mysqli_num_rows($result);?>
        </span>
        <span onclick="votethis('<?php echo $result['ques_id'];?>','down','question')" class="vote_down_button" title="Vote Down"><img src="../images/icons/thumb4 (1).png" width="15"></span>
	</div>
    <?php
	}
?>