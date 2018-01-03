<?php
include('../config.php');
include('../includes/Time_Passed.php');
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Entire Web is a General Purpose Website Here you will find lots of usefull things , it support lots of different features such as Social Network, Blog, Question & Answers, Free Ads">
<meta name="keywords" content="demsite,Demonic Website,Faheem Khaskheli,Meet New People,Make New Friends,Find Friends">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title>Help</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="../jquery.min.js"></script>
<script src="../jquery.form.js"></script>
<script src="../script.js"></script>
<script src="script.js"></script>
</head>

<body oncontextmenu="return false;">

<?php 
include_once('../includes/header.php');
?>

<center>
<div id="nav" style="text-align:left;">

<div class="tab">
<div id="heading"><h2>Features Help</h2></div>
<div style="padding:20px;">
<ul>
<li><a href="#sign_up">Sign Up</a></li>
<li><a href="#sign_in">Sign In</a></li>
<li><a href="#profile">Profile</a></li>
<li><a href="#contacts">Contacts</a></li>
<li><a href="#messages">Messages</a></li>
<li><a href="#chat">Chat</a></li>
<li><a href="#updates">Updates</a></li>
<li><a href="#email">Email</a></li>
<li><a href="#files">Files</a></li>
<li><a href="#ads">Advertisment</a></li>
<li><a href="#websites">Websites</a></li>
<li><a href="#games">Games</a></li>
<li><a href="#other">Other</a></li>
</ul>
</div>
</div>

<div class="tab" id="sign_up">
<div id="heading"><h2>Sign Up</h2></div>
<div style="padding:20px;">
You can sign up on this website for free, It is free to use.
<br/><br/>
Required Data :
<ul>
<li>Name ( First & Last )</li>
<li>Email Address</li>
<li>New Password</li>
</ul>
Process :
<ul>
<li>Goto <a href="../#signup">Home Page</a></li>
<li>Fill The Form, With Correct Information.</li>
<li>Your Profile Will Be Created Next and You Will Be Redirected To Your Profile.</li>
</ul>
</div>
</div>

<div class="tab" id="sign_in">
<div id="heading"><h2>Sign In</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="profile">
<div id="heading"><h2>Profile</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="contacts">
<div id="heading"><h2>Contacts</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="messages">
<div id="heading"><h2>Messages</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="chat">
<div id="heading"><h2>Chat</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="updates">
<div id="heading"><h2>Updates</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="email">
<div id="heading"><h2>Email</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="files">
<div id="heading"><h2>Files</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="ads">
<div id="heading"><h2>Advertisment</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="websites">
<div id="heading"><h2>Websites</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="games">
<div id="heading"><h2>Games</h2></div>
<div style="padding:20px;">
</div>
</div>

<div class="tab" id="other">
<div id="heading"><h2>Others</h2></div>
<div style="padding:20px;">
</div>
</div>

</div>
</center>
<div id="notification">
<?php
if (isset($_SESSION['error']))
	{
	?>
    <div id="error">
    <?php echo $_SESSION['error'];?>
    </div>
    <?php	
	unset($_SESSION['error']);
	}
if (isset($_SESSION['notification']))
	{
	?>
    <div id="site_notification">
    <?php echo $_SESSION['notification'];?>
    </div>
    <?php	
	unset($_SESSION['notification']);
	}
?>
</div>

<div id="right_click_menu"></div>

</body>
</html>