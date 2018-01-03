<?php

if (isset($_POST['dbname']) && isset($_POST['dbaname']) && isset($_POST['dbapass']) && isset($_POST['newlink']) && isset($_POST['dbhost']))
	{
	$dbhost = $_POST['dbhost'];
	$dbname = $_POST['dbname'];
	$dbaname = $_POST['dbaname'];
	$dbapass = $_POST['dbapass'];
	$newlink = $_POST['newlink'];
	
	$file = fopen("config.php","w");
	$symbol[0] = '$';
	echo fwrite($file,"<?php
session_start();
$symbol[0]_SESSION[\"base_url\"] = \"".$newlink."\";
if (isset($symbol[0]_SESSION['user']))
	{
	$symbol[0]uid = $symbol[0]_SESSION['user']['uid'];
	}
if (!isset($symbol[0]_SESSION['created_by']))
	{
	$symbol[0]admin['Name'] 	= 'Faheem Khaskheli';
	$symbol[0]admin['Email'] = 'faheemkhaskheli9@yahoo.com';
	$symbol[0]admin['link'] 	= 'http://entire-web.net/socialsite/';
	$symbol[0]_SESSION['created_by'] = $symbol[0]admin;
	}
?>");
	fclose($file);

	$file2 = fopen("includes/connect.php","w");
	echo fwrite($file2,"<?php
$symbol[0]user	=	'$dbaname';
$symbol[0]pass	=	'$dbapass';

$symbol[0]con = mysqli_connect('$dbhost',$symbol[0]user,$symbol[0]pass,'$dbname');

if (!$symbol[0]con)
   {
   die('Could not connect: ' . mysqli_error());
   }
?>");
	fclose($file2);
	header('Location: ./');
	}
?>