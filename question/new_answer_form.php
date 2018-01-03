<?php
include('../includes/connect.php');
?>
<div class="tab" id="new_answer_form_div">
<div id="heading" style="color:#FFFFFF;"><h2>Submit Answer</h2></div>
<center>                
<textarea id="new_answer" rows="10" cols="70"></textarea><br>
<br />
<button onClick="remove_html_element('new_answer_form_div')">Cancel</button>
<button onClick="submit_answer(<?php echo mysqli_real_escape_string($con,$_GET['id']);?>)">Submit Answer</button>
</center>
</div>