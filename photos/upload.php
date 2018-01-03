<?php
function upload_pic($pic)
	{
	$result = array();
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	if($pic['size'] > 0 && $pic["error"]== 0)
		{
		$File_Name          = strtolower($pic['name']);
		$temp = explode(".", $File_Name);
		$extension = end($temp);
		############ Edit settings ##############
		if (in_array($extension, $allowedExts)){
		$UploadDirectory    = '../images/photos/';
		}
		##########################################
	//Is file size is less than allowed size.
		if ($pic["size"] > 1024000000) 
			{
			$result['error'] = "File Too Large";
			}
	//allowed file type Server side check
		switch(strtolower($pic['type']))
		   {
			//allowed file types
			case 'image/png':
			case 'image/gif':
			case 'image/jpeg':
			case 'image/pjpeg':
			case 'application/octet-stream':
				break;
			default:
				$result['error'] = 'Unsupported File!'.$pic['type']; //output error
			}
	
		$temp = explode(" ", $File_Name );
		$temp = implode("-", $temp);
		$temp = explode(".", $temp);
		$newname = $extension.'_'.$temp[0].'_'.rand(0, 1024).rand(0, 1024).rand(0, 1024);
		$fullnewname = $newname.'.'.$extension;
		   
		if(move_uploaded_file($pic['tmp_name'], $UploadDirectory.$fullnewname ))
			{	
			//include_once('../includes/connect.php');
			//$time = time();
			//mysqli_query($con,"INSERT INTO paper (name,uploaded_by,upload_date,album) VALUES('../images/photos/$fullnewname','$uid','time()','post')");
			$result['name'] = $fullnewname;
			//mysqli_close($con);
			}
		else
			{
			$result['error'] = 'error uploading File!';
			}
		}
	else
		{
		$result['error'] = 'Something wrong with upload! Is "upload_max_filesize" set correctly?';
		}
	return $result;
	}
?>