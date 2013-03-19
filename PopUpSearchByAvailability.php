 <!--
	CMSC128 AB-3L GROUP 4 PROJECT: HOTEL 128 Reservation System
	Claudine Bael
	Theresa Mercado
	Anitsirc Ybur Haniel
	Renee Chiarianne Navarrosa
	Kevin Lawrence Romas
	
	Description: Pop Up for Search by Availability
 -->
<html>		
	<body>	
		<form class="form-2" method="get" action="process_search_availability.php" id="search">
			<center>
				<h1><span class="log-in">SEARCH BY AVAILABILITY</span></h1>
				<table>
				<tr>
				<td><span> START: </span></td>
				<td></td>
				<td><input type="date" name="avail_sdate" value="" min="<?php echo date('Y-m-d')?>" onchange="var d = new Date(this.value);
					d.setDate(d.getDate()+1); edate.min=d.toJSON().substring(0,10)" required placeholder="Search" /><br />
				</td>
				</tr>
				<tr>
					<td><br/></td>
				</tr>
				<tr>
					<td><span>END: </span></td>
					<td></td>
					<td><input type="date" name="avail_edate" value="" min="<?php echo date('Y-m-d')?>" id="edate" required placeholder="Search" /></td>
				</td>
				</table>
				<br/>
				<input type="submit" value="Search" />
		  </center>
		</form>
	</body>
</html>