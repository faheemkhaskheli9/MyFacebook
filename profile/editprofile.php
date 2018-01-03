<?php
include('../config.php');
if (!isset($_SESSION['user']))
	header('Location: ../');
include_once('../includes/connect.php');
$id		= mysqli_real_escape_string($con,$_SESSION['user']['uid']);
$result 	= mysqli_query($con,"SELECT * FROM user WHERE u_id = $id ");
$count		= mysqli_num_rows($result);
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
<?php if($id != $_SESSION['user']['uid']) {?>
<tr><td ><a href="../updates"><div class="sub_menu_icon"><img src="../images/"><br/>Add Friend</div></a></td></tr>
<tr><td ><div class="sub_menu_icon" onClick="show_send_message_interface('<?php echo $this_id;?>')"><img src="../images/"><br/>Send Message</div>
</td></tr>
<tr><td ></td></tr>
<?php } 
else {
?>
<tr><td><a href="./"><div class="sub_menu_icon" id="edit_profile_button"><img src="../images/icons/default_image.png"><br/>View</div></a></td></tr>
<?php } ?>
</table>
</div>
</td>
<td id="sub_menu_title" onClick="sub_menu()"><div class="heading">Profile</div></td>
</tr>
</table>
</div>

<div class="tab">
<div id="heading" ><h2>Edit Profile</h2></div>
<form action="save_data.php" method="post">
<table>
<tr><td colspan="2"><hr></td></tr>
<tr><th colspan="2">Basic</th></tr>
<tr><td colspan="2"><hr></td></tr>
<tr><td>First Name</td><td><input type="text" name="firstname" id="firstname" value="<?php echo $this_firstname;?>"></td></tr>
<tr><td>Last Name</td><td><input type="text" name="lastname" id="lastname" value="<?php echo $this_lastname;?>"></td></tr>
<tr><td>Relationship</td>
<td><select id="relationship_value" name="relationship_value">
        <option value="Single">Single</option>
        <option value="In A Relationship">In A Relationship</option>
        <option value="In An Open Relationship"	>In An Open Relationship</option>
        <option value="Married"	>Married</option>
        <option value="Engaged"	>Engaged</option>
        <option value="Seperated">Seperated</option>
        <option value="It`s Complicated">It`s Complicated</option>
        <option value="Divorced">Divorced</option>
        <option value="Widowed"	>Widowed</option>
        </select></td>
</tr>
<tr><td>Gender</td><td><select id="gender_value" name="gender_value">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select></td></tr>
<tr><td>Home Town</td><td><input type="text" id="home_town_value" name="home_town_value" value="<?php echo $this_home_town;?>"></td></tr>
<tr><td>Date Of Birth</td><td>
	<table>
        <tr><td>Day</td><td width="10">:</td><td><input type="number" value="<?php echo $this_dob_day;?>" id="dob_day_value" name="dob_day_value" min="1" max="31" style="width:60px"></td>
        <td>Month</td><td width="10">:</td><td><input type="number" value="<?php echo $this_dob_mon;?>" id="dob_mon_value" name="dob_mon_value" min="1" max="12" style="width:60px"></td>
        <td>Year</td><td width="10">:</td><td><input type="number" value="<?php echo $this_dob_yrs;?>" id="dob_yrs_value" name="dob_yrs_value" min="1" max="2014" style="width:80px"></td></tr>
        </table>
        </td></tr>    
<tr><td colspan="2"><hr></td></tr>
<tr><th colspan="2">Contact</th></tr>
<tr><td>Phone Number</td><td><input type="text" name="phonenumber" id="phonenumber" value="<?php echo $this_phone_number;?>"></td></tr>
<tr><td>Email</td><td><input type="email" name="email" id="email" value="<?php echo $this_email;?>"></td></tr>
<tr><td colspan="2"><hr></td></tr>
<tr><th colspan="2">Student</th></tr>
<tr><td colspan="2"><hr></td></tr>
<tr><td>Department</td><td>
<select id="department" name="department">
<?php
$dept_result = mysqli_query($con,"SELECT * FROM departments");
while($dept_row = mysqli_fetch_array($dept_result))
	{
	echo '<option value="'.$dept_row['dept_id'].'">'.$dept_row['dept_name'].'</option>';
	}
?>
</select>
</td></tr>
<tr><td>Batch</td><td><input type="number" min="0" max="99" name="batch" id="batch" value="<?php echo $this_batch;?>"></td></tr>
<tr><td>Roll Number</td><td><input type="number" min="1" max="300" name="rollnumber" id="rollnumber" value="<?php echo $this_rollno;?>"></td></tr>
<tr><td>Enrollment Number</td><td><input type="text" name="enrollno" id="enrollno" value="<?php echo $this_enrollno;?>"></td></tr>
<tr><td>Join Date</td>
	<table>
        <tr><td>Day</td><td width="10">:</td><td><input type="number" value="<?php echo $this_dob_day;?>" id="join_day_value" name="join_day_value" min="1" max="31" style="width:60px"></td>
        <td>Month</td><td width="10">:</td><td><input type="number" value="<?php echo $this_dob_mon;?>" id="join_mon_value" name="join_mon_value" min="1" max="12" style="width:60px"></td>
        <td>Year</td><td width="10">:</td><td><input type="number" value="<?php echo $this_dob_yrs;?>" id="join_yrs_value" name="join_yrs_value" min="1" max="2014" style="width:80px"></td></tr>
        </table>
        </td></tr>

<tr><td colspan="2"><hr></td></tr>

<tr><td colspan="2"><input type="submit" value="save"></td></tr>

</table>
<form>

</div>

<?php
mysqli_close($con);
include_once('../other.php');
?>

</div>
</center>

</body>
</html>