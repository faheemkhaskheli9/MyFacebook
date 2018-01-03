<?php
session_start();
include('../includes/connect.php');
$email 			= $_POST['email'];
$cloc 			= $_POST['cloc'];
$hometown		= $_POST['hometown'];
$pnum			= $_POST['pnum'];
$doby 			= $_POST['doby'];
$dobm 			= $_POST['dobm'];
$dobd 			= $_POST['dobd'];
$relation 		= $_POST['relation'];
$result			= $_POST['result'];
if ($email == 'private')
	$email = 0;
else
	$email = 1;
if ($cloc == 'private')
	$cloc = 0;
else
	$cloc = 1;
if ($hometown == 'private')
	$hometown = 0;
else
	$hometown = 1;
if ($pnum == 'private')
	$pnum = 0;
else
	$pnum = 1;
if ($doby == 'private')
	$doby = 0;
else
	$doby = 1;
if ($dobm == 'private')
	$dobm = 0;
else
	$dobm = 1;	
if ($dobd == 'private')
	$dobd = 0;
else
	$dobd = 1;
if ($relation == 'private')
	$relation = 0;
else
	$relation = 1;
if ($result == 'private')
	$result = 0;
else
	$result = 1;
$userid	=	$_SESSION['user']['uid'];
$results = mysqli_query($con,"SELECT * FROM privacy WHERE u_id = $userid ");
$count = mysqli_num_rows($results);
if ($count != 1)
	mysqli_query($con,"INSERT INTO privacy(u_id) VALUES(".$userid.")");
mysqli_query($con,"UPDATE privacy SET email = ".$email.",current_location = ".$cloc.",hometown = ".$hometown.",phone_number = ".$pnum.",doby = ".$doby.",dobm = ".$dobm.",dobd = ".$dobd.",relation = ".$relation.",result = ".$result." WHERE u_id = ".$userid);
echo mysqli_error($con);
header("Location: ./index.php");
?>