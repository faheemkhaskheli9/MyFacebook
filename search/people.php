<script src="../people/script.js"></script>
<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();
$content	= $_GET['content'];

$op	= '';
if (!isset($_GET['stype']))
	$op = ' AND ';
elseif ($_GET['stype'] == 'all')
	$op = ' AND ';
else
	$op = ' OR ';
	
$query = '';
if (isset($_GET['firstname']) && $_GET['firstname'] != '')
	$query	.= "firstname LIKE '".mysqli_real_escape_string($con,$_GET['firstname'])."%'";
if (isset($_GET['lastname']) && $_GET['lastname'] != '')
	{
	if ($query != '')
		$query .= $op;
	$query	.= " lastname LIKE '".mysqli_real_escape_string($con,$_GET['lastname'])."%'";
	}
if (isset($_GET['email']) && $_GET['email'] != '')
	{
	if ($query != '')
		$query .= $op;
	$query	.= " email LIKE '".mysqli_real_escape_string($con,$_GET['email'])."%'";
	}
if (isset($_GET['gender']) && $_GET['gender'] != '' && $_GET['gender'] != 'any')
	{
	if ($query != '')
		$query .= $op;
	$query	.= " gender = '".mysqli_real_escape_string($con,$_GET['gender'])."'";
	}
if (isset($_GET['status']) && $_GET['status'] != '' && $_GET['status'] != 'any')
	{
	if ($query != '')
		$query .= $op;
	$query	.= " status LIKE '".mysqli_real_escape_string($con,$_GET['status'])."%'";
	}
if (isset($_GET['hometown']) && $_GET['hometown'] != '')
	{
	if ($query != '')
		$query .= $op;
	$query	.= " home_town LIKE '".mysqli_real_escape_string($con,$_GET['hometown'])."%'";
	}
if (isset($_GET['relationship']) && $_GET['relationship'] != '')
	{
	if ($query != '')
		$query .= $op;
	$query	.= " relationship LIKE '".mysqli_real_escape_string($con,$_GET['relationship'])."%'";
	}
if (isset($_GET['phonenumber']) && $_GET['phonenumber'] != '')
	{
	if ($query != '')
		$query .= $op;
	$query	.= " phone_number LIKE '".mysqli_real_escape_string($con,$_GET['phonenumber'])."%'";
	}
if ($query == '')
$query .= "firstname LIKE '%".mysqli_real_escape_string($con,$_GET['content'])."%'";

$new_query = 'SELECT * FROM user';
if ($query != '')
$new_query .= ' WHERE '.$query;

$search_result	= mysqli_query($con,$new_query);
echo mysqli_error($con);
$search_count	= mysqli_num_rows($search_result);

if ($search_count > 0)
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
            <div class="tab">
			<a href="../profile/?id=<?php echo $this_id;?>">
            <div id="heading" ><h2><?php echo $this_firstname . ' ' . $this_lastname;?></h2></div>
            </a>
			<table cellpadding="0" cellspacing="0">
			<tr><td rowspan="7" width="150" style="text-align:center;"><img src="<?php echo $this_display_image;?>" width="100" height="100"></td></tr>
			<tr><td width="150" height="40">Gender</td><td width="10">:</td><td width="200"><?php echo $this_gender;?></td></tr>
			<tr><td width="150" height="40">Date Of Birth</td><td width="10">:</td><td width="200"><?php echo $this_dob;?></td></tr>
			<tr><td width="150" height="40">Home Town</td><td width="10">:</td><td width="200"><?php echo $this_home_town;?></td></tr>
			<tr><td width="150" height="40">Relationship</td><td width="10">:</td><td width="200"><?php echo $this_relationship;?></td></tr>
			<tr><td colspan="3">
			<table id="people_option_<?php echo $this_id;?>" class="people_option">
			<tr><td id="contacts_button_<?php echo $this_id;?>">
            
            <?php
            $is_in_contact_result = mysqli_query($con,"SELECT * FROM contacts WHERE user_Id = " . $_SESSION['user']['uid']." AND target_id = ". $this_id." AND hide = 0");
			$is_in_contact_count	= mysqli_num_rows($is_in_contact_result);
			if ($is_in_contact_count == 1)
				{
				?>
                <div class="button" style="color:#FFFFFF; background-color:#FF0000;" onClick="remove_from_contact(<?php echo $this_id;?>)">Remove From Contact</div>
                <?php
				}
			else
				{
			?>
            <div class="button" style="color:#FFFFFF; background-color:#00FF00;" onClick="add_to_contact(<?php echo $this_id;?>)">Add to Contact</div>
			<?php } ?>            
            </td>
            
			<!--<td><div class="button" style="display:inline-block;">Message</div></td>-->
			<?php
			$isfollow_result = mysqli_query($con,"SELECT * FROM follower WHERE u_id = ".$_SESSION['user']['uid']." AND f_id = ". $this_id . " AND hide = 0");
			if ($isfollow_result)
			$isfollow_count	= mysqli_num_rows($isfollow_result);
			if ($isfollow_count != 0)
				{
				?>
				<td id="follow_button_<?php echo $this_id;?>"><div class="button" style="display:inline-block;background-color:#00CC00" onclick="stop_update('<?php echo $this_id;?>')">Following</div></td>
				<?php
				}
			else
				{
			?>
			<td id="follow_button_<?php echo $this_id;?>"><div class="button" style="display:inline-block;" onclick="get_update('<?php echo $this_id;?>')">Follow</div></td>
			<?php
				}
			?>
			<!--<td><div class="button" style="display:inline-block;">Block</div></td></tr>-->
			</table>
			</td></tr>
			</table>
			</div>
    	<?php
			}
		}
	mysqli_close($con);
?>