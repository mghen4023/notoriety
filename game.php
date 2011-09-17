<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html> 
	<head> 
		<script src="http://platform.twitter.com/anywhere.js?id=ward0Wz6G6I7UlbSSeZiQ&v=1" type="text/javascript">
		
		<title>The Twitter Currency Exchange</title>
	
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

	</body> 
</html>