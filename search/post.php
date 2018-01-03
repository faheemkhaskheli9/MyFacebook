<link href="../updates/style.css" rel="stylesheet" type="text/css" />
<?php
include_once('../includes/connect.php');
include_once('../includes/Time_Passed.php');
if (!isset($_SESSION))
	session_start();
$content	= mysqli_real_escape_string($con,$_GET['content']);
$date = '';
$posted_by = '';
if (isset($_GET['posted_date']))
	$date		= mysqli_real_escape_string($con,$_GET['posted_date']);
if (isset($_GET['post']))
	$content		= mysqli_real_escape_string($con,$_GET['posted_date']);
if (isset($_GET['posted_by']))
	$posted_by	= mysqli_real_escape_string($con,$_GET['posted_by']);
$search_result	= mysqli_query($con,"SELECT * FROM posts WHERE post LIKE '%$content%' AND date_time LIKE '%$date%' AND u_id LIKE '%$posted_by%' Limit 100");
if ($search_result)
	{
	$search_count	= mysqli_num_rows($search_result);
	if ($search_count > 0)
		{
		while($search_row = mysqli_fetch_array($search_result))
			{			
			$user_result = mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $search_row['u_id']);
			$u_row = mysqli_fetch_array($user_result);
			$post['id'] 			= $search_row['post_id'];
			$post['post'] 			= $search_row['post'];
			$post['time'] 			= $search_row['time'];
			$users['id'] 			= $search_row['u_id'];
			$users['firstname'] 	= $u_row['firstname'];
			$users['lastname'] 		= $u_row['lastname'];
			$users['display_image'] = $u_row['display_image'];
			include('../template/post.php');			
		?>
        	<!--
			<div class="tab clickable" onClick="clicked_post(<?php echo $search_row['post_id'];?>)">
			<div id="heading"
			<?php
			if ($search_row['u_id'] == $_SESSION['user']['uid'])
			{
			echo 'style="background-color:red;"';
			}
			?>
			><h2><?php echo $search_row['title'];?></h2></div>
			<div id="status" ><?php echo $search_row['post']?></div>
			<div id="detail"><span>Posted <?php echo humanTiming($search_row['time']);?> Ago By <span style="color:#00F;"><?php echo ucfirst($u_row['firstname']) . ' ' . ucfirst($u_row['lastname']);?></span></span>&nbsp;</div>
			</div>
            -->
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