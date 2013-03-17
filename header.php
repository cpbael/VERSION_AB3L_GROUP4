<html>
	<head>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/PopUpStyle.css" />
        <link rel="stylesheet" href="css/Style.css" />
		<script src="javascripts/tinybox.js"></script>
    </head>
<body>
	<header>
    	<nav id="colorNav">
			<ul>
				<li class="green">
					<a href="home.php" class="icon-home"><img src = "temp/logo2.png"/ style = "width:170px; height:60px; margin-top:-25px; margin-left:-70px;"></a>
				</li>
				<li class="green">
					<a href="home.php" class="icon-home">HOME</a>
					<ul>
						<li><a href="home.php">About Us</a></li>
						
					</ul>
				</li>
				<li class="red">
					<a href="#" class="icon-cogs">ACCOUNT</a>
					<ul>
						<li><span><a href="process_logout.php">Log Out</a></span></li>
						<li><span onclick="TINY.box.show({url:'PopUpEdit.php',width:300,height:320})"><a href="#">Edit Account</a></span></li>
						<li><span><a href="user_reservations.php">View Reservation History</a></span></li>
						<!--<li><span><a href="add_reservation.php">Add Reservation</a></span></li>-->
						<li><span><a href="confirm_reservation.php">Confirm Reservation</a></span></li>
					</ul>
				</li>
				<li class="blue">
					<a href="#" class="icon-twitter">SERVICES</a>
					<ul>
						<li><a href="show_services.php">View Services</a></li>
						<li><a href="show_facilities.php">View Facilities</a></li>
						<li><a href="show_other_services.php">Other Services</a></li>
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
			

</body>


</html>