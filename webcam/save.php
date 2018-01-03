<?php
include_once('../includes/connect.php');
session_start();
$uid			= $_SESSION['user']['uid'];

define('UPLOAD_DIR', '../images/photos/');
$img = $_POST['imgData'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = uniqid() . '.png';
$full_path	= UPLOAD_DIR.$file;
$success = file_put_contents($full_path, $data);
$output = '<div style="width:100px;margin:10px;display:inline-block;"><img src="'.$full_path.'" style="width:100%;"></div>';
print $success ? $output : 'Unable to save the file.';
$time 			=	time();
mysqli_query($con,"INSERT INTO images (name,uploaded_by,times) VALUES ('$full_path','$uid',$time) ");
echo mysqli_error($con);
?>