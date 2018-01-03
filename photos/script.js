// JavaScript Document
function display(img_link)
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
			document.getElementById("image_showing_div").style.display = 'block';
    		document.getElementById("image_showing_div").innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","./display.php?img_link="+img_link,true);
	xmlhttp.send();		
	}
function hide_image_showing()
	{
	document.getElementById("image_showing_div").style.display = 'none';
	}
function delete_this(id)
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
			if (xmlhttp.responseText == "done")
				window.location = "./";
			}
 		}
	xmlhttp.open("GET","./delete.php?img_id="+id,true);
	xmlhttp.send();	
	}