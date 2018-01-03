<div style="width:100%;height:100%;position:fixed;top:0px;left:0px;z-index:990;background-color:#000000;opacity:0.7;" id="group_new_post_form_div background_black" onClick="show_new_update_div()"></div>
<div id="new_update_div">
<div>
<div id="heading">Update</div>
<center>
<input id="new_update_title" required title="Title Cannot be Empty"/>
<div id="new_update_textarea" contenteditable></div>
<div id="uploaded_images" style="display:none;"></div>
<div style="display:inline-block;">
<input type="hidden" value="group" id="type_post">
<input type="hidden" value="<?php echo $_GET['id'];?>" id="group_id">
<form id="picform" method="post" action="../updates/imgupload.php" enctype="multipart/form-data">
<input type="file" name="file"  onchange="upload_image()"/>
</form>
<br/>
<div id="loading"></div>
<div class="button" onClick="remove_html_element('group_new_post_form_div')" style="display:inline-block;">Cancel</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="button" onClick="post_new_update()" style="display:inline-block;">Post</div>
</div>
</center>
</div>
</div>