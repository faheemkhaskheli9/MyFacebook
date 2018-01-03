<script>
function show_menu_bar()
	{
	if(document.getElementById("main_menu_bar").style.height != '560px')
		document.getElementById("main_menu_bar").style.height = '560px';
	else
		document.getElementById("main_menu_bar").style.height = '0px';
	}
</script>
<div id="header">
<div id="h_web_title"><a href="<?php echo $_SESSION['base_url'];?>"><div id="title"><img src="<?php echo $_SESSION['base_url'];?>/images/site/title.jpg" height="45"></div></a></div>
<?php
if (isset($_SESSION['user']))
	{
include_once('../includes/search.php');
?>
<div id="h_menu_bar">
<div id="menu_bar_button" onclick="show_menu_bar()">Menu</div>
<div id="main_menu_bar"><br />
<a href="../">Home</a>
<a href="../people/">People</a>
<a href="../groups/">Groups</a>
<a href="../papers/">Papers</a>
<a href="../notes/">Notes</a>
<a href="../results/">Results</a>
<a href="../payment/">Payment</a>
<a href="../question/">Question</a>
<!--<a href="../emails/">Email</a>-->
<a href="../files/">Files</a>
<a href="../websites/">Websites</a>
<a href="../search/">Search</a>
<!--
<a href="../ads/">Ads</a>
<a href="..">Profit</a>
<a href="../games/">Games</a>
-->
</div>
</div>
<?php
	}
if (isset($_SESSION['user']))
	{
	?>
	
	<!-- Message Notification Live -->
	
	<div id="h_msg">
	<div onclick="show_msg_notification()" id="msg_notification_icon">M<span id="new_msg_counts"></span></div>
	<div id="msg_notification"></div>
	</div>
	
	<!-- Notification Live -->
	
	<div id="h_notification">
	<div onclick="show_notification()" id="notification_icon">N<span id="new_notification_counts"></span></div>
	
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
	</div>
	
	<!-- Profile Menu -->
	<div id="h_profile_icon">
	<div id="profile_icon" onClick="showMainMenu()">
	<table cellpadding="0" cellspacing="0"><tr>
	<td><img src="<?php echo $_SESSION['user']['display_image'];?>" height="30"></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td><span><?php echo ucfirst($_SESSION['user']['firstname']) . ' ' . ucfirst($_SESSION['user']['lastname']);?></span></td>
	</tr>
	</table>
	<?php
	if (isset($_SESSION['user']))
		{
		?>
		<div id="main_menu_container">
		<div id="main_menu">
		<a href="../profile/index.php?id=<?php echo $_SESSION['user']['uid'];?>"><div>Profile</div></a>
		<a href="../updates/"><div>Updates</div></a>
		<a href="../messages/"><div>Messages</div></a>
        <a href="../contacts/"><div>Contacts</div></a>
        <a href="../privacy/"><div>Privacy</div></a>
		<a href="../login/logout.php"><div>Logout</div></a>
		</div>
		</div>
		<?php
		}
	?>
	</div>
	</div>
	
	<?php
	}
?>
</div>

<?php
    if (isset($_SESSION['message']))
        {
		echo '
		<center>
		<div id="site_message"><h1>'.$_SESSION['message']['name'].'</h1><p>'.$_SESSION['message']['description'].'</p></div>
		</center>
		';
		unset($_SESSION['message']);
		}
    if (isset($_SESSION['error']))
        {
		echo '
		<center>
		<div id="site_error"><h1>'.$_SESSION['error']['name'].'</h1><p>'.$_SESSION['error']['description'].'</p></div>
		</center>
		';
		unset($_SESSION['error']);
		}
    if (isset($_SESSION['error']['update']))
        {
		echo '
		<center>
		<div id="site_error"><h1>'.$_SESSION['error']['update']['name'].'</h1><p>'.$_SESSION['error']['update']['description'].'</p></div>
		</center>
		';
		unset($_SESSION['error']['update']);
		}
    if (isset($_SESSION['msg']['update']))
        {
		echo '
		<center>
		<div id="site_message"><h1>'.$_SESSION['msg']['update']['name'].'</h1><p>'.$_SESSION['msg']['update']['description'].'</p></div>
		</center>
		';
		unset($_SESSION['msg']['update']);
		}
?>