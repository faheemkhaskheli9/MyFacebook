// JavaScript Document
function ask_question()
	{
		var question_title = document.getElementById("question_title").value;
		var question = document.getElementById("new_question").innerHTML;
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
    			document.getElementById("ask_question_div").innerHTML=xmlhttp.responseText;
				setTimeout(function(){remove_html_element('ask_question_div');},1000);
    			}
 			}
		xmlhttp.open("POST","../question/new_question.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("question_title="+question_title+"&question="+question);
		
	}
function submit_answer(qid)
	{
	var answer = document.getElementById("new_answer").value;
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
   			document.getElementById("new_answer_form_div").innerHTML=xmlhttp.responseText;
			setTimeout(function(){remove_html_element('new_answer_form_div');},1000);
   			}
		}
	xmlhttp.open("POST","./new_answer.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("answer="+answer+"&qid="+qid);
	}
function deletethis(id,type)
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
   			//document.getElementById("answer_"+id).innerHTML=xmlhttp.responseText;
			if (xmlhttp.responseText == 'done')
				setTimeout(function(){remove_html_element("answer_"+id);},100);
			else
				document.getElementById("answer_"+id).innerHTML=xmlhttp.responseText;
   			}
		}
	xmlhttp.open("POST","./delete.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+id+"&type="+type);
	}
function chose_as_best(ans_id,ques_id)
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
   			//document.getElementById("answer_"+id).innerHTML=xmlhttp.responseText;
			//if (xmlhttp.responseText == 'done')
				//setTimeout(function(){remove_html_element("select_as_best_"+id);},100);
			//else
				document.getElementById("select_as_best_"+ans_id).innerHTML=xmlhttp.responseText;
   			}
		}
	xmlhttp.open("POST","./best_answer.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("ans_id="+ans_id+"&ques_id="+ques_id);
	}
function remove_as_best(ans_id,ques_id)
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
   				document.getElementById("selected").innerHTML=xmlhttp.responseText;
				$('#selected').remove();
   			}
		}
	xmlhttp.open("POST","./nobest_answer.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("ans_id="+ans_id+"&ques_id="+ques_id);
	}