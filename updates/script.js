// JavaScript Document
if (typeof(EventSource)!=="undefined")
	{
	var source = new EventSource("latest_updates.php");
	source.addEventListener('updates', function (e) 
		{
		document.getElementById("latest_updates").innerHTML += e.data;
		changing_update();
		}, false);
	}
function show_new_update_div()
	{
	if (document.getElementById("new_update_div").style.display == "block")
	document.getElementById("new_update_div").style.display = "none";
	else
	document.getElementById("new_update_div").style.display = "block";
	if (document.getElementById("background_black").style.display == "block")
	document.getElementById("background_black").style.display = "none";
	else
	document.getElementById("background_black").style.display = "block";
	}
function changing_update()
    {
	$("#latest_updates").contents().unwrap();
	$("div #temp_latest_updates").replaceWith("<div id=\"temp_latest_updates\">");
	var content = document.getElementById('new_temp_update').innerHTML;
	$("div #new_temp_update").replaceWith("<div class=\"tab\">"+content+"</div>");
	$('#temp_latest_updates').replaceWith("<div id=\"latest_updates\"></div>");
	}
var interval = 5;
var time_remaining = 0;
setInterval(function()
	{
	if (time_remaining>0)
		time_remaining -= 1;
	},1000);
function post_new_update()
	{
	if (time_remaining == 0)
		{
		time_remaining = interval;
		//var title = document.getElementById("new_update_title").value;
		var type = document.getElementById("type_post").value;
		if (type == 'group')
			var gid = document.getElementById("group_id").value;
		else
			var gid = 0;
		var post = document.getElementById("new_update_textarea").innerHTML;
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
				document.getElementById("new_update_result_cell").style.display="block";
    			document.getElementById("new_update_result_cell").innerHTML=xmlhttp.responseText;
				//document.getElementById("new_update_title").value = '';
				document.getElementById("new_update_textarea").innerHTML = '';
				changing();
				show_new_update_div();
    			}
 			}
		xmlhttp.open("POST","../updates/new.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("title="+title+"&post="+post+"&type="+type+"&loc_id="+gid);
		}
	}
function changing()
    {
	$("#new_update_result_cell").contents().unwrap();
	$("td #temp_new_update_result_cell").replaceWith("<div id=\"temp_new_update_result_cell\">");
	var content = document.getElementById('new_temp').innerHTML;
	$("div #new_temp").replaceWith("<div class=\"tab\">"+content+"</div>");
	$('#temp_new_update_result_cell').replaceWith("<div id=\"new_update_result_cell\"></div>");
	}
function upload_image()
	{
	document.getElementById('loading').innerHTML = '<img src="../images/site/ajax-loader.gif" alt="Uploading...."/>';
	$("#picform").ajaxForm({
	target: '#uploaded_images'
	}).submit();
	setTimeout(function(){show_uploaded_image();},1000);
	}
function show_uploaded_image()
	{
	if(document.getElementById('uploaded_images').innerHTML != '')
		{
		document.getElementById('new_update_textarea').innerHTML += document.getElementById('uploaded_images').innerHTML;
		document.getElementById('uploaded_images').innerHTML = "";
		document.getElementById('loading').innerHTML = '';
		}
	else
		{
		setTimeout(function(){show_uploaded_image();},1000);
		}
	}
/*
function clicked_post(pid)
	{
	document.getElementById('right_click_menu').style.left = tempX+"px";
	document.getElementById('right_click_menu').style.top = tempY+"px";
	document.getElementById('right_click_menu').style.display = "block";
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
  			document.getElementById("right_click_menu").innerHTML=xmlhttp.responseText;
   			}
		}
	xmlhttp.open("POST","right_click.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("pid="+pid);
	}
*/
<!--
// Detect if the browser is IE or not.
// If it is not IE, we assume that the browser is NS.
var IE = document.all?true:false

// If NS -- that is, !IE -- then set up for mouse capture
if (!IE) document.captureEvents(Event.MOUSEMOVE)

// Set-up to use getMouseXY function onMouseMove
document.onmousemove = getMouseXY;

// Temporary variables to hold mouse x-y pos.s
var tempX = 0
var tempY = 0

// Main function to retrieve mouse x-y pos.s

function getMouseXY(e) 
	{
	if (IE) 
		{ // grab the x-y pos.s if browser is IE
    	tempX = event.clientX + document.body.scrollLeft
    	tempY = event.clientY + document.body.scrollTop
  		} 
	else 
		{  // grab the x-y pos.s if browser is NS
    	tempX = e.pageX
    	tempY = e.pageY
  		}  
  	// catch possible negative values in NS4
  	if (tempX < 0){tempX = 0}
  	if (tempY < 0){tempY = 0}  
  	// show the position values in the form named Show
  	// in the text fields named MouseX and MouseY
  	return true
	}
function show_more()
	{
	if (document.getElementById('last_post_id') != null)
	var pid = document.getElementById('last_post_id').value;
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
			$('#show_more_div').remove();
 			document.getElementById("nav").innerHTML += xmlhttp.responseText;
			}
		}
	xmlhttp.open("POST","load_posts.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("pid="+pid);
	}
setTimeout(show_more(),1000);
function change_privacy(contenttype,newprivacy,uniqueid)
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
 			document.getElementById("privacy_"+uniqueid).innerHTML = xmlhttp.responseText;
			}
		}
	xmlhttp.open("POST","../updates/change_privacy.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("ctype="+contenttype+"&privacy="+newprivacy+"&uid="+uniqueid);
	}