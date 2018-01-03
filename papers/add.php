<?php
include('../includes/connect.php');
include('../includes/functions.php');
include('../config.php');

$uid		=	$_SESSION['user']['uid'];
$subject	=	mysqli_real_escape_string($con,$_POST['subject']);
$department	=	mysqli_real_escape_string($con,$_POST['department']);
$batch		=	mysqli_real_escape_string($con,$_POST['batch']);
$term		=	mysqli_real_escape_string($con,$_POST['term']);
$date		=	mysqli_real_escape_string($con,$_POST['date']);

if ($subject != '' && $department != '' && $batch != '' && $term != '' && $date != '')
	{
	if (isset($_FILES['photo1']))
	{$file_name_1 = upload_pic($_FILES['photo1']);}
	if (isset($_FILES['photo2']))
	{$file_name_2 = upload_pic($_FILES['photo2']);}
	if (isset($_FILES['photo3']))
	{$file_name_3 = upload_pic($_FILES['photo3']);}
	if (isset($_FILES['photo4']))
	{$file_name_4 = upload_pic($_FILES['photo4']);}
	
	if (!isset($file_name_1['error']))
		$photo1 = $file_name_1['name'];
	if (!isset($file_name_2['error']))
		$photo2 = $file_name_2['name'];
	if (!isset($file_name_3['error']))
		$photo3 = $file_name_3['name'];
	if (!isset($file_name_4['error']))
		$photo4 = $file_name_4['name'];
	if (!isset($photo1))
		$photo1 = '';
	if (!isset($photo2))
		$photo2 = '';
	if (!isset($photo3))
		$photo3 = '';
	if (!isset($photo4))
		$photo4 = '';
		
	if ($photo1 != '' || $photo2 != '' || $photo3 != '' || $photo4 != '' || $photo5 != '')
		{
	mysqli_query($con,"INSERT INTO paper (subject,batch,department,date,term,photo1,photo2,photo3,photo4,posted_by) VALUES('$subject','$batch','$department','$date','$term','../images/photos/$photo1','../images/photos/$photo2','../images/photos/$photo3','../images/photos/$photo4',$uid)");
	
	echo mysqli_error($con);
		}
	else
		echo '<br><br><a href="./">Go Back</a>';
	}
header('Location: ./');
?>