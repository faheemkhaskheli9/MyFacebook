<link href="../groups/style.css" rel="stylesheet" type="text/css" />

<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();
	
$op	= '';
if (!isset($_GET['stype']))
	$_GET['stype'] = 'all';
if ($_GET['stype'] == 'all')
	$op = ' AND ';
else
	$op = ' OR ';
	
$query = '';

if (isset($_GET['gname']))
$query	.= "gname LIKE '%".mysqli_real_escape_string($con,$_GET['gname'])."%'";
if (isset($_GET['gdesc']))
	{
	$query	.= $op." description LIKE '%".mysqli_real_escape_string($con,$_GET['gdesc'])."%'";
	}
	
if ($query == '')
"gname LIKE '%".mysqli_real_escape_string($con,$_GET['content'])."%'";
/*
if (isset($_GET['gadminfname']))
$query	.= "admin '%".$_GET['gdesc'].'%';
*/
$search_result	= mysqli_query($con,"SELECT * FROM groups WHERE ".$query);
if ($search_result)
	{
	$search_count	= mysqli_num_rows($search_result);
	if ($search_count > 0)
		{
		while($search_row = mysqli_fetch_array($search_result))
			{		
			echo '<div id="group">
			<table cellpadding="5" cellspacing="0" border="0">
			<tr><td><img src="'.$search_row['g_logo'].'"></td><td>'.$search_row['gname'].'</td><td></td></tr>
			<tr><td></td><td colspan="2">'.$search_row['description'].'</td></tr>
			<tr>';
			$admin_id	= $search_row['admin'];
			$result1 = mysqli_query($con,"SELECT * FROM user WHERE u_id = $admin_id");
			$row1 = mysqli_fetch_array($result1);
			echo '<td><img src="'.$row1['display_image'].'" width="100"/></td><td>'.ucfirst($row1['firstname']).' '.ucfirst($row1['lastname']).' (Admin)</td><td></td>';
			echo '</tr>';
			$result3	=	mysqli_query($con,"SELECT u_id FROM group_members WHERE g_id = ".$search_row['g_id']);
			$count_members	=	mysqli_num_rows($result3);
			echo '<tr><td>Members</td><td>'.$count_members.'</td><td></td></tr>';
			echo'
			</table>
			</div>';
			}
		mysqli_close($con);
		}
	}
else
	{
	echo 'Empty';
	}
?>