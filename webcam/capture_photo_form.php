<div id="capture_photo_div" style="position:fixed;top:0px;left:0px;width:100%;height:100%;overflow-y:auto;background-color:#CCCCCC;">
<link href="../webcam/style.css" rel="stylesheet" type="text/css"/>

<center>
	<div id="preview">

    <div id="preview_button" onClick="show_preview()">Show Preview</div>
    <video autoplay></video>
    <canvas width="1280" height="720" id="canvas"></canvas>
    
        <div style="width:100%;height:50px;">
        
        <button onClick="resize(320,180)">Small</button>
        <button onClick="resize(640,360)">Medium</button>
        <button onClick="resize(1280,720)">Large</button>
        
        <input type="range" min="0" max="7" value="0" id="zoom" onChange="zooming()">
        
        <button onClick="captureImage()">Save</button>
        
        </div>
    </div>

    <div id="my_images">
	<div id="heading"><h1>My Album</h1></div>
	<div id="result"></div>
    
    </div>

<script src="../webcam/script.js"></script>
</center>
</div>