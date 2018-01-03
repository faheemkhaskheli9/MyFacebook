<?php
include('../config.php');
if (!isset($_SESSION['user']))
header('Location: ../');
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Entire Web is a General Purpose Website Here you will find lots of usefull things , it support lots of different features such as Social Network, Blog, Question & Answers, Free Ads">
<meta name="keywords" content="demsite,Demonic Website,Faheem Khaskheli,Meet New People,Make New Friends,Find Friends">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title><?php echo ucfirst($_SESSION['user']['firstname']) . ' ' . ucfirst($_SESSION['user']['lastname']);?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="./style.css" rel="stylesheet" type="text/css" />
<link href="../like/style.css" rel="stylesheet" type="text/css" />
<link href="../comment/style.css" rel="stylesheet" type="text/css" />
<script src="../like/script.js"></script>
<script src="../comment/script.js"></script>
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

<div id="fav_menu">
<div id="heading">Menu</div>
<div id="menu_items">
<a href="../updates"><span>Home</span></a>
<a href="../profile"><span>Profile</span></a>
<hr>
<a href="../messages"><span>Messages</span></a>
<hr>
<a href="../contacts"><span>Contacts</span></a>
<a href="../contacts/friendmap.php"><span>Friends Map</span></a>
<hr>
<a onClick="show_ajaxById('../question/new_question_form',0)"><span >Ask Questions</span></a>
<a href="../question/"><span>Recent Question</span></a>
<hr>
<a href="../webcam"><span>Capture Photos</span></a>
<a href="../photos/?id=<?php echo $uid;?>"><span>Images</span></a>
<hr>
<a href="../notes"><span>Notes</span></a>
<hr>
<a href="../results"><span>My Result</span></a>
<a href="../results/edit.php"><span>Add Result</span></a>
<hr>
<a href="../papers"><span>Previous Papers</span></a>
<a href=""><span>Add Paper</span></a>
<hr>
<a href="../groups"><span>My Group</span></a>
<a href=""><span>Create Group</span></a>
<!--
<hr>
<a href="../course"><span>All Courses</span></a>
<a href="../course/add_course.php"><span>Create Course</span></a>
<a href="../course/catagories.php"><span>Course Catagories</span></a>
<hr>
<a href="../files"><span>All Files</span></a>
<a href=""><span>Create File</span></a>
-->
<hr>
<a href="../payment"><span>New Invoice</span></a>
<a href=""><span>Payment History</span></a>
<!--
<hr>
<a href=""><span>Website List</span></a>
<a href=""><span>Website Catagories</span></a>
<a href=""><span>My Web Page</span></a>
<a href=""><span>Create Web Page</span></a>
<hr>
-->
<a href="../help"><span>Help</span></a>
<a href="../login/logout.php"><span>Logout</span></a>
</div>
</div>

<?php
include'update_form.php';
?>
<div id="new_update_result_cell"></div>
<div id="latest_updates"></div>

</div>
<?php
include_once('../other.php');
?>
</center>

</body>
</html>