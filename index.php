<html> 
<head> 
<!-- 
 edited by max at 1:00 AM on 9/17
-->

<script type="text/javascript"> 
function sendResize()
{
  var newWidth = document.getElementById('widthInput').value;
  var newHeight = document.getElementById('heightInput').value;
  document.getElementById('zoop').width = newWidth;
  document.getElementById('zoop').height = newHeight;
}
</script> 
<link rel="stylesheet" type="text/css" href="sandbox.css" />
</head> 
<body> 

<div id='headerFrame'>
<p> header </p>
</div>

<div id='mainFrame'>
<p>
<applet 
    archive = 'zoop.jar' 
    code = 'zoop.Zoop.class' 
    width = 600 
    height = 400 
    id = 'zoop'>  
</applet>
</p> 

<p>
    width: <input id='widthInput' value='600'>  
    height: <input id='heightInput' value='400'>  
    <button onClick='sendResize()'> resize </button> 
</p>
</div>

<div id='footerFrame'>
<p> footer </p>
<p>
<?php 
  echo "php debug info";
?>
</p>
</div>

</body> 
</html>