<?php
session_start();
$_SESSION["base_url"] = "http://localhost/ssfms";
if (isset($_SESSION['user']))
	{
	$uid = $_SESSION['user']['uid'];
	}
if (!isset($_SESSION['created_by']))
	{
	$admin['Name'] 	= 'Faheem Khaskheli';
	$admin['Email'] = 'faheemkhaskheli9@yahoo.com';
	$admin['link'] 	= 'http://entire-web.net/socialsite/';
	$_SESSION['created_by'] = $admin;
	}
?>