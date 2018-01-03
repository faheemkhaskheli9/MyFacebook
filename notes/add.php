<?php
include('../includes/connect.php');
include('../includes/functions.php');
include('../config.php');

$uid		=	$_SESSION['user']['uid'];
$subject	=	mysqli_real_escape_string($con,$_POST['subject']);
$department	=	mysqli_real_escape_string($con,$_POST['department']);
$batch		=	mysqli_real_escape_string($con,$_POST['batch']);
$term		=	mysqli_real_escape_string($con,$_POST['term']);
$chapter	=	mysqli_real_escape_string($con,$_POST['chapter_name']);
$book		=	mysqli_real_escape_string($con,$_POST['book']);
$author		=	mysqli_real_escape_string($con,$_POST['author']);
$source		=	mysqli_real_escape_string($con,$_POST['source']);
$content	=	mysqli_real_escape_string($con,$_POST['content']);
$publish	=	mysqli_real_escape_string($con,$_POST['publish_date']);

echo '1';
if ($subject != '' && $department != '' && $batch != '' && $term != '')
	{
	print_r($_FILES['file1']);
	if (isset($_FILES['file1']))
	{$file_name_1 = upload_file($_FILES['file1']);}
	if (isset($_FILES['file2']))
	{$file_name_2 = upload_file($_FILES['file2']);}
	if (isset($_FILES['file3']))
	{$file_name_3 = upload_file($_FILES['file3']);}
	if (isset($_FILES['file4']))
	{$file_name_4 = upload_file($_FILES['file4']);}
	if (isset($_FILES['file5']))
	{$file_name_5 = upload_file($_FILES['file5']);}
	echo '<br/><br/>';
	print_r($file_name_1);
	if (!isset($file_name_1['error']))
		$file1 = $file_name_1['name'];
	if (!isset($file_name_2['error']))
		$file2 = $file_name_2['name'];
	if (!isset($file_name_3['error']))
		$file3 = $file_name_3['name'];
	if (!isset($file_name_4['error']))
		$file4 = $file_name_4['name'];
	if (!isset($file_name_5['error']))
		$file5 = $file_name_5['name'];
	if (!isset($file1))
		$file1 = '';
	if (!isset($file2))
		$file2 = '';
	if (!isset($file3))
		$file3 = '';
	if (!isset($file4))
		$file4 = '';
	if (!isset($file5))
		$file5 = '';
		
	if ($file1 != '' || $file2 != '' || $file3 != '' || $file4 != '' || $file5 != '')
		{
		mysqli_query($con,"INSERT INTO notes (subject,batch,department,term,chapter_name,content,author,source,publish_date,bookname,file1,file2,file3,file4,file5,posted_by) VALUES('$subject','$batch','$department','$term','$chapter','$content','$author','$source','$publish','$book','$file1','$file2','$file3','$file4','$file4',$uid)");
	
	echo mysqli_error($con);
		}
	else
		echo '<br><br><a href="./">Go Back</a>';
	}
header('Location: ./');
?>