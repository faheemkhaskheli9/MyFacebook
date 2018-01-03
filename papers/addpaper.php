<div class="popup" id="create_new_paper_form">
<div id="heading">Post New Paper</div>
<div id="body">
<form action="../papers/add.php" method="post" enctype="multipart/form-data" id="new_paper_uplaod_form">
<table>
	<tr>
    	<td>Department</td>
        <td><select name="department" title="Please Enter The Department Name" required style="width:200px;" form="new_paper_uplaod_form">
		<?php 
        include('../includes/connect.php');
        $result1 = mysqli_query($con,"SELECT * FROM departments");
        while($row1 = mysqli_fetch_array($result1))
            {
            echo '<option value="'.$row1['dept_id'].'">'.$row1['dept_name'].'</option>';
            }
        ?>
        </select>
        </td>
	</tr>

    <tr>
    	<td>Subject</td>
        <td><select name="subject" title="Please Enter The Subject Name" placeholder="Subject Name" form="new_paper_uplaod_form" style="width:200px;" required>
        <?php 
		session_start();
        $dept = $_SESSION['user']['department'];
        $pterm = 0;
        $result1 = mysqli_query($con,"SELECT subid,name,term FROM subjects WHERE dept = $dept ORDER BY term");
		echo mysqli_error($con);
        while($row1 = mysqli_fetch_array($result1))
            {
            if ($pterm != $row1['term'])
                {
                echo '<option style="font-size:20px;">'.$row1['term'].' Term</option>';
                $pterm = $row1['term'];
                }
            echo '<option value="'.$row1['subid'].'">'.$row1['name'].'</option>';
            }
        ?>
        </select>
		</td>
	</tr>
	<tr>
    	<td>Batch</td>
        <td><input type="text" name="batch" title="Please Enter The Batch Of The Paper" placeholder="Batch" required form="new_paper_uplaod_form"></td>
    </tr>
	<tr>
    	<td>Term</td>
        <td><input type="text" name="term" title="Please Enter The Term Of The Paper" placeholder="Term" required form="new_paper_uplaod_form"></td>
    </tr>
	<tr>
    	<td>Date Of Conduct</td>
        <td><input type="date" name="date" title="Please Enter The On Which Date This Paper was Taken." placeholder="Release Date"required form="new_paper_uplaod_form"></td>
    </tr>
	<tr>
		<td rowspan="5">Paper Photos</td>
        <td><input type="file" name="photo1" required  form="new_paper_uplaod_form"></td>
	</tr>
    <tr>
    	<td><input type="file" name="photo2" form="new_paper_uplaod_form"></td>
    </tr>
    <tr>
    	<td><input type="file" name="photo3" form="new_paper_uplaod_form"></td>
    </tr>
    <tr>
    	<td><input type="file" name="photo4" form="new_paper_uplaod_form"></td>
    </tr>
    <tr>
    	<td><center><div id="button" onClick="remove_ElementById('create_new_paper_form')">Cancel</div></center></td>
        <td><center><input type="submit" value="Uplaod" form="new_paper_uplaod_form"></center></td>
    </tr>
</table>
</form>
</div>
</div>