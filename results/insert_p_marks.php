<?php
session_start();
include_once('../includes/connect.php');
$subid 	= mysqli_real_escape_string($con,$_GET['subid']);
$u_id 	= $_SESSION['user']['uid'];
$marks	= mysqli_real_escape_string($con,$_GET['marks']);
mysqli_query($con,"INSERT INTO results (sub_id,u_id,p_marks) VALUES($subid,$u_id,$marks)");
mysqli_query($con,"UPDATE results SET p_marks = $marks WHERE sub_id = $subid AND u_id = $u_id");
echo $marks
?>