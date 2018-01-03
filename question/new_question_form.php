<script src="../question/script.js"></script>
<style>
button
	{
	padding:5px;
	width:100px;
	}
</style>
<div class="popup" id="ask_question_div">
<div id="heading" style="color:#FFFFFF;"><h2>Ask Question</h2></div>
<div id="body">
<table cellpadding="10" cellspacing="10">
<tr><td width="150">Title</td>		<td width="200"><input type="text" name="question_title" id="question_title" style="width:200px;"></td></tr>
<tr><td width="150">Question</td>	<td width="200"><div id="new_question" contenteditable style="border:1px solid  gray;height:150px;width:300px;"></div></td></tr>
<tr><td></td><td><center><button onClick="remove_html_element('ask_question_div')">Cancel</button>&nbsp;&nbsp;&nbsp;<button onClick="ask_question()">Ask</button></center></td></tr>

</table>
</div>
</div>