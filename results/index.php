<?php
include('../config.php');
include('../includes/Time_Passed.php');
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
<title>Student Results</title>
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
<div id="nav">

<div id="sub_menu" class="sub_menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td>
<div id="sub_menu_item">

<table>
<tr><td ><a href="./edit.php"><div class="sub_menu_icon"><img src="../images/icons/question14 (2).png"><br/>Edit Result</div></a></td></tr>
</table>
</div>
</td>
<td id="sub_menu_title" onClick="sub_menu()"><div class="heading">Results</div></td>
</tr>
</table>
</div>

<?php
include_once('../includes/connect.php');
if (!isset($_SESSION))
	session_start();

$year = date("y");
$batch = $_SESSION['user']['batch'];
$term = (($year - $batch)*2)+1;
if(date("m") > 6)
$term++;

echo '<div class="results">
<table cellpadding="10" cellspacing="0" border="1">';
$previous_term	= 0;
$total_marks	= -1;
$marks_obtain	= 0;
$grand_total	= 0;
$grand_obtained	= 0;
$gpa			= 0;
$result00	= mysqli_query($con,"SELECT * FROM subjects WHERE term < $term OR term = $term ORDER BY term");
while ($result00_row = mysqli_fetch_array($result00))
	{
	$sub_id	= $result00_row['subid'];
	$uid = $_SESSION['user']['uid'];
	$result	= mysqli_query($con,"SELECT * FROM results WHERE results.u_id = $uid AND results.sub_id = $sub_id");
	$result_count	= mysqli_num_rows($result);
	if ($previous_term != $result00_row['term'])
		{
		if ($total_marks != -1)
			{
		?>
        <tr><td>Total Marks</td><td></td><td><?php echo $total_marks;?></td><td><?php echo $marks_obtain;?></td>
        <tr><td>Percentage</td><td></td><td></td><td><?php echo (($marks_obtain / $total_marks) * 100).' %';?></td>
        </tr>
        <?php } ?>
		<tr><th colspan="4" id="term_heading"></h1><?php echo $result00_row['term'];?>th Term<h1></th></tr>
		<tr><th width="200" colspan="2">Subject</th><th width="200">Max Marks</th><th width="200">Marks</th></tr>
		<?php
		$previous_term = $result00_row['term'];
		$total_marks = 0;
		$marks_obtain = 0;
		}	
	if ($result_count > 0)
		{
		while($result_row = mysqli_fetch_array($result))
			{
			$res 			= array();
				
			$res['u_id']			= $result_row['u_id'];
			$res['sub_id']			= $result_row['sub_id'];
			$res['marks']			= $result_row['marks'];
			$res['p_marks']			= $result_row['p_marks'];
			$res['type']			= $result_row['type'];
			?>
			<tr>
			<td <?php if ($result00_row['type'] == 'TH+PR') { echo 'rowspan="2"'; } ?>><?php echo $result00_row['name'];?></td>
            <td>Theory</td>
			<td><?php echo $result00_row['max_marks'];?></td>
			<td
			<?php
			if ($res['marks'] < $result00_row['passing_marks'])
				echo 'id="fail_subject"';
			if ($res['marks'] >= $result00_row['passing_marks'])
				echo 'id="pass_subject"';
			?>
			>
			<?php echo $res['marks'];?></td>
			</tr>
            <?php
            if ($result00_row['type'] == 'TH+PR')
				{
				?>
                <td>Practical</td>
                <td><?php echo $result00_row['p_max_marks'];?></td>
                <?php
                if ($res['p_marks'] > 0 && $res['p_marks'] <= $result00_row['p_max_marks'])
					{
				?>
                <td
                <?php
                if ($res['marks'] < $result00_row['p_passing_marks'])
                    echo 'id="fail_subject"';
                if ($res['marks'] >= $result00_row['p_passing_marks'])
                    echo 'id="pass_subject"';
                ?>
                >
                <?php echo $res['p_marks'];?></td>
                <?php
                	}
				else
					{
					?>
                    <td>??</td>
                    <?php
					}
				?>
                </tr>
                <?php
				$total_marks  += $result00_row['p_max_marks'];
				$marks_obtain += $res['p_marks'];
				$grand_obtained += $res['p_marks'];
				}
			$total_marks  += $result00_row['max_marks'];
			$marks_obtain += $res['marks'];
			$grand_obtained += $res['marks'];
			}
		}
	else
		{
		?>
		<tr>
		<td <?php if ($result00_row['type'] == 'TH+PR') { echo 'rowspan="2"'; } ?>><?php echo $result00_row['name'];?></td>
        <td>Theory</td>
		<td><?php echo $result00_row['max_marks'];?></td>
		<td>??</td>
		</tr>
        <?php
        if ($result00_row['type'] == 'TH+PR')
			{
			?>
            <td>Practical</td>
            <td><?php echo $result00_row['p_max_marks'];?></td>
            <td>??</td>
			</tr>
            <?php
			$total_marks  += $result00_row['p_max_marks'];
			}
		$total_marks  += $result00_row['max_marks'];
		}
	$grand_total += $result00_row['max_marks'] + $result00_row['p_max_marks'];
	}
	?>
<tr><td>Total Marks</td><td></td><td><?php echo $total_marks;?></td><td><?php echo $marks_obtain;?></td></tr>
<tr><th colspan="4" id="term_heading"></h1>Final Result Overall<h1></th></tr>
<tr><td>Grand Total</td><td></td><td><?php echo $grand_total;?></td><td><?php echo $grand_obtained;?></td></tr>
<tr><td>Percentage</td><td></td><td></td><td><?php echo (($grand_obtained / $grand_total) * 100).' %';?></td></tr>
<tr><td>GPA</td><td></td><td></td><td><?php echo $gpa;?></td></tr>

<?php
echo '</table></div>';
mysqli_close($con);
include_once('../other.php');
?>

</div>
</center>

</body>
</html>