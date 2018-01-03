// JavaScript Document
function searching(search_type)
	{
	var content = document.getElementById("searchbar").innerHTML
	show_advance_search(search_type);
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
    		document.getElementById("search_result").innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","./"+search_type+".php?content="+content,true);
	xmlhttp.send();
	}
function show_advance_search(search_type)
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
    		document.getElementById("advance_search").innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","./advance_search.php?type="+search_type,true);
	xmlhttp.send();		
	}
// JavaScript Document
function search_groups()
	{
	var content = document.getElementById("searchbar").innerHTML
	var gname = document.getElementById("gname").value;
	var gdesc = document.getElementById("gdesc").value;
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
    		document.getElementById("search_result").innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","./groups.php?content="+content+"&gname="+gname+"&gdesc="+gdesc,true);
	xmlhttp.send();		
	}
function search_notes()
	{
	var content = document.getElementById("searchbar").innerHTML
	var subjects 		= document.getElementById("subjects").value;
	var department 		= document.getElementById("department").value;
	var term 			= document.getElementById("term").value;
	var chapter_name 	= document.getElementById("chapter_name").value;
	var notes_content	= document.getElementById("notes_content").value;
	var author 			= document.getElementById("author").value;
	var source	 		= document.getElementById("source").value;
	var published_date 	= document.getElementById("published_date").value;
	var book_name 		= document.getElementById("book_name").value;
	var posted_date 	= document.getElementById("posted_date").value;
	var posted_by 		= document.getElementById("posted_by").value;
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
    		document.getElementById("search_result").innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","./notes.php?content="+content+"&subjects="+subjects+"&department="+department+"&term="+term+"&chapter_name="+chapter_name+"&notes_content="+notes_content+"&author="+author+"&source="+source+"&published_date="+published_date+"&book_name="+book_name+"&posted_date="+posted_date+"&posted_by="+posted_by,true);
	xmlhttp.send();		
	}
function search_people()
	{
	var content 		= document.getElementById("searchbar").innerHTML
	var firstname 		= document.getElementById("firstname").value;
	var lastname		= document.getElementById("lastname").value;
	var email			= document.getElementById("email").value;
	var gender	 		= document.getElementById("gender").value;
	var status			= document.getElementById("status").value;
	var hometown 		= document.getElementById("hometown").value;
	var relationship	= document.getElementById("relationship").value;
	var phonenumber 	= document.getElementById("phonenumber").value;
	
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
    		document.getElementById("search_result").innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","./people.php?content="+content+"&firstname="+firstname+"&lastname="+lastname+"&email="+email+"&gender="+gender+"&status="+status+"&hometown="+hometown+"&relationship="+relationship+"&phonenumber="+phonenumber,true);
	xmlhttp.send();		
	}
function search_post()
	{
	var content 		= document.getElementById("searchbar").innerHTML
	var post 			= document.getElementById("posts").value;
	var posted_date		= document.getElementById("posted_date").value;
	var posted_by		= document.getElementById("posted_by").value;
	
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
    		document.getElementById("search_result").innerHTML=xmlhttp.responseText;
			}
 		}
	xmlhttp.open("GET","./post.php?content="+content+"&post="+post+"&posted_date="+posted_date+"&posted_by="+posted_by,true);
	xmlhttp.send();		
	}