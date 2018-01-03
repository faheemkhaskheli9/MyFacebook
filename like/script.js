// JavaScript Document
function likethis(id,type)
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
			document.getElementById(id+"_likes_div").innerHTML=xmlhttp.responseText;
			}
		}
	xmlhttp.open("GET","../like/like.php?"+type+"_id="+id,true);
	xmlhttp.send();
	}
function unlikethis(id,type)
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
			document.getElementById(id+"_likes_div").innerHTML=xmlhttp.responseText;
			}
		}
	xmlhttp.open("GET","../like/unlike.php?"+type+"_id="+id,true);
	xmlhttp.send();
	}