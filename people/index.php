<?php
include('../config.php');
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
<title>People</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
<script src="script.js"></script>
</head>

<body oncontextmenu="return false;">

<?php 
include_once('../includes/header.php');
?>

<center>
<div id="nav">
<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();
$search_result	= mysqli_query($con,"SELECT * FROM user ");
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
			<div class="tab">
			<div id="heading" ><h2><?php echo $this_firstname . ' ' . $this_lastname;?></h2></div>
			<table cellpadding="5" cellspacing="10">
			<tr><td rowspan="7" width="150" style="text-align:center;"><img src="<?php echo $this_display_image;?>" width="100" height="100"></td></tr>
			<tr><td width="150" height="40">Gender</td><td width="10">:</td><td width="200"><?php echo $this_gender;?></td></tr>
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
				<td id="follow_button_<?php echo $this_id;?>"><div class="button" style="display:inline-block;background-color:#00CC00" onClick="stop_update('<?php echo $this_id;?>')">Following</div></td>
				<?php
				}
			else
				{
			?>
				<td id="follow_button_<?php echo $this_id;?>"><div class="button" style="display:inline-block;" onClick="get_update('<?php echo $this_id;?>')">Follow</div></td>
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
	}
include_once('../other.php');
?>

</div>
</center>

</body>
</html>