// JavaScript Document
if (typeof(EventSource)!=="undefined")
	{
	var source = new EventSource("../notification/update.php");
	source.addEventListener('new_notification', function (e) 
		{
		document.getElementById("notification_preview").innerHTML += e.data;
		}, false);	
	/*
	var source = new EventSource("../notification/msg_preview.php");
	source.addEventListener('new_msg_preview', function (e) 
		{
		document.getElementById("msg_notification").innerHTML += e.data;
		}, false);
	*/
	var source = new EventSource("../notification/new_notification.php");
	source.addEventListener('new_notification_counts', function (e) 
		{
		document.getElementById("new_notification_counts").innerHTML = e.data;
		}, false);
	var source = new EventSource("../notification/new_msg.php");
	source.addEventListener('new_msg_counts', function (e) 
		{
		document.getElementById("new_msg_counts").innerHTML = e.data;
		}, false);
	}
function remove_notification(nid)
	{
	$("#"+nid).remove();
	}
function remove_ElementById(id)
	{
	$("div").remove("#"+id);
	}
function show_notification()
	{
	if (document.getElementById("notification").innerHTML != '')
		document.getElementById("notification").innerHTML = '';
	else
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
				document.getElementById("notification").innerHTML=xmlhttp.responseText;
				}
			}
		xmlhttp.open("GET","../notification/notification_preview.php",true);
		xmlhttp.send();
		}
	}
function show_msg_notification()
	{
	if (document.getElementById("msg_notification").innerHTML != '')
		document.getElementById("msg_notification").innerHTML = '';
	else
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
				document.getElementById("msg_notification").innerHTML=xmlhttp.responseText;
				}
			}
		xmlhttp.open("GET","../messages/msg_preview.php",true);
		xmlhttp.send();
		}
	}
//if (typeof(Storage) != "undefined") {
    // Store
    // localStorage.setItem("lastname", "Smith");
    // Retrieve
    // document.getElementById("result").innerHTML = localStorage.getItem("lastname");
	// Remove
	// localStorage.removeItem("lastname");
	// Session Storage
	// if (sessionStorage.clickcount) {
    //        sessionStorage.clickcount = Number(sessionStorage.clickcount)+1;
    //    } else {
    //        sessionStorage.clickcount = 1;
    //    }
//}
/*
function autoResize(size){
	var numItems = $('.tab').length;
	var width = ((numItems) * size);
	width += 160;
    document.getElementById('nav').style.width= width + "px";
}
function setSize(size){
	document.getElementById('nav').style.width= size + "px";
}
*/

/*
$(document).ready(function(){
	$("div").on('mousedown', function(e) {
		if (e.which === 3) {
			var mouseX = e.clientX;
			var mouseY = e.clientY;
			var classes = $(this).attr("class");
			var ids = $(this).attr("id");
			if (classes == "clickable")
				{
				document.getElementById('right_click_menu').style.display = "block";
				document.getElementById('right_click_menu').style.top = mouseY+"px";
				document.getElementById('right_click_menu').style.left = mouseX+"px";
				var content = "";
				content += "<table>";
				content += "<tr><td>Show</td></tr>";
				content += "<tr><td>Hide</td></tr>";
				content += "<tr><td>Comment</td></tr>";
				content += "<tr><td>Like</td></tr>";
				content += "<tr><td>Share</td></tr>";
				content += "</table>";
				document.getElementById('right_click_menu').innerHTML = content;
				}
		}
		else
			{
			document.getElementById('right_click_menu').style.display = "none";
			document.getElementById('right_click_menu').innerHTML = "";
			}
	});
});
*/
function showMainMenu()
	{
	if (document.getElementById('main_menu_container').style.height != "300px")
	document.getElementById('main_menu_container').style.height = "300px";
	else if (document.getElementById('main_menu_container').style.height == "300px")
	document.getElementById('main_menu_container').style.height = "0px";
	}

function header_searching()
	{
	var content = document.getElementById("searchbar").innerHTML
	var type	= document.getElementById("search_type").value;
	
	if ( document.location.href.indexOf('/search/') != -1 )
		searching(type);
	else
		document.location.href = '../search/?type='+type+'&search='+content;
	}
function quick_search()
	{
	var content = document.getElementById("searchbar").innerHTML;
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
    		document.getElementById("quick_search_results").innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","../search/quick.php?content="+content,true);
	xmlhttp.send();
	}
function empty_quick_search()
	{
	setTimeout(function(){document.getElementById("quick_search_results").innerHTML = ''},1000);
	}
function sub_menu()
	{
	if(document.getElementById("sub_menu_item").style.width != "0px")
	document.getElementById("sub_menu_item").style.width="0px";
	else
	document.getElementById("sub_menu_item").style.width="60px";
	}
	/*
function people_option(uid)
	{
	if(document.getElementById("people_option_"+uid).style.display == "block")
	document.getElementById("people_option_"+uid).style.display="none";
	else
	document.getElementById("people_option_"+uid).style.display="block";	
	}
	*/

function get_update(uid)
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
    		document.getElementById("follow_button_"+uid).innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","../contacts/get_update.php?uid="+uid,true);
	xmlhttp.send();
	}
function stop_update(uid)
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
    		document.getElementById("follow_button_"+uid).innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","../contacts/stop_update.php?uid="+uid,true);
	xmlhttp.send();
	}
function remove_html_element(id)
	{
	$('#'+id).remove();
	}
function show_ajaxById(file_path,id)
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
			$('.popup').remove();
			$('body').append(xmlhttp.responseText)
   			}
		}
	xmlhttp.open("GET","./"+file_path+".php?id="+id,true);
	xmlhttp.send();
	}
function set_data_by_id(e_id,label,data)
	{
	document.getElementById(e_id).setAttribute(label,data);
	alert(data+" "+label+" "+e_id);
	}