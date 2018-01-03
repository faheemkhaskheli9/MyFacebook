<?php
include('../config.php');
if (!isset($_SESSION['user']))
header('Location: ../');
include_once('../includes/connect.php');
if (!isset($_GET['id']))
	$_GET['id'] = $_SESSION['user']['uid'];
$id		= mysqli_real_escape_string($con,$_GET['id']);
$result = mysqli_query($con,"SELECT * FROM user WHERE u_id = $id ");
$count	= mysqli_num_rows($result);
if ($count == 1)
	{
	$row = mysqli_fetch_array($result);
	$this_id				= $row['u_id'];
	$this_firstname			= $row['firstname'];
	$this_lastname 			= $row['lastname'];
	$this_email				= $row['email'];
	$this_gender			= $row['gender'];
	$this_status			= $row['status'];
	$this_dob_day			= $row['dob_day'];
	$this_dob_mon			= $row['dob_mon'];
	$this_dob_yrs			= $row['dob_yrs'];
	$this_display_image 	= $row['display_image'];
	$this_home_town			= $row['home_town'];
	$this_current_location	= $row['current_location'];
	$this_relationship		= $row['relationship'];
	$this_phone_number		= $row['phone_number'];
	
	if ($this_status == 'Student')
		{
		$s_result = mysqli_query($con,"SELECT * FROM students WHERE u_id = $this_id");
		$s_row	= mysqli_fetch_array($s_result);
		$this_department	= $s_row['department'];
		$this_batch			= $s_row['batch'];
		$this_rollno		= $s_row['rollnumber'];
		$this_enrollno		= $s_row['enrollmentno'];
		$this_joindate		= $s_row['join_date'];
		
		$d_result	= mysqli_query($con,"SELECT * FROM departments WHERE dept_id = $this_department");
		$d_row	= mysqli_fetch_array($d_result);
		$this_department	= $d_row['dept_name'].'( '.$d_row['dept_short'].' )';
		}
	}
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Entire Web is a General Purpose Website Here you will find lots of usefull things , it support lots of different features such as Social Network, Blog, Question & Answers, Free Ads">
<meta name="keywords" content="demsite,Demonic Website,Faheem Khaskheli,Meet New People,Make New Friends,Find Friends">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title><?php echo $this_firstname . ' ' . $this_lastname;?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="../updates/style.css" rel="stylesheet" type="text/css" />
<link href="../like/style.css" rel="stylesheet" type="text/css" />
<link href="../comment/style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="../like/script.js"></script>
<script src="../comment/script.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
<script src="script.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="map.js"></script>
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
<?php if($id != $_SESSION['user']['uid']) {
$user_id = $_SESSION['user']['uid'];
$friends_result = mysqli_query($con,"SELECT * FROM contacts WHERE ((user_Id = '$id' AND target_id = '$user_id') OR (user_Id = '$user_id' AND target_id = '$id')) AND hide = '0'");
$is_friend = mysqli_num_rows($friends_result);
if ($is_friend == 1)
	{
?>
<tr><td id="friend_button"><div class="sub_menu_icon" onClick="remove_friend('<?php echo $id;?>')"><img src="../images/icons/remove5.png"><br/>Remove Friend</div></td></tr>
<?php
	}
else
	{
?>
<tr><td id="friend_button"><div class="sub_menu_icon" onClick="add_friend('<?php echo $id;?>')"><img src="../images/icons/add19 (1).png"><br/>Add Friend</div></td></tr>
<?php
	}
?>
<tr><td ><div class="sub_menu_icon" onClick="show_send_message_interface('<?php echo $this_id;?>')"><img src="../images/"><br/>Send Message</div>
</td></tr>
<tr><td ></td></tr>
<?php } 
else {
?>
<tr><td><a href="./editprofile.php"><div class="sub_menu_icon" id="edit_profile_button"><img src="../images/icons/pencil29.png"><br/>Edit</div></a></td></tr>
<?php
	}
?>
</table>
</div>
</td>
<td id="sub_menu_title" onClick="sub_menu()"><div class="heading">Profile</div></td>
</tr>
</table>
</div>

<div class="tab">
<div id="heading" ><h2><?php echo $this_firstname . ' ' . $this_lastname;?></h2></div>
<!--<div><img src="../images/setting.png" width="30" height="30"></div>-->
<table cellpadding="5" cellspacing="10">
<tr>
	<td rowspan="9" width="150" style="text-align:center;">
    <div id="display_pic"><img src="<?php echo $this_display_image;?>" width="100" height="100"></div>
    <div id="edit_display_pic">
    <div id="display_pic_preview"></div>
    <form action="upload_dp.php" method="post" enctype="multipart/form-data" id="displaypicform">
    <input type="file" name="displaypic" style="width:200px;">
    </form>
    <button onClick="upload_dp()">Upload</button>
    </div>
    </td>
