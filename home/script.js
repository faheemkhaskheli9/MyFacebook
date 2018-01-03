// JavaScript Document
function show_other_fields()
	{
	var sel = document.getElementById('missing_status').value;
	var data = '';
	if (sel == 'Student')
		{
		data += '<table>';
		data += '<tr><td width="300">Enter Your Department</td><td><select id="missing_department"><option value="CSE">CSE</option>';
		data += '<option value="TL">TL</option><option value="IT">IT</option><option value="SW">SW</option></select></td></tr>';
		data += '<tr><td width="300">Enter Your Batch</td><td><input type="number" min="01" max="99" id="missing_batch"></td></tr>';
		data += '<tr><td width="300">Enter Your Roll Number</td><td><input type="number" min="01" max="300" id="missing_rollno"></td></tr>';
		data += '</table>';
		}
		document.getElementById('other_info').innerHTML = data;	
	}
function update_missing_info()
	{
	var status = document.getElementById('missing_status').value;		
	var dept = document.getElementById('missing_department').value;
	var batch = document.getElementById('missing_batch').value;
	var rollno = document.getElementById('missing_rollno').value;
	if (status != '' && dept != '' && batch != '' && rollno != '')
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
				document.getElementById("missing_data_main").innerHTML=xmlhttp.responseText;
				}
			}
		xmlhttp.open("GET","./update_data.php?status="+status+"&dept="+dept+"&batch="+batch+"&rollno="+rollno,true);
		xmlhttp.send();
		}		
	}