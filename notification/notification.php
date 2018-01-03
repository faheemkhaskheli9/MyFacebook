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