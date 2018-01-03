<?php
include_once('../includes/connect.php');
include_once('../includes/Time_Passed.php');
if (!isset($_SESSION))
	session_start();
$content	= mysqli_real_escape_string($con,$_GET['content']);
$search_result	= mysqli_query($con,"SELECT * FROM questions WHERE title LIKE '%$content%' ");
if ($search_result)
	{
	$search_count	= mysqli_num_rows($search_result);
	if ($search_count > 0)
		{
		while($search_row = mysqli_fetch_array($search_result))
			{			
			$user_result = mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $search_row['posted_by']);
			$u_row = mysqli_fetch_array($user_result);
		?>
	        <a href="../question/show.php?id=<?php echo $search_row['q_id'];?>" style="color:#000000;text-decoration:none;">
			<div class="tab clickable" onClick="clicked_post(<?php echo $search_row['q_id'];?>)">
			<div id="heading"
			<?php
			if ($search_row['posted_by'] == $_SESSION['user']['uid'])
				{
				echo 'style="background-color:red;"';
				}
			?>
			>
            <h2><?php echo $search_row['title'];?></h2></div>
			<div id="status" ><?php echo $search_row['question']?></div>
			<div id="detail"><span>Posted <?php echo humanTiming($search_row['time']);?> Ago By <span style="color:#00F;"><?php echo ucfirst($u_row['firstname']) . ' ' . ucfirst($u_row['lastname']);?></span></span>&nbsp;</div>
			</div>
            </a>
			<?php
			}
		mysqli_close($con);
		}
	}
else
	{
	echo 'Empty';
	}
?>