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
<title>Capture Photos</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>

<body oncontextmenu="return false;">

<?php 
include_once('../includes/header.php');
?>

<center>
<div id="capture_photo_div" style="padding-top:80px;width:100%;height:100%;min-height:600px;overflow-y:auto;background-color:#CCCCCC;">
<link href="./style.css" rel="stylesheet" type="text/css"/>

	<div id="preview">

    <div id="preview_button" onClick="show_preview()">Show Preview</div>
    <video autoplay></video>
    <canvas width="1280" height="720" id="canvas"></canvas>
    
        <div style="width:100%;height:50px;">
        
        <button onClick="resize(320,180)">Small</button>
        <button onClick="resize(640,360)">Medium</button>
        <button onClick="resize(1280,720)">Large</button>
        
        <input type="range" min="0" max="7" value="0" id="zoom" onChange="zooming()">
        
        <button onClick="captureImage()">Save</button>
        
        </div>
    </div>

    <div id="my_images">
	<div id="heading"><h1>My Album</h1></div>
	<div id="result"></div>
    
    </div>

<script src="./script.js"></script>
</div>

<?php
include_once('../other.php');
?>

</center>
</body>
</html>