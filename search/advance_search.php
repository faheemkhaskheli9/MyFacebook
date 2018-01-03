<?php
include '../includes/connect.php';
$type	= mysqli_real_escape_string($con,$_GET['type']);
if ($type == 'group')
	{
	?>
<div id="heading"><h2>Advance Search</h2></div>
<table>
<tr>
<td>Group Name</td><td><input type="text" id="gname" value="<?php if (isset($_GET['gname']))echo mysqli_real_escape_string($con,$_GET['gname']);?>"></td>
</tr>
<tr>
<td>Description</td><td><input type="text" id="gdesc" value="<?php if (isset($_GET['gdesc']))echo mysqli_real_escape_string($con,$_GET['gdesc']);?>"></td>
</tr>
<!--
<tr>
<td rowspan="2">Admin Name</td><td><input type="text" id="gadmin" value="<?php if (isset($_GET['gadmin']))echo mysqli_real_escape_string($con,$_GET['gadminfname']);?>"></td>
</tr>
<tr>
<td><input type="text" id="gadmin" value="<?php if (isset($_GET['gadmin']))echo mysqli_real_escape_string($con,$_GET['gadminlname']);?>"></td>
</tr>
-->
<!--
<tr>
<td>Search Type</td><td>
<select id="stype">
<option value="all">All</option>
<option value="any">Any</option>
</select>
</td>
</tr>
-->
<tr><td style="text-align:center;" colspan="2"><button onclick="search_groups()">Search</button></td></tr>
</table>
    <?php
	}
elseif ($type == 'notes')
	{
	?>
<div id="heading"><h2>Advance Search</h2></div>
<table cellpadding="10" cellpadding="0">
<tr>
<td>Subjects</td>
<td>
<select id="subjects">
<?php
echo '<option value="">Don`t Matter</option>';
$result_subjects = mysqli_query($con,"SELECT * FROM subjects");
while($rows = mysqli_fetch_array($result_subjects))
	{
	echo '<option value="'.$rows['subid'].'">'.$rows['name'].'</option>';
	}
?>
</select>
</td>
</tr>
<!--
<tr>
<td>Search Type</td>
<td>
<select id="stype">
<option value="">Select</option>
<option value="all">All</option>
<option value="any">Any</option>
</select>
</td>
</tr>
-->
<tr>
<td>Department</td><td>
<select id="department">
<option value="">Don`t Matter</option>
</select>
</td>

<td>Term</td><td>
<select id="term">
<option value="">Don`t Matter</option>
<option value="1">1st</option>
<option value="2">2nd</option>
<option value="3">3rd</option>
<option value="4">4th</option>
<option value="5">5th</option>
<option value="6">6th</option>
<option value="7">7th</option>
<option value="8">8th</option>
</select>
</td>
</tr>

<tr>
<td>Chapter Name</td><td><input type="text" id="chapter_name" value="<?php if (isset($_GET['chapter_name']))echo mysqli_real_escape_string($con,$_GET['chapter_name']);?>"></td>

<td>Content</td><td><input type="text" id="notes_content" value="<?php if (isset($_GET['content']))echo mysqli_real_escape_string($con,$_GET['content']);?>"></td>
</tr>

<tr>
<td>Author</td><td><input type="text" id="author" value="<?php if (isset($_GET['author']))echo mysqli_real_escape_string($con,$_GET['author']);?>"></td>

<td>Book Name</td><td><input type="text" id="book_name" value="<?php if (isset($_GET['book_name']))echo mysqli_real_escape_string($con,$_GET['book_name']);?>"></td>
</tr>

<tr>
<td>Posted By</td><td><input type="text" id="posted_by" value="<?php if (isset($_GET['posted_by']))echo mysqli_real_escape_string($con,$_GET['posted_by']);?>"></td>

<td>Source</td><td><input type="text" id="source" value="<?php if (isset($_GET['source']))echo mysqli_real_escape_string($con,$_GET['source']);?>"></td>
</tr>

<tr>
<td>Posted On (Date)</td><td><input type="text" id="posted_date" value="<?php if (isset($_GET['posted_date']))echo mysqli_real_escape_string($con,$_GET['posted_date']);?>"></td>

<td>Published Date</td><td><input type="text" id="published_date" value="<?php if (isset($_GET['published_date']))echo mysqli_real_escape_string($con,$_GET['published_date']);?>"></td>
</tr>

<tr><td style="text-align:center;" colspan="4"><button onclick="search_notes()">Search</button></td></tr>
</table>
    <?php
	}
