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
<title>People</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="../like/style.css" rel="stylesheet" type="text/css" />
<link href="../comment/style.css" rel="stylesheet" type="text/css" />
<script src="../like/script.js"></script>
<script src="../comment/script.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>-->
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
<script src="../people/script.js"></script>
<script src="script.js"></script>
</head>

<body onLoad="searching('<?php echo $_GET['type'];?>')">

<?php 
include_once('../includes/header.php');
?>

<center>
<div id="nav">

<div id="search_type">
<div onClick="searching('people')" 		id="search_type_button">People</div>
<div onClick="searching('post')" 		id="search_type_button">Post</div>
<div onClick="searching('question')"	id="search_type_button">Question</div>
<div onClick="searching('image')"		id="search_type_button">Images</div>
<div onClick="searching('group')"		id="search_type_button">Group</div>
<div onClick="searching('papers')"		id="search_type_button">Papers</div>
<div onClick="searching('notes')"		id="search_type_button">Notes</div>
</div>

<div id="advance_search" ></div>
<div id="search_result"></div>
<?php
include_once('../other.php');
?>

</div>
</center>
<!--
<div id="sidebar">
</div>
-->

<?php
include_once('../notification/notification.php');
?>

</body>
</html>