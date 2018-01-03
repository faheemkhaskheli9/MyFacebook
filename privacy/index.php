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
<title>Privacy</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
</head>

<body>

<?php 
include_once('../includes/header.php');
?>

<center>
<div id="nav">

<div class="tab">
<div id="heading" ><h2><?php echo $this_firstname . ' ' . $this_lastname;?> - Privacy</h2></div>

<?php

$result = mysqli_query($con,"SELECT * FROM privacy WHERE u_id = $uid ");
$row = mysqli_fetch_array($result);
	echo '
	<form action="./update_privacy.php" method="post">
	<table cellpadding="10">
	<tr> <td>Email</td> <td><select name="email"><option value="private">Private</option><option value="public">Public</option></select>';
	if ($row['email'] == 0) {echo '&nbsp;&nbsp;&nbsp;Private';} else { echo '&nbsp;&nbsp;&nbsp;Public';}
	echo '</td> </tr>
	<tr> <td>Current Location</td> <td><select name="cloc"><option value="private">Private</option><option value="public">Public</option></select>';
	if ($row['current_location'] == 0) {echo '&nbsp;&nbsp;&nbsp;Private';} else { echo '&nbsp;&nbsp;&nbsp;Public';}
	echo '</td> </tr>
	<tr> <td>Hometown</td> <td><select name="hometown"><option value="private">Private</option><option value="public">Public</option></select>';
	if ($row['hometown'] == 0) {echo '&nbsp;&nbsp;&nbsp;Private';} else { echo '&nbsp;&nbsp;&nbsp;Public';}
	echo '</td> </tr>
	<tr> <td>Phone Number</td> <td><select name="pnum"><option value="private">Private</option><option value="public">Public</option></select>';
	if ($row['phone_number'] == 0) {echo '&nbsp;&nbsp;&nbsp;Private';} else { echo '&nbsp;&nbsp;&nbsp;Public';}
	echo '</td> </tr>
	<tr> <td>Date Of Birth ( Year )</td> <td><select name="doby"><option value="private">Private</option><option value="public">Public</option></select>';
	if ($row['doby'] == 0) {echo '&nbsp;&nbsp;&nbsp;Private';} else { echo '&nbsp;&nbsp;&nbsp;Public';}
	echo '</td> </tr>
	<tr> <td>Date Of Birth ( Month )</td> <td><select name="dobm"><option value="private">Private</option><option value="public">Public</option></select>';
	if ($row['dobm'] == 0) {echo '&nbsp;&nbsp;&nbsp;Private';} else { echo '&nbsp;&nbsp;&nbsp;Public';}
	echo '</td> </tr>
	<tr> <td>Date Of Birth ( Day )</td> <td><select name="dobd"><option value="private">Private</option><option value="public">Public</option></select>';
	if ($row['dobd'] == 0) {echo '&nbsp;&nbsp;&nbsp;Private';} else { echo '&nbsp;&nbsp;&nbsp;Public';}
	echo '</td> </tr>
	<tr> <td>Relationship</td> <td><select name="relation"><option value="private">Private</option><option value="public">Public</option></select>';
	if ($row['relation'] == 0) {echo '&nbsp;&nbsp;&nbsp;Private';} else { echo '&nbsp;&nbsp;&nbsp;Public';}
	echo '</td> </tr>
	<tr> <td>Result</td> <td><select name="result"><option value="private">Private</option><option value="public">Public</option></select>';
	if ($row['result'] == 0) {echo '&nbsp;&nbsp;&nbsp;Private';} else { echo '&nbsp;&nbsp;&nbsp;Public';}
	echo '</td> </tr>
	</table>
	<input type="submit" value="Update">
	</form>
	';

?>
</div>

<?php
mysqli_close($con);
include_once('../other.php');
?>

</div>
</center>

</body>
</html>