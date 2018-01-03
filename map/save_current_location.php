<?php
session_start();
include('../includes/connect.php');
$uid 	= $_SESSION['user']['uid'];
$lat 	= mysqli_real_escape_string($con,$_GET['lat']);
$long 	= mysqli_real_escape_string($con,$_GET['long']);
mysqli_query($con,"INSERT INTO location(uid,latitude,longitude) VALUES($uid,$lat,$long)");
?>