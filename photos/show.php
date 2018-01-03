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
<link href="../like/style.css" rel="stylesheet" type="text/css" />
<link href="../comment/style.css" rel="stylesheet" type="text/css" />
<script src="../like/script.js"></script>
<script src="../comment/script.js"></script>
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

<div id="sub_menu" class="sub_menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td>
<div id="sub_menu_item">
<table>
<tr><td><a href="./"><div class="sub_menu_icon" id="edit_profile_button"><img src="../images/icons/1438974345_03_photos.png"><br/>Show All Image</div></a></td></tr>
</table>
</div>
</td>
<td id="sub_menu_title" onClick="sub_menu()"><div class="heading">Photos</div></td>
</tr>
</table>
</div>

<div class="tab">
<div id="heading" ><h2>Photos</h2></div>
<center>
<?php
	echo '
	<div class="image_item" style="width:800px;"><img src="'.$_GET['name'].'"></div>
	';
?>
	<table>
    <td colspan="4" >
    <?php
	$img_id		= $_GET['id'];
    $likes_result = mysqli_query($con,"SELECT * FROM image_like WHERE img_id = ".$img_id);
	$my_likes_result = mysqli_query($con,"SELECT * FROM image_like WHERE img_id = ".$img_id." AND u_id = ".$_SESSION['user']['uid']);
	?>
    <span onclick="delete_this('<?php echo $img_id;?>')" class="delete_button">Delete</span>
    <div id="<?php echo $img_id.'_likes_div'; ?>" class="display_inline">
    	<span id="<?php echo $img_id.'likes'; ?>" class="likes_counts"><?php echo mysqli_num_rows($likes_result);?></span>
        <?php if (mysqli_num_rows($my_likes_result) != 1) {?>
        <span onclick="likethis('<?php echo $img_id;?>','img')" class="like_button">Like</span>
        <?php }
		else
			{
		?>
        <span onclick="unlikethis('<?php echo $img_id;?>','img')" class="unlike_button">Unlike</span>
        <?php
			}
		?>
    </div>
    <?php
    $comment_result = mysqli_query($con,"SELECT * FROM image_comments WHERE img_id = ".$img_id);
	$rows = mysqli_fetch_array($comment_result);
	?>
    <div id="<?php echo $img_id.'_comment_div'; ?>" class="comment_button_and_counts display_inline">
    	<span id="<?php echo $img_id.'comment'; ?>" class="comment_counts" onclick="show_comments('<?php echo $img_id;?>')">
			<?php echo mysqli_num_rows($comment_result);?>
        </span>
        <span onclick="add_new_comment_form('<?php echo $img_id;?>')" class="comment_button">Comment</span>
    </div>
    </td>
    </tr>
    <tr>
    <td colspan="4">
    <div id="<?php echo $img_id;?>_add_new_comment_form"></div>
    </td>
    </tr>
    <tr>
    <td colspan="4">
    <div id="<?php echo $img_id;?>_my_comments"></div>
    </td>
    </tr>
    <tr>
    <td colspan="4">
    <div id="<?php echo $img_id;?>_comments_box" class="comments_box">
    </div>
    </td>
    </tr>
    </table>
</center>
</div>

<div id="image_showing_div"></div>
<?php
include_once('../other.php');
?>

</div>
</center>

</body>
</html>