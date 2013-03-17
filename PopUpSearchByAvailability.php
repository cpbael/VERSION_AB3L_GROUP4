<html>		
	<body>	
		<form class="form-2" method="get" action="process_search_availability.php" id="search">
			<center>
				<h1><span class="log-in">SEARCH BY AVAILABILITY</span></h1>
				<span> START:</span><input type="date" name="avail_sdate" value="" min="<?php echo date('Y-m-d')?>" required required placeholder="Search"><br />
				<span>END:</span><input type="date" name="avail_edate" value="" min="<?php echo date('Y-m-d')?>" required required placeholder="Search">
				<input type="submit" value="Search" />
		  </center>
		</form>
	</body>
</html>