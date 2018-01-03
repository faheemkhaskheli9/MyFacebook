<?php
session_start();
include('../includes/connect.php');
if (isset($_POST['type']))
	$type = $_POST['type'];
if (isset($_POST['id']))
	$id = $_POST['id'];
if (isset($_SESSION['user']['uid']))
	$uid = $_SESSION['user']['uid'];
if ($type == 'question' && $id > 0)
	{
	mysqli_query($con,"UPDATE questions SET hide = 1 WHERE posted_by = '$uid' AND q_id = '$id'");
	}
if ($type == 'answer' && $id > 0)
	{
	mysqli_query($con,"UPDATE answers SET hide = 1 WHERE posted_by = '$uid' AND ans_id = '$id'");
	echo 'done';
	}
else
	{
	echo 'error';
	}
?>