</tr>
<tr>
	<td>Gender</td>
    <td width="10">:</td>
    <td>
    	<div id="gender"><?php echo $this_gender;?></div>
        <div id="edit_gender">
    	<select id="gender_value">
        <option value="male" <?php if($this_gender == 'Male'){ echo 'selected';}?>>Male</option>
        <option value="female" <?php if($this_gender == 'Female'){ echo 'selected';}?>>Female</option>
        </select>
        </div>
	</td>
</tr>
<tr>
	<td>Date Of Birth</td>
    <td width="10">:</td>
    <td>
    	<div id="date"><?php echo $this_dob_day.'/'.$this_dob_mon.'/',$this_dob_yrs;?></div>
        <div id="edit_date">
        <table>
        <tr><td>Day</td><td width="10">:</td><td><input type="number" value="<?php echo $this_dob_day;?>" id="dob_day_value" min="1" max="31" style="width:60px"></td>
        <td>Month</td><td width="10">:</td><td><input type="number" value="<?php echo $this_dob_mon;?>" id="dob_mon_value" min="1" max="12" style="width:60px"></td>
        <td>Year</td><td width="10">:</td><td><input type="number" value="<?php echo $this_dob_yrs;?>" id="dob_yrs_value" min="1" max="2014" style="width:80px"></td></tr>
        </table>
        </div>
    </td>
</tr>
<tr>
	<td>Home Town</td>
    <td width="10">:</td>
    <td>
	<div id="home_town"><?php echo $this_home_town;?></div>
    <div id="edit_home_town"><input type="text" id="home_town_value" value="<?php echo $this_home_town;?>"></div>
    </td>
</tr>
<tr>
	<td>Relationship</td>
    <td width="10">:</td>
    <td>
		<div id="relationship"><?php echo $this_relationship;?></div>
        <div id="edit_relationship">
        <select id="relationship_value">
        	<option value="Single"					>Single</option>
            <option value="In A Relationship"		>In A Relationship</option>
            <option value="In An Open Relationship"	>In An Open Relationship</option>
            <option value="Married"					>Married</option>
            <option value="Engaged"					>Engaged</option>
            <option value="Seperated"				>Seperated</option>
            <option value="It`s Complicated"		>It`s Complicated</option>
            <option value="Divorced"				>Divorced</option>
            <option value="Widowed"					>Widowed</option>
        </select>
        </div>
    </td>
</tr>
</table>
</div>

<div id="profile_menu">
<div class="profile_menu_item" onClick="show_profile_detail('contact detail','<?php echo $id;?>')">Contact Detail</div>
<div class="profile_menu_item" onClick="show_profile_detail('student detail','<?php echo $id;?>','<?php echo $this_status;?>')">Student Detail</div>
<div class="profile_menu_item" onClick="show_profile_detail('posts','<?php echo $id;?>')">Posts</div>
<div class="profile_menu_item" onClick="show_profile_detail('photos','<?php echo $id;?>')">Photos</div>
<div class="profile_menu_item" onClick="show_profile_detail('results','<?php echo $id;?>')">Results</div>
<div class="profile_menu_item" onClick="show_profile_detail('location','<?php echo $id;?>')">Location Map</div>
</div>

<div id="profile_detail_result">
</div>

<!--
<td>
<div id="places" class="tab">
<div id="heading"><h2>Places Visited</h2></div>
<div style="margin:10px;">
Karachi Pakistan
</div>
</div>
</td>
<td>
<div id="education" class="tab">
<div id="heading"><h2>Education</h2></div>
<div style="margin:10px;">
MUET
</div>
</div>
</td>
<td>
<div id="work" class="tab">
<div id="heading"><h2>Work</h2></div>
<div style="margin:10px;">
Karachi sindh Pakistan
</div>
</div>
</td>
<td>
<div id="political" class="tab">
<div id="heading"><h2>Political Views</h2></div>
<div style="margin:10px;">
None
</div>
</div>
</td>
<td>
<div id="religious" class="tab">
<div id="heading"><h2>Religious Views</h2></div>
<div style="margin:10px;">
None
</div>
</div>
</td>
-->

<!--
<td>
<div id="websites" class="tab">
<div id="heading"><h2>Websites</h2></div>
</div>
</td>
<td>
<div id="family" class="tab">
<div id="heading"><h2>Family</h2></div>
</div>
</td>
-->

<?php
mysqli_close($con);
include_once('../other.php');
?>

</div>
</center>

</body>
</html>