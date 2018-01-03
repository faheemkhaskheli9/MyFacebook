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
<title><?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'];?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
</head>

<body oncontextmenu="return false;">

<?php 
include_once('../includes/header.php');
?>

<center>
<div id="nav">

<?php
include_once('../includes/connect.php');
$uid	= $_SESSION['user']['uid'];
$result = mysqli_query($con,"SELECT * FROM contacts WHERE (user_Id = '$uid' OR target_id = '$uid') AND hide = 0");
if ($result)
	{
	$user_list = array();
	while($row = mysqli_fetch_array($result))
		{
		if ($row['user_Id'] == $uid)
			array_push($user_list,$row['target_id']);
		if ($row['target_id'] == $uid)
			array_push($user_list,$row['user_Id']);			
		}
	foreach($user_list as $u)
		{
		$contact_result = mysqli_query($con,"SELECT * FROM user WHERE u_id = $u");
		$contact_person = mysqli_fetch_array($contact_result);
		?>
		<div class="tab">
		<a href="../profile/?id=<?php echo $contact_person['u_id'];?>"><div id="heading" ><h2><?php echo $contact_person['firstname'] . ' ' . $contact_person['lastname'];?></h2></div></a>
		<table cellpadding="5" cellspacing="10">
		<tr>
			<td rowspan="6" width="150"><a href="../profile/?id=<?php echo $contact_person['u_id'];?>"><img src="<?php echo $contact_person['display_image'];?>" width="100" height="100"></a></td>
		</tr>
		<tr>
			<td width="150" height="40">Gender</td>
			<td width="10">:</td>
			<td width="150"><?php echo $contact_person['gender'];?></td>
		</tr>
		<tr>
			<td width="150" height="40">Home Town</td>
			<td width="10">:</td>
			<td width="150"><?php echo $contact_person['home_town'];?></td>
		</table>
		</div>
		<?php
		}
	}
else
	{
	?>
    <center>
    <div style="Padding:10px;color:#FFFFFF;background-color:#993333;width:500px;margin-bottom:400px;margin-top:20px;">Your Contact List is Empty</div>
    </center>
    <?php
	}
	?>

<?php
include_once('../other.php');
?>

</div>
</center>

<?php
include_once('../notification/notification.php');
?>

<div id="right_click_menu"></div>

</body>
</html>