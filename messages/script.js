// JavaScript Document
function show_this_members_messages(messagesender)
	{
	// Member Messaged background color 
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
    		document.getElementById("person_messages").innerHTML=xmlhttp.responseText;
    		}
  		}
	xmlhttp.open("GET","showmessages.php?other_member=" + messagesender,true);
	xmlhttp.send();			
	}
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
function showmessages(sender)
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
    		document.getElementById("conversation").innerHTML=xmlhttp.responseText;
    		document.getElementById("conversation").style.display="block";
    		}
  		}
	xmlhttp.open("GET","showmessages.php?other_member=" + sender,true);
	xmlhttp.send();		
	}
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
if (typeof(EventSource)!=="undefined")
	{
	var source = new EventSource("got_new_message.php");
	source.addEventListener('show_new_message', function (e) 
		{
		document.getElementById("message_box_table").innerHTML += e.data;
		}, false);
	}
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Start OF Focus Message Text Area On Message Page
function select_message_textarea()
	{
	var msg = document.getElementById('message_textarea').innerHTML;	
	if ( msg == "New Message :")
		{
		document.getElementById('message_textarea').innerHTML = "";
		}
	document.getElementById('message_textarea').focus();
	}
// END OF Focus Message Text Area On Message Page
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
function deletemessage(mid)
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
    		document.getElementById('AJAX').innerHTML = xmlhttp.responseText;
			var elem = document.getElementById(mid);
    		elem.parentNode.removeChild(elem);
			document.getElementById('message_option').style.height="0px";
    		}
  		}
	xmlhttp.open("POST","delete_message.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("message_id=" + mid);			
	}
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
function send_message(reciever)
	{
	var message	=	document.getElementById('message_textarea').innerHTML;
	//var reciever	=	document.getElementById('message_receiver').value;
	var xmlhttp;
	if (message != '' && message != 'New Message :')
		{
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
    		document.getElementById('message_box_table').innerHTML += xmlhttp.responseText;
			setTimeout(function() {document.getElementById('message_textarea').innerHTML = "";},100);
			}
  		}
	xmlhttp.open("POST","sendmessage.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("message_receiver=" + reciever + "&message=" + message);
		}
	}
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
var visiblity_of_insert_picture_form;
visiblity_of_insert_picture_form = 0;
function show_insert_picture_form()
	{
	if (visiblity_of_insert_picture_form == 0)
		{
		document.getElementById('insert_picture_form').style.display="block";
		visiblity_of_insert_picture_form = 1;
		}
	else if (visiblity_of_insert_picture_form == 1)
		{
		document.getElementById('insert_picture_form').style.display="none";
		visiblity_of_insert_picture_form = 0;	
		}
	}
//
/////////
//