<?php 
	require_once("header.php");
	require_once("process_check_if_logged_in.php");
	require_once("sql_connect.php");
	$member_id=$_SESSION['member_id'];

?>
	<div class="log3">
		<table class = "loginBottom tabla"> 
		<form method="POST" >
		<?php

		$query="SELECT * from reservation where member_id={$member_id} and is_Paid='0';";
		$result=mysql_query($query);
		$total=0;
		if($result){
		?>	<tr class = "textBlack">
			<center>
				<th>SERVICE NAME</th>
				<th>START DATE</th>
				<th>END DATE</th>
				<th>PRICE</th>
				<th>STATUS</th>
			</center>
			</tr>
		<?php
		}
		
		if($result){
		while($row = mysql_fetch_array($result)){
			$query="SELECT service_name from service where service_id={$row['service_id']};";
			$service_name= mysql_fetch_array(mysql_query($query));			///get service_name
			$start=explode(" ",$row['start_date']);
			$end=explode(" ",$row['end_date']);
			echo "<tr>";
			echo "<td>",$service_name[0], "</td>";
			echo "<td>",$start[0],"</td>";
			echo "<td>",$end[0],"</td>";
			echo "<td>",$row['price'],"</td>";		
			echo "<td><input id = mysubmit5 type=button onclick=TINY.box.show({url:'PopUpConfirmSingleReservation.php?id={$row['reservation_id']}',width:300,height:200}) value=Confirm></center></td>";			
			echo "<td><input id = mysubmit5 type=button onclick=TINY.box.show({url:'PopUpDeleteReservation.php?id={$row['reservation_id']}',width:300,height:200})  value=Delete></center></td>";			
			echo "</tr>";

			$total+=$row['price'];	
		}
			echo "<input type=\"hidden\" value={$total} name=\"total_reservation\"/>";			
		?>
		
		<tr>
			<td colspan="3"></td>
			<td></td>
			<td><span class "textRed">TOTAL</span></td>
			<td><?php echo $total;?></td>
		</tr>
		<tr>
			<td colspan = "6" class = "loginBottom3">
			<span class = "textBlack">By clicking, </span><span class = "textBluer">CONFIRM</span> <span class = "textBlack">you agree to pay for the total reservation fee displayed above.
			It will then be automatically charged to the credit account that you provided when you signed-up.</span></td>
		</tr>
		<tr>
			<td colspan = "6" class = "loginBottom1">
			<center><input id="mysubmit" type="button" value="CONFIRM ALL" onclick=TINY.box.show({url:'PopUpConfirmAllReservation.php',width:300,height:200}) name = "confirmButton" /></center>
		</td>
		</tr>
		
		<tr>
			<td colspan = "6" class = "loginBottom3">
				<span class = "errorMsg"><br />
				<?php
					if(isset($_SESSION['CONFIRMED']))
							if($_SESSION['CONFIRMED']==true){
								echo "SUCCESFULLY CONFIRMED RESERVATION/S! <br /> TOTAL: {$_SESSION['TOTAL']}";
							}

				
					}else if(isset($_SESSION['DELETED']) && $_SESSION['DELETED']==true){
						echo "SUCCESSFULLY DELETED RESERVATION";
						unset($_SESSION['DELETED']);
					}else{
						echo "<div class = 'signup'>NO RESERVATION!</div> <br /> ";
					}
					
					unset($_SESSION['CONFIRMED']);
				?>
				</span>
			</td>
		</tr>
		</table>
		</form>

</div>
<?php
	require_once("footer.php");
	require_once("sql_disconnect.php");
?>