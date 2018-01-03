<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();
$content	= mysqli_real_escape_string($con,$_GET['content']);
$search_result	= mysqli_query($con,"SELECT * FROM user WHERE firstname LIKE '$content%' LIMIT 5 ");
$search_count	= mysqli_num_rows($search_result);

if ($search_count > 0)
	{
	while($search_row = mysqli_fetch_array($search_result))
		{
		if ($search_row['u_id'] != $_SESSION['user']['uid'])
			{
			$this_id				= $search_row['u_id'];
			$this_firstname			= $search_row['firstname'];
			$this_lastname 			= $search_row['lastname'];
			$this_display_image 	= $search_row['display_image'];
			
			?>
            <a href="../profile/?id=<?php echo $this_id;?>">
			<div class="quick_search_item">
			<table cellpadding="1" cellspacing="0">
			<tr><td width="100" height="100" style="text-align:center;"><img src="<?php echo $this_display_image;?>" width="100" height="100"></td>
            <td width="150" height="40"><?php echo $this_firstname. ' '. $this_lastname;?></td></tr>
			</table>
			</div>
    	<?php
			}
		}
	mysqli_close($con);
	}
?>