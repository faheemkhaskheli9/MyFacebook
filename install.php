<h1>How To Install</h1>
<p>
Install This Website Using this form.<br />
Fill Those TextBoxes:<br />
1) Database Host ( localhost ) or anyother that ur using.<br />
2) Database Name Which u Created or Import Database From Database Folder.<br />
3) Database Admin Name ( Root ) or Any other You are using.<br />
4) Database Admin Password.<br />
5) New Link For You Website, It Must Be Same Where You Are Installing The Website.<br />

Note:<br />
1) You Must Copy Website On Server/Xamp/Wamp<br />
2) Import Database Using PhpMyAdmin on Your Server.<br />

</p>
<form action="setup.php" method="post">
<table cellpadding="10" border="1">

<tr>
	<td>Database Host</td><td><input type="text" name="dbhost"></td>
</tr>
<tr>
	<td>Database Name</td><td><input type="text" name="dbname"></td>
</tr>
<tr>
	<td>Database Admin Name</td><td><input type="text" name="dbaname"></td>
</tr>
<tr>
	<td>Database Admin Password</td><td><input type="text" name="dbapass"></td>
</tr>
<tr>
	<td>New Website Link</td><td><input type="text" name="newlink"></td>
</tr>
<tr>
	<td colspan="2"><center><input type="submit" value="Install"></center></td>
</tr>

</table>
</form>