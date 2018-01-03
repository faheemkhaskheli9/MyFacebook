<?php
$user	=	'root';
$pass	=	'';

$con = mysqli_connect('localhost',$user,$pass,'entirewe_demisite');

if (!$con)
   {
   die('Could not connect: ' . mysqli_error());
   }
?>