<?php
include_once('../includes/connect.php');
include('../includes/Time_Passed.php');
if (!isset($_SESSION))
	session_start();
	
$op	= ' AND';
	
$query = '';
if (isset($_GET['subjects']))
	{
	if ($_GET['subjects'] != '')
	$query	.= "WHERE subject LIKE '%".mysqli_real_escape_string($con,$_GET['subjects'])."%'";
	}
if (isset($_GET['departments']))
	{
	if ($_GET['departments'] != '')
		{
		if (query == '')
			$query .= 'WHERE';
		$query	.= $op." department LIKE '%".mysqli_real_escape_string($con,$_GET['departments'])."%'";
		}
	}

/*
if (isset($_GET['gadminfname']))
$query	.= "admin '%".$_GET['gdesc'].'%';
*/
$search_result	= mysqli_query($con,"SELECT * FROM notes ".$query);
echo mysqli_error($con);
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
			<div class="tab" onClick="clicked_post(<?php echo $search_row['n_id'];?>)">
			<div id="heading"
			<?php
			if ($search_row['posted_by'] == $_SESSION['user']['uid'])
			{
			echo 'style="background-color:red;"';
			}
			?>
			><h2><?php echo $search_row['subject'];?></h2></div>
			<div id="status" ><?php echo $search_row['department']?><br/><a href="../notes/files/<?php echo $search_row['file1']?>"><?php echo $search_row['file1']?></a></div>
			<div id="detail"><span>Posted <?php echo humanTiming($search_row['posted_on']);?> Ago By <span style="color:#00F;"><?php echo ucfirst($u_row['firstname']) . ' ' . ucfirst($u_row['lastname']);?></span></span>&nbsp;</div>
			</div>
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