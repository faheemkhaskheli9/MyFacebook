<?php
include('../config.php');
if (!isset($_SESSION['user']))
header('Location: ../');
include_once('../includes/connect.php');
if (isset($_GET['id']))
	$id		= mysqli_real_escape_string($con,$_GET['id']);
else
	$id	= $_SESSION['user']['uid'];
$result = mysqli_query($con,"SELECT * FROM user WHERE u_id = $id ");
$count	= mysqli_num_rows($result);
if ($count == 1)
	{
	$row = mysqli_fetch_array($result);
	$this_id				= $row['u_id'];
	$this_firstname			= $row['firstname'];
	$this_lastname 			= $row['lastname'];
	}
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Entire Web is a General Purpose Website Here you will find lots of usefull things , it support lots of different features such as Social Network, Blog, Question & Answers, Free Ads">
<meta name="keywords" content="demsite,Demonic Website,Faheem Khaskheli,Meet New People,Make New Friends,Find Friends">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title><?php echo $this_firstname . ' ' . $this_lastname;?>`s Photos</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
<script src="script.js"></script>
</head>

<body>

<?php 
include_once('../includes/header.php');
?>

<center>
<div id="nav">

<div class="tab">
<div id="heading" ><h2>Photos</h2></div>
<center>
<?php
$image_result = mysqli_query($con,'SELECT * FROM images WHERE uploaded_by = '.$id.' AND hide = 0');
while($image_row= mysqli_fetch_array($image_result))
	{
	echo '
	<a href="./show.php?name='.$image_row['name'].'&id='.$image_row['img_id'].'"><div class="image_item" ><img src="'.$image_row['name'].'"></div></a>
	';
	}
?>
</center>
</div>

<div id="image_showing_div"></div>
<?php
include_once('../other.php');
?>

</div>
</center>

<?php
include_once('../notification/notification.php');
?>

<div id="right_click_menu"></div>

</body>
</html>