<?php

$this_firstname			= "Faheem";
$this_lastname 			= "Khaskheli";
$this_email				= "Faheemkhaskheli9@yahoo.com";
$this_gender			= "Male";
$this_dob				= "24-04-1992";
$this_display_image 	= "";
$this_home_town			= "Mirpur Khas , Sindh , Pakistan";
$this_current_location	= "Hyderabad , Sindh , Pakistan";
$this_relationship		= "Single";

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Faheem Khaskheli">
<meta name="keywords" content="Faheem Khaskheli">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title><?php echo $this_firstname . ' ' . $this_lastname;?></title>
<style>
@charset "utf-8";
/* CSS Document */
body
{
margin:0px;
font-family:Georgia, "Times New Roman", Times, serif;
font-style:oblique;
overflow-y:hidden;
}
#nav
{
height:100%;
z-index:0;
width:6000px;
}
.tab
{
float:left;
margin:20px;
margin-top:10px;
width:500px;
min-height:500px;
}
.icon
{
float:left;
width:100px;
height:130px;
text-align:center;
margin:10px;
cursor:pointer;
}
#heading
{
text-align:center;
background-color:#0066FF;
border-radius:5px;
color:#FFFFFF;
width:500px;
margin-top:-20px;
}
#signin,#signup
{
text-align:left;
}
#signin table
{
margin:10px;
margin-left:60px;
}
#signup table
{
margin:10px;
margin-left:60px;
}
#signin #heading h2,#signup #heading h2,#info #heading h2
{
padding:5px;
}
#welcome_message 
{
font-size:22px;
font-family:Georgia, "Times New Roman", Times, serif;
font-style:oblique;
}
#sub_message 
{
font-size:18px;
font-family:Georgia, "Times New Roman", Times, serif;
font-style:oblique;
}
.inputfield
{
padding:5px;
border-radius:5px;
width:200px;
box-shadow:0px 0px 5px #000000;
}
.button
{
width:100px;
padding:5px;
border-radius:5px;
text-align:center;
background-color:rgb(255,32,48);
color:#FFFFFF;
}
#main_menu_container
{
height:0px;
overflow:hidden;
padding-left:50px;
transition:linear 1s height;
}
#main_menu
{
background-color:rgb(255,32,48);
margin-top:20px;
padding:1px;
border-radius:5px;
z-index:9;
width:100px;
}
#main_menu div
{
color:#FFFFFF;
font-size:14;
margin:1px;
padding:5px;
border-radius:5px;
}
#main_menu div:hover
{
background-color:#666666;
}
#main_menu a
{
text-decoration:none;
}
#notification
{
position:fixed;
bottom:10px;
left:20px;
width:100%;
z-index:99;
}
#site_notification
{
background-color:#22FF11;
color:#FFFFFF;
width:70px;
height:16px;
margin:5px;
padding:10px;
border-radius:5px;
display:inline-block;
transition:linear 1s width;
white-space:nowrap; 
overflow:hidden;
position:relative;
text-overflow:ellipsis;
-webkit-animation:linear errorAppear 10s; /* Chrome, Safari, Opera */
animation:linear errorAppear 10s;
cursor:pointer;
}
#updates
{
display:inline-block;
}
#update
{
cursor:pointer;
min-height:100px;
max-height:400px;
border:1px solid black;
border-radius:5px;
border-top:0px;
box-shadow:0px 5px 10px #000000;
}
#update #heading
{
box-shadow:0px 5px 2px #000000;
}
#update #status
{
padding:10px;
overflow:hidden;
height:293px;
word-wrap:normal;
text-overflow:ellipsis;
}
#detail
{
padding:10px;
}
</style>
<script>
// JavaScript Document
if (typeof(Storage) != "undefined") {
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
}
function autoResize(size){
	var numItems = $('.tab').length;
	var width = ((numItems) * size);
    document.getElementById('nav').style.width= width + "px";
}

var mouseY;
var mouseX;

