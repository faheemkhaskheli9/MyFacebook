<?php
session_start();
include('../includes/connect.php');
$name	=	mysqli_real_escape_string($con,$_POST['title']);
$uid	= $_SESSION['user']['uid'];
$q1 = mysqli_query($con,"INSERT INTO groups (gname,admin) VALUES('$name',$uid)");
if ($q1)
$result = mysqli_query($con,"SELECT g_id FORM groups WHERE gname = '$name' ");
$row = mysqli_fetch_array($result);
header('Location : ../groups/show.php?gid='.$row['g_id']);
?>