// JavaScript Document
function show_comments(post_id)
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
			document.getElementById(post_id+"_comments_box").innerHTML=xmlhttp.responseText;
			}
		}
	xmlhttp.open("GET","../comment/show_comment.php?post_id="+post_id,true);
	xmlhttp.send();		
	}
function show_more_comments(post_id,last_comment_id)
	{
	var xmlhttp;
	$('#'+post_id+'_'+last_comment_id+'_show_more_comments_button').remove();
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
			document.getElementById(post_id+"_comments_box").innerHTML+=xmlhttp.responseText;
			}
		}
	xmlhttp.open("GET","../comment/show_comment.php?post_id="+post_id+"&last_comment_id="+last_comment_id,true);
	xmlhttp.send();
	}
function add_new_comment_form(post_id)
	{
	var commentdiv = document.getElementById(post_id+"_add_new_comment_form");
	commentdiv.innerHTML = "<textarea id='"+post_id+"_new_comment' rows='2' cols='80'></textarea><br>";
	commentdiv.innerHTML += "<button onclick='add_comment("+post_id+")'>Comment</button>";
	}
function add_comment(post_id)
	{
	var xmlhttp;
	var comment = document.getElementById(post_id+"_new_comment").value;
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
			document.getElementById(post_id+"_my_comments").innerHTML+=xmlhttp.responseText;
			}
		}
	xmlhttp.open("GET","../comment/comment.php?post_id="+post_id+"&comment="+comment,true);
	xmlhttp.send();
	}