// JavaScript Document
// JavaScript Document

var min_height = 58;
var min_width = 300;
var preview_width = 640;
var preview_height = 360;
function resize(w,h)
	{
	preview_width = w;
	preview_height = h;
	document.getElementById('canvas').style.width = w+"px";
	document.getElementById('canvas').style.height = h+"px";
	var div = document.getElementById('preview');
	div.style.height = (preview_height+min_height+50)+"px";
	div.style.width = preview_width+"px";
	}
	
zoomlevel = 0;

function zooming()
	{
	zoomlevel = document.getElementById('zoom').value;
	}

navigator.getUserMedia  = navigator.getUserMedia ||
                          navigator.webkitGetUserMedia ||
                          navigator.mozGetUserMedia ||
                          navigator.msGetUserMedia;

window.URL = window.URL || window.webkitURL || window.mozURL || window.msURL;

 var hdConstraints = {
  audio: false,
  video: {
    mandatory: {
      minWidth: 1280,
      minHeight: 720
    }
  }
};

zoomlevel = 0;
function zooming()
{
zoomlevel = document.getElementById('zoom').value;
}
var errorCallback = function(e) {
    console.log('Rejected!', e);
  };
  
var successCallback = function(stream) {
  video.src = window.URL.createObjectURL(stream);
  video.style.webkitTransform = "rotateY(180deg)";
  localMediaStream = stream;
  setInterval(function (){snapshot();},10);
}

var video = document.querySelector('video');

if (navigator.getUserMedia) {
  navigator.getUserMedia(hdConstraints, successCallback, errorCallback);
} else {
  //video.src = 'somevideo.webm'; // fallback.
}

var canvas = document.querySelector('canvas');
var ctx = canvas.getContext('2d');
var localMediaStream = null;
var interval_left = 0;
function snapshot() 
	{
    if (localMediaStream) 
		{
      	ctx.drawImage(video, 0, 0,1280-(160*zoomlevel),720-(90*zoomlevel),0,0,1280,720);
    	}
	}

setInterval(function (){
					  if (interval_left > 0)
					  	interval_left--;
					  },1000);
  
function captureImage()
	{
	if (interval_left == 0)
		{
		interval_left = 5;
		var canvasData = canvas.toDataURL("image/png");
		var xmlHttpReq = false;       
		if (window.XMLHttpRequest) {
			ajax = new XMLHttpRequest();
		}
	
		else if (window.ActiveXObject) {
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}
	    ajax.open('POST', 'save.php', false);
	    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	    ajax.onreadystatechange = function() {
			//console.log(ajax.responseText);
			document.getElementById("result").innerHTML += ajax.responseText;
		}
	    ajax.send("imgData="+canvasData);
		}
	else
		{
		alert('Please Wait '+interval_left+' Seconds To Take Photo Again');	
		}
	}
var preview = 0;
function show_preview()
	{
	var div = document.getElementById('preview');
	if (preview == 0)
		{
		div.style.height = (preview_height+min_height+50)+"px";
		div.style.width = preview_width+"px";
		preview = 1;
		}
	else
		{
		div.style.height = min_height+"px";
		div.style.width = min_width+"px";
		preview = 0;
		}
	}