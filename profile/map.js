// JavaScript Document
var x;
var marker;
var infowindows;
var map;
var	mycenter;
var target;
//var bounds;
function getLocation(u_id) 
	{
	target = u_id;
	x = document.getElementById("map_result");
    if (navigator.geolocation) 
	{
        //navigator.geolocation.watchPosition(initialize,showError);
		navigator.geolocation.getCurrentPosition(initialize,showError);
	} else 
	{
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function add_marker(uname)
	{
  marker=new google.maps.Marker({
  position:mycenter,
  map:map
  });
	//marker.setMap(map);
	
	var infowindow = new google.maps.InfoWindow({
  content:uname
  });	
	infowindow.open(map,marker);
	
	//map.fitBounds(bounds);
	/*
	var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
	*/
	
		google.maps.event.addListener(marker,'click',function() {
	  map.setZoom(16);
	  map.setCenter(marker.getPosition());
	  
		  });
	}
function add_marker_users(center,uname)
	{
  	var marker_extra =new google.maps.Marker({
  	position:center,
  	map:map
  	});
	
	var infowindow = new google.maps.InfoWindow({
  	content:uname
  	});	
	infowindow.open(map,marker_extra);
	
	google.maps.event.addListener(marker_extra,'click',function() {
		map.setZoom(16);
		map.setCenter(marker_extra.getPosition());
	  	});
	}
function get_my_location()
	{
	if (target != '')
		{
		$.getJSON( "../map/get_targets.php?u_id="+target, function( data ) {
		$.each( data.user_location, function( key, val ) {
			var c = new google.maps.LatLng(val.latitude,val.longitude);
			setTimeout(function(){add_marker_users(c,val.name)},(1000));
			});
		 });
		}
	else
		{
		//document.getElementById("send_message_interface").style.display="block";
			$.getJSON( "../map/get_my_location.php", function( data ) {
			  $.each( data.user_location, function( key, val ) {
				add_marker(val.name);
			});
		 });
			map.setCenter(mycenter); 
		}
	}
function initialize(position)
	{
	if (target != '')
		{
		$.getJSON( "../map/get_targets.php?u_id="+target, function( data ) {
		$.each( data.user_location, function( key, val ) {
			var c = new google.maps.LatLng(val.latitude,val.longitude);
			setTimeout(function(){add_marker_users(c,val.name)},1000);
			
			var mapProp = {
		    center: c,
			zoom:4,
			panControl:true,
			zoomControl:true,
			mapTypeControl:true,
			scaleControl:true,
			streetViewControl:true,
			overviewMapControl:true,
			rotateControl:true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  };
		  
		  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);  
			});
		 });
		map.setCenter(mycenter); 
		}
	else
		{
		//document.getElementById("send_message_interface").style.display="block";
			$.getJSON( "../map/get_my_location.php", function( data ) {
			  $.each( data.user_location, function( key, val ) {
			   	mycenter = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
  				add_marker(val.name);
				
			  	var mapProp = {
				center: mycenter,
				zoom:8,
				panControl:true,
				zoomControl:true,
				mapTypeControl:true,
				scaleControl:true,
				streetViewControl:true,
				overviewMapControl:true,
				rotateControl:true,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			  };
			  
			  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);  
			});
		 });
		map.setCenter(mycenter); 
		}
	//bounds = new google.maps.LatLngBounds();
	save_user_current_location(position.coords.latitude,position.coords.longitude);
	
	//mycenter = new google.maps.LatLng(70,71);
}

//google.maps.event.addDomListener(window, 'load', getLocation);
//
function showError(error) 
{	
    switch(error.code) 
	{	
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
function save_user_current_location(lat,long)
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
	xmlhttp.open("GET","../map/save_current_location.php?lat="+lat+"&long="+long,true);
	xmlhttp.send();
}
