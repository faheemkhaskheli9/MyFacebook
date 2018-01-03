<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();
$content	= mysqli_real_escape_string($con,$_GET['content']);
$search_result	= mysqli_query($con,"SELECT * FROM user WHERE firstname LIKE '$content%' ");
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
			$this_email				= $search_row['email'];
			$this_gender			= $search_row['gender'];
			$this_dob				= $search_row['dob_day'].' / '.$search_row['dob_mon'].' / '.$search_row['dob_yrs'];
			$this_display_image 	= $search_row['display_image'];
			$this_home_town			= $search_row['home_town'];
			$this_current_location	= $search_row['current_location'];
			$this_relationship		= $search_row['relationship'];
			
			$isfollow_result = mysqli_query($con,"SELECT * FROM follower WHERE u_id = " . $_SESSION['user']['uid'] ." AND f_id = ". $this_id);
			if ($isfollow_result)
			$isfollow_count	= mysqli_num_rows($isfollow_result);
			
			?>
			<div class="tab" onclick="people_option(<?php echo $this_id;?>)">
			<div id="heading" ><h2><?php echo $this_firstname . ' ' . $this_lastname;?></h2></div>
			<table cellpadding="5" cellspacing="10">
			<tr><td rowspan="7" width="150" style="text-align:center;"><img src="<?php echo $this_display_image;?>" width="100" height="100"></td></tr>
			<tr><td width="150" height="40">Gender</td><td width="10">:</td><td width="200"><?php echo $this_gender;?></td></tr>
			<tr><td width="150" height="40">Date Of Birth</td><td width="10">:</td><td width="200"><?php echo $this_dob;?></td></tr>
			<tr><td width="150" height="40">Current Location</td><td width="10">:</td><td width="200"><?php echo $this_current_location;?></td></tr>
			<tr><td width="150" height="40">Home Town</td><td width="10">:</td><td width="200"><?php echo $this_home_town;?></td></tr>
			<tr><td width="150" height="40">Relationship</td><td width="10">:</td><td width="200"><?php echo $this_relationship;?></td></tr>
			<tr><td colspan="3">
			<table id="people_option_<?php echo $this_id;?>" class="people_option">
			<tr><td id="contacts_button_<?php echo $this_id;?>"><div class="button" style="display:inline-block;" onclick="add_to_contact(<?php echo $this_id;?>)">Add to Contact</div></td>
			<td><div class="button" style="display:inline-block;">Message</div></td>
			<?php
			$isfollow_result = mysqli_query($con,"SELECT * FROM follower WHERE u_id = ".$_SESSION['user']['uid']." AND f_id = ". $this_id . " AND hide = 0");
			if ($isfollow_result)
			$isfollow_count	= mysqli_num_rows($isfollow_result);
			if ($isfollow_count != 0)
				{
				?>
				<td id="unfollow_button_<?php echo $this_id;?>"><div class="button" style="display:inline-block;background-color:#00CC00" onclick="stop_update('<?php echo $this_id;?>')">Following</div></td>
				<?php
				}
			else
				{
			?>
			<td id="follow_button_<?php echo $this_id;?>"><div class="button" style="display:inline-block;" onclick="get_update('<?php echo $this_id;?>')">Follow</div></td>
			<?php
				}
			?>
			<td><div class="button" style="display:inline-block;">Block</div></td></tr>
			</table>
			</td></tr>
			</table>
			</div>
    	<?php
			}
		}
	mysqli_close($con);
	}
?>