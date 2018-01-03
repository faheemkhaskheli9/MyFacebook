<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Entire Web is a General Purpose Website Here you will find lots of usefull things , it support lots of different features such as Social Network, Blog, Question & Answers, Free Ads">
<meta name="keywords" content="demsite,Demonic Website,Faheem Khaskheli,Meet New People,Make New Friends,Find Friends">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title><?php echo $title;?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="jquery.min.js"></script>
<script src="jquery.form.js"></script>
<script src="script.js"></script>
</head>

<body oncontextmenu="return false;">

<?php 
include_once('includes/header.php');
?>

<center>
<?php echo $contents;?>
</center>

<?php
include_once($base_url.'/notification/notification.php');
?>

</body>
</html>