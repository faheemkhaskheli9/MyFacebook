function add_to_contact(uid)
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
    		document.getElementById("contacts_button_"+uid).innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","../contacts/add.php?uid="+uid,true);
	xmlhttp.send();		
	}
function remove_from_contact(uid)
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
    		document.getElementById("contacts_button_"+uid).innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","../contacts/remove.php?uid="+uid,true);
	xmlhttp.send();		
	}