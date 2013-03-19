<html
		<script type="text/javascript" src="javascript.js"></script>
	<body>
			<form class="form-2" action = "process_delete_reservation.php?id=<?php echo $_GET['id'];?>" name = "add" method="post">
				<h1><span class="log-in">Delete Reservation</span></h1>
					<center>
					<table>
					<?php
						require_once "sql_connect.php";
						$reservation=mysql_fetch_array(mysql_query("SELECT * FROM reservation WHERE reservation_id='{$_GET['id']}';"));
						$service=mysql_fetch_array(mysql_query("SELECT * FROM service WHERE service_id='{$reservation['service_id']}';"));
						$type=mysql_fetch_array(mysql_query("SELECT * FROM type WHERE type_id='{$service['type_id']}';"));
						$start=explode(" ",$reservation['start_date']);
						$end=explode(" ",$reservation['end_date']);
						echo "Are you sure you want to delete the reservation";
						echo"<tr>
								<td>{$type['type_name']} : </td><td>";
						echo"{$service['service_name']}</td>";
						echo"</tr>
							<tr>
								<td>Start Date:</td>
								<td>{$start[0]}</td>
							</tr>
							<tr>
								<td>End Date:</td>
								<td>{$end[0]}</td>
							</tr>
							<tr>
								<td>Price:</td>
								<td>{$reservation['price']}</td>
							</tr>
							</tr>";
						require_once "sql_connect.php";
					?>
					</table	>
					<br/>
					<!--input type="text" name="username" required placeholder="Username" onchange="this.value=this.value.toUpperCase();"/-->
					<input type="submit" name="confirm_delete" value="Yes">
					</center>
			</form>​​

	</body>
</html>