<?php
include('../includes/connect.php');
include_once('../includes/Time_Passed.php');
session_start();

$uid = mysqli_real_escape_string($con,$_POST['u_id']);
$name = mysqli_real_escape_string($con,$_POST['name']);

$privacy_result = mysqli_query($con,"SELECT * FROM privacy WHERE u_id = $uid ");
$privacy_row = mysqli_fetch_array($privacy_result);

if ($name == 'posts')
	{
	$pid	=	mysqli_real_escape_string($con,$_POST['pid']);
	$last_post_id = $pid;

	if ($pid != 0)
		$q = "AND post_id < ".$last_post_id;
	else
	$q = '';

	$post_result = mysqli_query($con,"SELECT * FROM posts WHERE u_id = '$uid' ".$q." ORDER BY time DESC LIMIT 10");

	while($rows = mysqli_fetch_array($post_result))
		{
		$user_result = mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $rows['u_id']);
		$u_row = mysqli_fetch_array($user_result);
		$post['id'] 			= $rows['post_id'];
		$last_post_id 			= $rows['post_id'];
		$post['post'] 			= $rows['post'];
		$post['time'] 			= $rows['time'];
		$post['privacy'] 		= $rows['privacy'];
		$users['id'] 			= $u_row['u_id'];
		$users['firstname'] 	= $u_row['firstname'];
		$users['lastname'] 		= $u_row['lastname'];
		$users['display_image'] = $u_row['display_image'];
		$login_user_id	=	$_SESSION['user']['uid'];
		if ($login_user_id != $uid)
			{
			if ($post['privacy'] == '1')
				include('../template/post.php');
			}
		else
			{
			include('../template/post.php');
			}
		}
		?>
	<div id="show_more_div">
	<input type="hidden" id="last_post_id" value="<?php echo $last_post_id;?>">
	<div onClick="show_more('<?php echo $uid;?>')">Show More</div>
	</div>
	<?php
	}
else if ($name == 'contact detail')
	{
$result = mysqli_query($con,"SELECT * FROM user WHERE u_id = $uid ");
$count	= mysqli_num_rows($result);
if ($count == 1)
	{
	$row = mysqli_fetch_array($result);
	$this_id				= $row['u_id'];
	$this_email				= $row['email'];
	$this_phone_number		= $row['phone_number'];
	}
?>
<div class="tab">
<div id="heading"><h2>Contact Detail</h2></div>
<table cellpadding="5" cellspacing="5">
<tr>
<?php
if ($privacy_row['phone_number'] == '1' || $_SESSION['user']['uid'] == $uid)
	{
?>
<td>Phone Number</td>
<td width="10">:</td>
<td><div id="phone_number"><?php echo $this_phone_number;?></div><div id="edit_phone_number"><input type="text" id="phone_number_value" value="<?php echo $this_phone_number;?>"></div></td>
<?php
	}
?>
</tr>
<tr>
<?php
if ($privacy_row['email'] == '1' || $_SESSION['user']['uid'] == $uid)
	{
?>
<td>Email</td>
<td width="10">:</td>
<td><div id="email"><?php echo $this_email;?></div><div id="edit_email"><input type="email" id="email_value" value="<?php echo $this_email;?>"></div></td>
<?php
	}
?>
</tr>
</table>
</div>
<?php	
	}
