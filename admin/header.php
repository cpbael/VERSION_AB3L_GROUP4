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
					<a href="home.php" class="icon-home"><img src = "temp/logo2.png"/ style = "width:280px; height:60px; margin-top:-25px; margin-left:-170px;"></a>
				</li>
				<li class="green">
					<a href="admin.php" class="icon-home">HOME</a>
					<ul>
						<li><a href="admin.php">About Us</a></li>
						<li><a href="../home.php">Back to User Home</a></li>
					</ul>
				</li>
				<li class="red">
					<a href="#" class="icon-cogs">ACCOUNT</a>
					<ul>
						<li><span><a href="process_logout.php">Log Out</a></span></li>
					</ul>
				</li>
				<li class="blue">
					<a href="#" class="icon-twitter">SERVICES</a>
					<ul>
						<li><a href="show_services.php">View Services</a></li>
						<li><a href="add_type.php">Add Type</a></li>
					</ul>
				</li>
				<li class="yellow">
					<a href="#" class="icon-beaker">SEARCH</a>
					<ul>
						<li><span onclick="TINY.box.show({url:'PopUpSearchId.php',width:300,height:100})"><a href="#">Reservation ID</a></span></li>
						<li><span onclick="TINY.box.show({url:'PopUpSearchByAvailability.php',width:300,height:150})"><a href="#">Availability</a></span></li>
						<li>
							<a href = "#">
								<form method="get" action="process_search_keyword.php" id="search">
									<input name="key" type="text" size="50" onchange = "this.value=this.value.toUpperCase()" placeholder="Search Keyword" />
									</center>
								</form>
							</a>
						</li>
					</ul>
				</li>
				<li class="red">
					<a href="#" class="icon-cogs">RESERVATIONS</a>
					<ul>
						<li><span><a href="show_types.php">Make Reservation</a></span></li>
						<li><span><a href="view_current.php">View Checked-in Guests</a></span></li>
						<li><span><a href="view_log.php">View Past Reservations</a></span></li>
						<li><span><a href="view_reserved.php">View Reservations</a></span></li>
						<li><span><a href="view_all_reservations.php">View All Reservations</a></span></li>
					</ul>
				</li>

			</ul>
		</nav>

    </header>
			

</body>


</html>