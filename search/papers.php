<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();
$content	= mysqli_real_escape_string($con,$_GET['content']);
$search_result	= mysqli_query($con,"SELECT * FROM paper WHERE subject IN ( SELECT subid FROM subjects WHERE name LIKE '%$content%' OR short LIKE '%$content%' )");
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
			<div class="tab clickable" onClick="clicked_post(<?php echo $search_row['paper_id'];?>)">
            <?php if ($search_row['photo1'] != '') {?>
			<div><img src="<?php echo $search_row['photo1'];?>" style="width:100%;"></div>
            <?php } if ($search_row['photo1'] != '') {?>
            <div><img src="<?php echo $search_row['photo2'];?>" style="width:100%;"></div>
            <?php } if ($search_row['photo1'] != '') {?>
            <div><img src="<?php echo $search_row['photo3'];?>" style="width:100%;"></div>
            <?php } if ($search_row['photo1'] != '') {?>
            <div><img src="<?php echo $search_row['photo4'];?>" style="width:100%;"></div>
            <?php } ?>
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