
<!DOCTYPE html>
<html>
        <title>HOTEL 128</title>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <link rel="stylesheet" href="css/styles.css" />
		
        <link rel="stylesheet" href="css/PopUpStyle.css" />
		<script src="javascripts/tinybox.js"></script>
		<script src="jquery-1.8.2.min.js"></script>
		<style type="text/css" media="screen">
		#slider1 {
			width:100%;
			height: 666px;
			position: relative; 
			overflow: hidden;
			margin-top:-150px;
			display:block;
		}

		#slider1Content {
			width: 100%; 
			position: absolute;
			top: 0;
			margin-left: 0;
		}
		.slider1Image {
			float: left;
			position: relative;
			display: none;
		}
		.slider1Image span {
			position: absolute;
			font: 10px/15px Arial, Helvetica, sans-serif;
			padding: 10px 13px;
			width: 694px;
			background-color: #000;
			filter: alpha(opacity=70);
			-moz-opacity: 0.7;
			-khtml-opacity: 0.7;
			opacity: 0.7;
			color: #fff;
			display: none;
		}
		.clear {
			clear: both;
		}
		.slider1Image span strong {
			font-size: 14px;
		}
		.left {
			top: 0;
			left: 0;
			width: 0% !important;
			height: 0%;
		}
		.right {
			bottom: 0;
			width: 0% !important;
			height: 0%;
			display:block;
		}
		ul { list-style-type: none;}
		</style>
		<script type="text/javascript" src="javascripts/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="javascripts/s3Slider.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#slider1').s3Slider({
					timeOut: 4000 
				});
			});
		</script>
		<!--script type='text/javascript'>TINY.box.show({url:'PopUpLogin.php',width:300,height:200});</script-->
	 </head>
    
    <body>
	<header>
		
    	<nav id="colorNav">
			<ul>
				<li class="green">
					<a href="home.php" class="icon-home"><img src = "temp/logo2.png"/ style = "width:170px; height:60px; margin-top:-25px; margin-left:-70px;"></a>
				</li>
				<li class="green">
					<a href="#" class="icon-home">HOME</a>
					<ul>
						<li><a href="home.php">About Us</a></li>
					</ul>
				</li>
				<li class="red">
					<a href="#" class="icon-cogs">LOGIN</a>
					<ul>
						<li><span onclick="TINY.box.show({url:'PopUpLogin.php',width:300,height:200})"><a href="#">Log In</a></span></li>
						<li><span onclick="TINY.box.show({url:'PopUpSignUp.php',width:320,height:500})"><a href="#">Sign Up</a></span></li>
					</ul>
				</li>
				<li class="blue">
					<a href="#" class="icon-twitter">SERVICES</a>
					<ul>
						<li><a href="show_services.php">View Services</a></li>
						<li><a href="#">View Facilities</a></li>
					</ul>
				</li>
				<li class="yellow">
					<a href="#" class="icon-beaker">SEARCH</a>
					<ul>
						<li><span onclick="TINY.box.show({url:'PopUpSearch.php',width:300,height:150})"><a href="#">Rate</a></span></li>
						<li><span onclick="TINY.box.show({url:'PopUpSearchByAvailability.php',width:300,height:150})"><a href="#">Availability</a></span></li>
					</ul>
				</li>
				<li class="yellow">
					<a href="#" class="icon-beaker">
						<form method="get" action="process_search_keyword.php" id="search">
							<input name="key" type="text" size="50" onchange = "this.value=this.value.toUpperCase()" placeholder="Search Keyword" />
							</center>
						</form>
					</a>
				</li>
			</ul>
		</nav>
    </header>
	
		<?php
			session_start();
			if(isset($_SESSION['login']) && $_SESSION['login']==-1){
				echo "<script> TINY.box.show({url:'PopUpLogin.php',width:300,height:200}) </script>";
			}
			else if(isset($_SESSION['ER']) && $_SESSION['ER']==1){
				echo "<script> TINY.box.show({url:'PopUpSignUp.php',width:320,height:500}) </script>";
			}

			
		?>
		<div id="slider1">
			<ul id="slider1Content">
				<li class="slider1Image">
					<a href=""><img src="temp/wide/1.jpg" alt="1" /></a>
					<span class="left"><strong></strong><br /></span></li>
				<li class="slider1Image">
					<a href=""><img src="temp/wide/2.jpg" alt="2" /></a>
					<span class="right"><strong></strong><br /></span></li>
				<li class="slider1Image">
					<img src="temp/wide/3.jpg" alt="3" />
					<span class="right"><strong></strong><br /></span></li>
				<li class="slider1Image">
					<img src="temp/wide/4.jpg" alt="4" />
					<span class="left"><strong></strong><br /></span></li>
				<li class="slider1Image">
					<img src="temp/wide/5.jpg" alt="5" />
					<span class="right"><strong></strong><br /></span></li>
				<div class="clear slider1Image"></div>
			</ul>
		</div>
    </body>

</html>