else if ($name == 'student detail')
	{
	$status = mysqli_real_escape_string($con,$_POST['other']);
	if ($status == 'Student')
		{
		$s_result = mysqli_query($con,"SELECT * FROM students WHERE u_id = $uid");
		$s_row	= mysqli_fetch_array($s_result);
		$this_department_id	= $s_row['department'];
		$this_batch			= $s_row['batch'];
		$this_rollno		= $s_row['rollnumber'];
		$this_enrollno		= $s_row['enrollmentno'];
		$this_joindate		= $s_row['join_date'];
		
		$d_result	= mysqli_query($con,"SELECT * FROM departments WHERE dept_id = $this_department_id");
		$d_row	= mysqli_fetch_array($d_result);
		$this_department	= $d_row['dept_name'].'( '.$d_row['dept_short'].' )';
		}
?>
<div class="tab">
<div id="heading"><h2>Student</h2></div>
<table align="center" cellpadding="5" cellspacing="5">
<tr><td>Department</td><td width="10">:</td>
<td><div id="dept"><?php echo $this_department;?></div><div id="edit_dept"><input type="text" id="dept" value="<?php echo $this_department;?>"></div></td></tr>
<tr><td>Batch</td><td width="10">:</td>
<td><div id="batch"><?php echo $this_batch;?></div><div id="edit_batch"><input type="number" id="batch" value="<?php echo $this_batch;?>"></div></td></tr>
<tr><td>Roll Number</td><td width="10">:</td>
<td><div id="rollno"><?php echo $this_rollno;?></div><div id="edit_rollno"><input type="number" id="rollno" value="<?php echo $this_rollno;?>"></div></td></tr>
<tr><td>Enrollment Number</td><td width="10">:</td>
<td><div id="enrollno"><?php echo $this_enrollno;?></div><div id="edit_enrollno"><input type="number" id="enrollno" value="<?php echo $this_enrollno;?>"></div></td></tr>
<tr><td>Join Date</td><td width="10">:</td>
<td><div id="joindate"><?php echo $this_joindate;?></div><div id="edit_joindate"><input type="date" id="joindate" value="<?php echo $this_joindate;?>"></div></td></tr>
</table>
</div>
<?php
	if (isset ($this_batch))
		{
		$year = date("y");
		$batch = $this_batch;
		$term = (($year - $batch)*2)+1;
		if(date("m") > 6)
		$term++;
		$sub_result = mysqli_query($con,"SELECT * FROM subjects WHERE (term = $term OR term < $term) AND dept = '$this_department_id' ORDER BY term DESC");
		echo mysqli_error($con);
		?>
		<div class="tab">
		<div id="heading"><h2>Subjects</h2></div>
		<table align="center" cellpadding="5" cellspacing="5">
		<?php
		$previous_term	= 0;
		while($sub_row	= mysqli_fetch_array($sub_result))
			{
			if ($previous_term != $sub_row['term'])
				{
				?>
				<tr><th colspan="4" id="term_heading"></h1><?php echo $sub_row['term'];?> Term<h1></th></tr>
				<?php
				$previous_term = $sub_row['term'];
				}
			echo '<tr><td>'.$sub_row['name'].'</td></tr>';
			}
		?>
		</table>
		</div>
	<?php
		}
	}
else if ($name == 'location' && ($privacy_row['current_location'] == '1' || $_SESSION['user']['uid'] == $uid))
	{
?>
    <div class="tab">
    <div id="heading"><h2>Current Location</h2></div>
    <table align="center" cellpadding="5" cellspacing="5">
    <tr><td colspan="2"><div id="map_result"></div></td></tr>
    <tr><td colspan="2"><div id="googleMap" style="width:700px;height:400px;"></div></td></tr>
    </table>
    </div>
    <?php
	}
else if ($name == 'photos')
	{
	echo '<link href="../photos/style.css" rel="stylesheet" type="text/css" />';
	$image_result = mysqli_query($con,'SELECT * FROM images WHERE uploaded_by = '.$uid);
	while($image_row= mysqli_fetch_array($image_result))
		{
		echo '
		<div class="image_item" onclick="display(\''.$image_row['name'].'\')"><img src="'.$image_row['name'].'"></div>
		';
		}	
	}
else if ($name == 'results' && ($privacy_row['result'] == '1' || $_SESSION['user']['uid'] == $uid))
	{
	echo '<link href="../results/style.css" rel="stylesheet" type="text/css" />';
$student_result = mysqli_query($con,"SELECT * FROM students WHERE u_id = '$uid' ");
$student_row = mysqli_fetch_array($student_result);
$year = date("y");
$batch = $student_row['batch'];
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
	}
?>