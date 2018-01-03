<?php
include_once('../includes/connect.php');
include('../config.php');
$allowedExts = array("gif", "jpeg", "jpg", "png");
$allowedVideoExts = array("flv");
if (!isset($_FILES["file"]))
	{
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& in_array($extension, $allowedExts)) 
		{
		if($_FILES["file"]["size"] > 20000000)
			{
			echo "File Size Too Large";
			}
		if ($_FILES["file"]["error"] > 0) 
			{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			} 
		else 
			{
			$newname = $extension.'_image_'.mysqli_real_escape_string($con,$temp[0]).'_'.rand(0, 1024).rand(0, 1024).rand(0, 1024).'.'.$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"],"../images/" .$newname);
			echo "<div style='padding:10px;'><img src='" . "../images/" . $newname."' style=\"max-width:480px;\"/></div>";
			}
		}
	else 
		{
		echo "Invalid file";
		}
	} 
else
	{
	if(isset($_FILES["file"]) && $_FILES["file"]["error"]== UPLOAD_ERR_OK)
		{
    	$File_Name          = mysqli_real_escape_string($con,strtolower($_FILES['file']['name']));
		$temp = explode(".", $File_Name);
		$extension = end($temp);
    	############ Edit settings ##############
    	if (in_array($extension, $allowedVideoExts))
		$UploadDirectory    = '../videos/'; //specify upload directory ends with / (slash)
		if (in_array($extension, $allowedExts))
		$UploadDirectory    = '../images/photos/';
    	##########################################
   
    /*
    Note : You will run into errors or blank page if "memory_limit" or "upload_max_filesize" is set to low in "php.ini".
    Open "php.ini" file, and search for "memory_limit" or "upload_max_filesize" limit
    and set them adequately, also check "post_max_size".
    */
   
    //check if this is an ajax request
//    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
//        die();
//    }
      
    //Is file size is less than allowed size.
    	if ($_FILES["file"]["size"] > 1024000000) {
        die("File size is too big!");
    	}
    //allowed file type Server side check
    	switch(strtolower($_FILES['file']['type']))
     	   {
            //allowed file types
            case 'image/png':
            case 'image/gif':
            case 'image/jpeg':
            case 'image/pjpeg':
            case 'application/octet-stream':
			case 'video/x-flv':
                break;
            default:
                die('Unsupported File!'.$_FILES['file']['type']); //output error
    		}
	
    	$temp = explode(" ", $File_Name );
		$temp = implode("-", $temp);
		$temp = explode(".", $temp);
		$newname = $extension.'_'.$temp[0].'_'.rand(0, 1024).rand(0, 1024).rand(0, 1024);
		$fullnewname = $newname.'.'.$extension;
		   
    	if(move_uploaded_file($_FILES['file']['tmp_name'], $UploadDirectory.$fullnewname ))
       		{	
			if (in_array($extension, $allowedVideoExts))
				{
				?>
				<iframe src="../videos/play.php?path=<?php echo $newname;?>" width="480" height="300" style="padding:0px;margin:0px;" frameborder="0" scrolling="no"></iframe>
				<?php
				}
			else
				{
				include_once('../includes/connect.php');
				$time = time();
				mysqli_query($con,"INSERT INTO images (name,uploaded_by,upload_date,album) VALUES('../images/photos/$fullnewname','$uid','time()','post')");
				echo "<div style='padding:10px;'><img src='" . "../images/photos/" . $fullnewname."' style=\"max-width:100%;\"/></div>";
				mysqli_close($con);
				}
	        	// do other stuff
               	//die('Success! File Uploaded.');
    		}else{
        	die('error uploading File!');
    		}
		}
	else
		{
    	die('Something wrong with upload! Is "upload_max_filesize" set correctly?');
		}
	}
?>