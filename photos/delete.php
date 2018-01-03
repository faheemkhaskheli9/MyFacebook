<?php
include '../includes/connect.php';
session_start();
$uid	=	$_SESSION['user']['uid'];
$img_id	=	$_GET['img_id'];

if (mysqli_query($con,"UPDATE images SET hide = 1 WHERE img_id = '$img_id' AND uploaded_by = '$uid' "))
	echo 'done';
?>