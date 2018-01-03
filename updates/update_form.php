<div id="new_update_div">
<div>
<div id="heading">Update</div>
<center>
<div id="new_update_textarea" contenteditable></div>
<div id="uploaded_images" style="display:none;"></div>
<div id="loading"></div>
<div>
<div style="display:inline-block;">
<input type="hidden" value="wall" id="type_post">
<form id="picform" method="post" action="imgupload.php" enctype="multipart/form-data">
<input type="file" name="file"  onchange="upload_image()"/>
</form>
</div>
<!--
<div class="button" onClick="remove_html_element('new_update_div')" style="display:inline-block;">Cancel</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->
<div class="button" onClick="post_new_update()" style="display:inline-block;">Post</div>
</div>
</center>
</div>
</div>