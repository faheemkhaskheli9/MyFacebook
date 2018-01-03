<?php
session_start();
$jsondata = '';
if (isset($_SESSION['user']['uid']))
	{
	include_once('../includes/connect.php');
	$uid	= $_SESSION['user']['uid'];
	$result = mysqli_query($con,"SELECT * FROM user WHERE u_id <> $uid"); 
	$jsondata = ' {"user_location": [ ';
	while ($row = mysqli_fetch_array($result))
		{
		$loc_result = mysqli_query($con,"SELECT * FROM location WHERE uid = ".$row['u_id']." ORDER BY date_times DESC LIMIT 1");
		if (mysqli_num_rows($loc_result) > 0)
			{
			if ($jsondata != ' {"user_location": [ ')
			$jsondata .= ',';
			$row_loc = mysqli_fetch_array($loc_result);
			$jsondata .= '{"name":"'.$row['firstname'] . ' ' .$row['lastname'].'","latitude":'.$row_loc['latitude'].',"longitude":'.$row_loc['longitude'].'}';
			}
		}
	mysqli_close($con);
	}
	$jsondata .= ']}';
	echo $jsondata;
?>