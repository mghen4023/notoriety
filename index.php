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

		<div class="spacer"></div>
	
		<div class="line-separator"></div>
		<div class="separator-space"></div>
		<div class="line-separator"></div>
		
		<div id="menu">
			<ul>
				<li class="menu-item">
					<a href="#">Home</a>
				</li>
				<li class="menu-seperator">
					&ordm;
				</li>
				<li class="menu-item">
					<a href="#">How to Play</a>
				</li>
				<li class="menu-seperator">
					&ordm;
				</li>
				<li class="menu-item">
					<a href="#">Leaderboard</a>
				</li>
				<li class="menu-seperator">
					&ordm;
				</li>
				<li class="menu-item">
					<a href="#">Projects</a>
				</li>
				<li class="menu-seperator">
					&ordm;
				</li>
				<li class="menu-item">
					<a href="#">About TCX</a>
				</li>
			</ul>
		</div>
		
		
		<div class="line-separator"></div>
		<div class="separator-space"></div>
		<div class="line-separator"></div>
		
		<div class="spacer"></div>

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
			
			<p> 
				footer 
			</p>
			
			<p>
				<?php 
				  echo "php debug info";
				?>
			</p>
		</div>

	</body> 
</html>