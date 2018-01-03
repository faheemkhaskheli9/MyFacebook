// JavaScript Document
function insert_marks(sub_id)
	{
	var marks = document.getElementById('marks_'+sub_id).value;
	if (marks >= 0 && marks <= 100)
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
				document.getElementById("missing_marks_"+sub_id).innerHTML=xmlhttp.responseText;
				}
			}
		xmlhttp.open("GET","./insert_marks.php?subid="+sub_id+"&marks="+marks,true);
		xmlhttp.send();
		}
	}
function insert_p_marks(sub_id)
	{
	var marks = document.getElementById('p_marks_'+sub_id).value;
	if (marks >= 0 && marks <= 100)
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
				document.getElementById("missing_p_marks_"+sub_id).innerHTML=xmlhttp.responseText;
				}
			}
		xmlhttp.open("GET","./insert_p_marks.php?subid="+sub_id+"&marks="+marks,true);
		xmlhttp.send();
		}
	}