$(document).ready(function(){
	$("div").on('mousedown', function(e) {
		if (e.which === 3) {
   			var id = $(this).attr("id");
			if (id == "update")
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
function readMouseMove(e){
	mouseX = e.clientX;
	mouseY = e.clientY;
}
document.onmousemove = readMouseMove;

function showMainMenu()
	{
	if (document.getElementById('main_menu_container').style.height != "200px")
	document.getElementById('main_menu_container').style.height = "200px";
	else if (document.getElementById('main_menu_container').style.height == "200px")
	document.getElementById('main_menu_container').style.height = "0px";
	}

var x = document.getElementById("result");
var x2 = document.getElementById("result2");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition,showError);
		navigator.geolocation.watchPosition(showPositionLive,showError);
	} else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var latlon = position.coords.latitude+","+position.coords.longitude;

    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=14&size=400x300&sensor=false";
    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
}

function showPositionLive(position) {
    var latlon = position.coords.latitude+","+position.coords.longitude;

    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=14&size=400x300&sensor=false";
    document.getElementById("mapholderLive").innerHTML = "<img src='"+img_url+"'>";
	x2.innerHTML += position.coords.speed;
	x2.innerHTML += timestamp;
	x2.innerHTML += position.coords.heading;
	x2.innerHTML += position.coords.altitudeAccuracy;
	x2.innerHTML += position.coords.altitude;
	x2.innerHTML += position.coords.accuracy;
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
</script>
</head>

<body onLoad="autoResize(546)" oncontextmenu="return false;" onFocus="getLocation()">


<div id="nav">

<div id="profile" class="tab">

<div id="heading" ><h2><?php echo $this_firstname . ' ' . $this_lastname;?></h2></div>
<table cellpadding="5" cellspacing="10">
<tr><td rowspan="9" width="150" style="text-align:center;"><img src="<?php echo $this_display_image;?>" width="100" height="100"></td></tr>
<tr><td>Gender</td><td width="10">:</td><td><?php echo $this_gender;?></td></tr>
<tr><td>Date Of Birth</td><td width="10">:</td><td><?php echo $this_dob;?></td></tr>
<tr><td>Current Location</td><td width="10">:</td><td><?php echo $this_current_location;?></td></tr>
<tr><td>Home Town</td><td width="10">:</td><td><?php echo $this_home_town;?></td></tr>
<tr><td>Relationship</td><td width="10">:</td><td><?php echo $this_relationship;?></td></tr>
</table>

</div>

<div id="map" class="tab">
<div id="heading"><h2>Current Location</h2></div>
<div id="result"></div>
<div id="mapholder" style="text-align:center;"></div>
</div>

<div id="map" class="tab">
<div id="heading"><h2>Current Location Live</h2></div>
<div id="result2"></div>
<div id="mapholder2" style="text-align:center;"></div>
</div>

<div id="places" class="tab">
<div id="heading"><h2>Places Visited</h2></div>
</div>

<div id="education" class="tab">
<div id="heading"><h2>Education</h2></div>
</div>

<div id="work" class="tab">
<div id="heading"><h2>Work</h2></div>
</div>

<div id="political" class="tab">
<div id="heading"><h2>Political Views</h2></div>
</div>

<div id="religious" class="tab">
<div id="heading"><h2>Religious Views</h2></div>
</div>

<div id="contact" class="tab">
<div id="heading"><h2>Contact Detail</h2></div>
</div>

<div id="websites" class="tab">
<div id="heading"><h2>Websites</h2></div>
</div>

<div id="family" class="tab">
<div id="heading"><h2>Family</h2></div>
</div>

</div>

<a href="skype:faheem.khaskheli9?call">

<div style="position:fixed;bottom:10px;right:500px;background-color:rgb(2,175,241);width:200px;height:120px;text-align:center;border-radius:10px;padding:10px;">

<img src="http://entire-web.net/images/skype-logo.jpg" height="100">

<br/>
<span style="color:black;">Call the Faheem Khaskheli</span>
</div>

</a>

</body>
</html>