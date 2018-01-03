// JavaScript Document
function upload_dp()
	{
	$("#currentdisplaypic").html('<img src="../images/ajax-loader.gif" alt="Uploading...."/>');
	$("#displaypicform").ajaxForm({
	target: '#display_pic_preview'
	}).submit();		
	}
function update_profile()
	{
	var gender = document.getElementById("gender_value").value;
	var dob_day = document.getElementById("dob_day_value").value;
	var dob_mon = document.getElementById("dob_mon_value").value;
	var dob_yrs = document.getElementById("dob_yrs_value").value;
	var home_town = document.getElementById("home_town_value").value;
	var relationship = document.getElementById("relationship_value").value;
	var phone_number = document.getElementById("phone_number_value").value;
	var email = document.getElementById("email_value").value;
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
			cancle_edit_profile();
			}
 		}
	xmlhttp.open("POST","edit.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("gender="+gender+"&dob_day="+dob_day+"&dob_mon="+dob_mon+"&dob_yrs="+dob_yrs+"&home_town="+home_town+"&relationship="+relationship+"&phone_number="+phone_number+"&email="+email);
	}
function edit_profile()
	{
	document.getElementById("edit_profile_button").style.display="none";
	
	document.getElementById("gender").style.display="none";
	document.getElementById("display_pic").style.display="none";
	if (document.getElementById("phone_number") != null)
	document.getElementById("phone_number").style.display="none";
	if (document.getElementById("email") != null)
	document.getElementById("email").style.display="none";
	document.getElementById("date").style.display="none";
	document.getElementById("relationship").style.display="none";
	document.getElementById("home_town").style.display="none";
	
	document.getElementById("cancle_edit_profile_button").style.display="block";
	document.getElementById("save_edit_profile_button").style.display="block";
	document.getElementById("edit_gender").style.display="block";
	document.getElementById("edit_display_pic").style.display="block";
	if (document.getElementById("edit_phone_number") != null)
	document.getElementById("edit_phone_number").style.display="block";
	if (document.getElementById("edit_email") != null)
	document.getElementById("edit_email").style.display="block";
	document.getElementById("edit_date").style.display="block";
	document.getElementById("edit_relationship").style.display="block";
	document.getElementById("edit_home_town").style.display="block";
	
	document.getElementById("display_pic_preview").innerHTML = document.getElementById("display_pic").innerHTML;
	}
function cancle_edit_profile()
	{
	document.getElementById("edit_profile_button").style.display="block";
	
	document.getElementById("gender").style.display="block";
	document.getElementById("display_pic").style.display="block";	
	if (document.getElementById("phone_number") != null)
	document.getElementById("phone_number").style.display="block";
	if (document.getElementById("email") != null)
	document.getElementById("email").style.display="block";
	document.getElementById("date").style.display="block";
	document.getElementById("relationship").style.display="block";
	document.getElementById("home_town").style.display="block";
	
	document.getElementById("cancle_edit_profile_button").style.display="none";
	document.getElementById("save_edit_profile_button").style.display="none";
	document.getElementById("edit_gender").style.display="none";
	document.getElementById("edit_display_pic").style.display="none";
	if (document.getElementById("edit_phone_number") != null)
	document.getElementById("edit_phone_number").style.display="none";
	if (document.getElementById("edit_email") != null)
	document.getElementById("edit_email").style.display="none";
	document.getElementById("edit_date").style.display="none";
	document.getElementById("edit_relationship").style.display="none";
	document.getElementById("edit_home_town").style.display="none";
	}
	
var delay = 100;
var c_t = 0;
function show_send_message_interface(uid)
{
//document.getElementById("send_message_interface").style.display="block";
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
			$('body').append(xmlhttp.responseText);
    		//document.getElementById("send_message_interface").innerHTML=xmlhttp.responseText;
			//document.getElementById("send_message_interface").style.display="none";
			}
 		}
	xmlhttp.open("GET","./send_message_form.php?id="+uid,true);
	xmlhttp.send();
}
function send_message(u_id)
{
	var message = document.getElementById("new_message").innerHTML;
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
    		document.getElementById("send_message_interface").innerHTML=xmlhttp.responseText;
			remove_send_message_form();
			//document.getElementById("send_message_interface").style.display="none";
			}
 		}
	xmlhttp.open("POST","send_message.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("message="+message+"&u_id="+u_id);
}
function remove_send_message_form()
	{
	setTimeout(function(){$("#send_message_interface").remove();},1000);
	}
function show_profile_detail(name,u_id,other)
	{
	filename = './show_data.php';
	if (name == 'location')
		getLocation(u_id);
	if (name == 'posts')
		{
		if (document.getElementById('last_post_id') != null)
			var pid = document.getElementById('last_post_id').value;
		parameters = "name="+name+"&u_id="+u_id+"&pid="+pid;
		}
	else
		{
		parameters = "name="+name+"&u_id="+u_id;
		}
	if (name == 'student detail')
		parameters += "&other="+other;
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
    		document.getElementById("profile_detail_result").innerHTML=xmlhttp.responseText;
			//document.getElementById("send_message_interface").style.display="none";
			}
 		}
	xmlhttp.open("POST",filename,true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(parameters);		
	}
function show_more(uid)
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
 			document.getElementById("profile_detail_result").innerHTML += xmlhttp.responseText;
			}
		}
	xmlhttp.open("POST","../updates/load_myposts.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("pid="+pid+"&uid="+uid);
	}
function add_friend(uid)
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
 			document.getElementById("friend_button").innerHTML = xmlhttp.responseText;
			}
		}
	xmlhttp.open("POST","../contacts/add.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("uid="+uid);	
	}
function remove_friend(uid)
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
 			document.getElementById("friend_button").innerHTML = xmlhttp.responseText;
			}
		}
	xmlhttp.open("POST","../contacts/remove.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("uid="+uid);	
	}