elseif ($type == 'people')
	{
	?>
<div id="heading"><h2>Advance Search</h2></div>
<table>
<tr>
<td>First Name</td><td><input type="text" id="firstname" value="<?php if (isset($_GET['firstname']))echo mysqli_real_escape_string($con,$_GET['firstname']);?>"></td>

<td>Last Name</td><td><input type="text" id="lastname" value="<?php if (isset($_GET['lastname']))echo mysqli_real_escape_string($con,$_GET['lastname']);?>"></td>
</tr>

<tr>
<td>Email</td>
<td><input type="email" id="email" value="<?php if (isset($_GET['email']))echo mysqli_real_escape_string($con,$_GET['email']);?>"></td>

<td>Gender</td>
<td>
<select id="gender">
<option value="any">Doesn`t Matter</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</td>
</tr>

<tr>
<td>Status</td><td>
<select id="status" style="width:200px;">
<option value="any">Doesn`t Matter</option>
<option value="Student">Student</option>
</select>
</td>

<td>Home Town</td><td><input type="text" id="hometown" value="<?php if (isset($_GET['hometown']))echo mysqli_real_escape_string($con,$_GET['hometown']);?>"></td>
</tr>

<tr>
<td>Relationship</td><td><input type="text" id="relationship" value="<?php if (isset($_GET['relationship']))echo mysqli_real_escape_string($con,$_GET['relationship']);?>"></td>

<td>Phone Number</td><td><input type="text" id="phonenumber" value="<?php if (isset($_GET['phonenumber']))echo mysqli_real_escape_string($con,$_GET['phonenumber']);?>"></td>
</tr>
<!--
<tr>
<td>Search Type</td><td>
<select id="stype">
<option value="all">All</option>
<option value="any">Any</option>
</select>
</td>
</tr>
-->
<tr><td style="text-align:center;" colspan="2"><button onclick="search_people()">Search</button></td></tr>
</table>
    <?php
	}
elseif ($type == 'post')
	{
	?>
<div id="heading"><h2>Advance Search</h2></div>
<table cellpadding="10" cellspacing="0">
<tr>
<td>Post</td>
<td><input type="text" name="posts" id="posts" value="<?php if (isset($_GET['posts']))echo mysqli_real_escape_string($con,$_GET['posts']);?>"></td>
</tr>

<tr>
<td>Posted On (Date)</td>
<td><input type="text" id="posted_date" value="<?php if (isset($_GET['posted_date']))echo mysqli_real_escape_string($con,$_GET['posted_date']);?>"></td>

<td>Posted By</td>
<td><input type="text" id="posted_by" value="<?php if (isset($_GET['posted_by']))echo mysqli_real_escape_string($con,$_GET['posted_by']);?>"></td>
</tr>
<!--
<tr>
<td>Search Type</td>
<td>
<select id="stype">
<option value="">Select</option>
<option value="all">All</option>
<option value="any">Any</option>
</select>
</td>
</tr>
-->
<tr><td style="text-align:center;" colspan="4"><button onclick="search_post()">Search</button></td></tr>
</table>
    <?php
	}
elseif ($type == 'group')
	{
	?>
    <?php
	}
elseif ($type == 'group')
	{
	?>
    <?php
	}
?>