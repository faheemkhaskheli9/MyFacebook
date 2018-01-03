<?php
include_once('../includes/connect.php');
session_start();
$uid			= $_SESSION['user']['uid'];
$filename		= mysqli_real_escape_string($con,$_FILES['displaypic']['name']);
$allowedExts 	= array("jpeg","jpg","png","gif");
$temp 			= explode(".", $_FILES["displaypic"]["name"]);
$name 			= explode(".", $_FILES["displaypic"]["name"]);
$newname		= $name[0] . rand(0,1000) . rand(0,1000) . rand(0,1000);
$extension 		= end($temp);
if ( in_array($extension, $allowedExts) && $filename != '' )
	{
   	if ($_FILES["displaypic"]["error"] > 0)
     	{
     	$_SESSION['error'] = "Return Code: " . $_FILES["displaypic"]["error"] . "<br>";
     	}
   	else
     	{
       	move_uploaded_file($_FILES["displaypic"]["tmp_name"],"../images/photos/" . $newname . '.' . $extension);
		$newimagepath	=	"../images/photos/" . $newname . '.' . $extension;
		$new_name		=	$newname . '.' . $extension;
		$time 			=	time();
		$sql	=	mysqli_query($con,"UPDATE user SET display_image = '$newimagepath' WHERE u_id = '$uid'");
		mysqli_query($con,"INSERT INTO images (name,uploaded_by,times) VALUES ('$new_name','$uid',$time) ");	
		mysqli_close($con);
       	echo '<img src="../images/photos/'.$newimagepath.'" width="100" height="100"/>';
		$_SESSION['user']['display_image'] = $newimagepath;
     	}
   	}
?>