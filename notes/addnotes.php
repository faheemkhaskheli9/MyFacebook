<div class="popup" id="create_new_notes_form">
<div id="heading"><h2>Post New Notes</h2></div>
<div id="body">
<form action="add.php" method="post" enctype="multipart/form-data" id="notesuploadform">
<table cellpadding="10" cellspacing="10">
<tr><td>Department</td><td>
<select name="department" title="Please Enter The Department Name" required form="notesuploadform">
<?php 
include('../includes/connect.php');
$result1 = mysqli_query($con,"SELECT * FROM departments");
while($row1 = mysqli_fetch_array($result1))
	{
	echo '<option value="'.$row1['dept_id'].'">'.$row1['dept_name'].'</option>';
	}
?>
</select></td></tr>

<tr><td>Subject</td><td>
<select name="subject" title="Please Enter The Subject Name" placeholder="Subject Name" required form="notesuploadform">
<?php 
$dept = $_SESSION['user']['department'];
$pterm = 0;
$result1 = mysqli_query($con,"SELECT subid,name,term FROM subjects ORDER BY term");
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
</td></tr>
<tr><td>Batch</td><td><input type="text" name="batch" title="Please Enter The Batch" placeholder="Batch" required form="notesuploadform"></td></tr>
<tr><td>Term</td><td><input type="text" name="term" title="Please Enter The Term" placeholder="Term" required form="notesuploadform"></td></tr>
<tr><td>Chapter Name</td><td><input type="text" name="chapter_name" title="Please Enter The Chapter" placeholder="Chapter Name" form="notesuploadform"></td></tr>
<tr><td>Content</td><td><textarea name="content" title="Please Enter The Contents Of The Notes" placeholder="Contents Here" cols="40" rows="5" form="notesuploadform"></textarea></td></tr>
<tr><td>Author</td><td><input type="text" name="author" title="Please Enter The Author Name" placeholder="Authors Name" form="notesuploadform"></td></tr>
<tr><td>Source</td><td><input type="text" name="source" title="Please Enter The Source" placeholder="Source" form="notesuploadform"></td></tr>
<tr><td>Book</td><td><input type="text" name="book" title="Please Enter The Book Name" placeholder="Book Name" form="notesuploadform"></td></tr>
<tr><td>Publish Date</td><td><input type="date" name="publish_date" title="Please Enter The Publish Date" placeholder="Publish Date" form="notesuploadform"></td></tr>
<tr><td rowspan="5">Notes File ( PDF , PPT , DOC , DOCX , TXT)</td>
<td><input type="file" name="file1" required form="notesuploadform"></td></tr>
<tr><td><input type="file" name="file2" form="notesuploadform"></td></tr>
<tr><td><input type="file" name="file3" form="notesuploadform"></td></tr>
<tr><td><input type="file" name="file4" form="notesuploadform"></td></tr>
<tr><td><input type="file" name="file5" form="notesuploadform"></td></tr>
<tr>
<td><center><div id="button" onClick="remove_ElementById('create_new_notes_form')">Cancel</div></center></td>
<td colspan="2"><center><input type="submit" value="Upload"  form="notesuploadform"></center></td>
</tr>
</table>
</form>
</div>