<div id="create_new_group_form" class="popup">
<div id="heading">Create New Group</div>
<div id="body">
<p>
Create a shared group for you and some of your friends, like your movie night buddies, sports team, siblings or book club.
</p>
<form action="../groups/create.php" method="post" name="create_new_group_form">
<table>
	<tr>
  	  	<td>Group Name</td>
		<td colspan="2"><input type="text" name="title" placeholder="Group Name"></td>
	</tr>
	<tr>
		<td></td>
    	<td><div id="button" onClick="remove_ElementById('create_new_group_form')">Cancel</div></td>
    	<td><input type="submit" value="Create" ></td>
    </tr>
</table>
</form>
</div>
</div>