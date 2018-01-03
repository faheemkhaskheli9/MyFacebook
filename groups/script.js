// JavaScript Document
function show_new_group_post_form(id)
	{
	var xmlhttp;
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
	else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
  			{
			$('body').append(xmlhttp.responseText)
   			}
		}
	xmlhttp.open("GET","./group_post_form.php?id="+id,true);
	xmlhttp.send();
	}
function remove_new_answer_form()
	{
	$('#new_answer_form').remove();
	}