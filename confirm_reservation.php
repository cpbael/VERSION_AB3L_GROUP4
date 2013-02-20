<html>
  <head>
  	<link rel="stylesheet" type="text/css" href="Style.css"/>
		 <script type = "text/javascript" src = "javascript.js"></script>
	<?php 
		require_once("sql_connect.php");
		session_start();
		$member_id=$_SESSION['member_id'];

	?>
	</head>

	<body>

	<div class="log3">
	
	
		<table class = "loginBottom"> 
		<form method="POST" action="process_confirm_reservation.php">
		<tr>
			<th>SERVICE NAME</th>
			<th>START DATE</th>
			<th>END DATE</th>
			<th>PRICE</th>
		</tr>
		<?php
		
		$query="SELECT * from reservation where member_id={$member_id};";
		$result=mysql_query($query);
		$total=0;
		
		while($row = mysql_fetch_array($result)){
			$query="SELECT service_name from service where service_id={$row['service_id']};";
			$service_name= mysql_fetch_array(mysql_query($query));			///get service_name
			echo "<tr>";
			echo "<td>",$service_name[0], "</td>";
			echo "<td>",$row['start_date'],"</td>";
			echo "<td>",$row['end_date'],"</td>";
			echo "<td>",$row['price'],"</td>";					
			echo "</tr>";

			$total+=$row['price'];	
		}
			echo "<input type=\"hidden\" value={$total} name=\"total_reservation\"/>";		
		?>
		<tr>
			<td colspan="2"></td>
			<td>TOTAL</td>
			<td><?php echo $total;?></td>
		</tr>
		<tr>
			<td colspan = "4" class = "loginBottom3">
			<span class = "textBlack">By clicking, </span><span class = "textBluer">CONFIRM</span> <span class = "textBlack">you agree to pay for the total reservation fee displayed above.
			It will then be automatically charged to the credit account that you provided when you signed-up.</span></td>
		</tr>
		<tr>
			<td colspan = "4" class = "loginBottom1">
			<input id="mysubmit" type="submit" value="CONFIRM" name = "confirmButton" />
		</td>
		</tr>
		
		<tr>
			<td colspan = "4" class = "loginBottom3">
				<span class = "errorMsg"><br />
				<?php
					if(isset($_SESSION['CONFIRMED']))
						if($_SESSION['CONFIRMED']==true){
							echo "SUCCESFULLY CONFIRMED RESERVATION/S! <br /> TOTAL: {$_SESSION['TOTAL']}";
						}
							
					session_destroy();
				?>
				</span>
			</td>
		</tr>
		</table>
		</form>

</div>
</body>
	
</html>
