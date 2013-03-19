<?php 
	require_once "process_check_if_logged_in.php";
	require_once "sql_connect.php";
	require_once"header.php";
?>

<?php
	$reservations=mysql_query("select * from reservation where status=-1 ORDER BY ABS(DATEDIFF(start_date, NOW())) ASC");
	while($reservation_info=mysql_fetch_array($reservations)){
		$reservation[]=$reservation_info;
	}
?>

	<div class="log4"><table class = "loginBottom2 tabla">
	<tr>
		<td colspan = "9"><h1><center>RESERVATIONS</center></h1></td>
	</tr>
	<tr><center>
		<th>NAME</th>
		<th>CONTACT NO</th>
		<th>RESERVATION ID</th>
		<th>SERVICE NAME</th>
		<th>START DATE</th>
		<th>END DATE</th>
		<th>PRICE</th>
		<th></th>
		<th>STATUS</th>
		</center>
	</tr>
<?php
		for($i=0;$i<count($reservation);$i++){
			$query="SELECT service_name from service where service_id={$reservation[$i]['service_id']};";
			$service_name= mysql_fetch_array(mysql_query($query));			///get service_name
			if($reservation[$i]['is_Member']==1){
				$res=mysql_fetch_array(mysql_query("SELECT fullname, contactno from member where member_id='{$reservation[$i]['member_id']}';"));
				$reserver=$res[0];
			}else{
				$res=mysql_fetch_array(mysql_query("SELECT fullname, contactno from guest where guest_id='{$reservation[$i]['member_id']}';"));
				$reserver=$res[0];
			}
			if($reservation[$i]['status']!='1'){
			echo "<tr>";	
			//echo "<tr><td>{$reservation[$i]['service_id']}</td></tr>";
			echo "<td class = allTextBlack>{$reserver}</td>";
			echo "<td class = allTextBlack>{$res[1]}</td>";
			echo "<td class = allTextBlack>",$reservation[$i]['reservation_id'], "</td>";
			echo "<td class = allTextBlack>",$service_name[0], "</td>";
			echo "<td class = allTextBlack>{$reservation[$i]['start_date']}</td>";
			echo "<td class = allTextBlack>{$reservation[$i]['end_date']}</td>";
			echo "<td class = allTextBlack>{$reservation[$i]['price']}</td>";
			//echo "<td class = allTextBlack><a href='edit_reservation.php?reservation_id={$reservation[$i]['reservation_id']}'>Edit</a></td>";
			
			
			
			if($reservation[$i]['status']==-1){
				echo "<td><input id = mysubmit5 type=button onclick=window.location.href='edit_reservation.php?reservation_id={$reservation[$i]['reservation_id']}' value=Edit></center></td>";
			}
			if($reservation[$i]['status']==-1){
				echo "<td><input  id = mysubmit5 type=button onclick=window.location.href='process_check_in.php?reservation_id={$reservation[$i]['reservation_id']}' value= 'Check In'></td>";
			}
			if($reservation[$i]['status']==0){
				echo "<td><input  id = mysubmit5 type=button onclick=window.location.href='process_check_out.php?reservation_id={$reservation[$i]['reservation_id']}' value= 'Check Out'></td>";
			}
			echo "</tr>";
			
			}			
		}//end-while
?>
	</table>
	<br/>
	
	<!--table class = "loginBottom2 tabla">
	<tr>
		<td colspan = "8"><h1><center>CHECKED-IN GUESTS</center></h1></td>
	</tr>
	<tr><center>
		<th>NAME</th>
		<th>RESERVATION ID</th>
		<th>SERVICE NAME</th>
		<th>START DATE</th>
		<th>END DATE</th>
		<th>PRICE</th>
		<th></th>
		<th>STATUS</th>
		</center>
	</tr>
<?php/*
		for($i=0;$i<count($reservation);$i++){
			$query="SELECT service_name from service where service_id={$reservation[$i]['service_id']};";
			$service_name= mysql_fetch_array(mysql_query($query));			///get service_name
			if($reservation[$i]['is_Member']==1){
				$res=mysql_fetch_array(mysql_query("SELECT fullname from member where member_id='{$reservation[$i]['member_id']}';"));
				$reserver=$res[0];
			}else{
				$res=mysql_fetch_array(mysql_query("SELECT fullname from guest where guest_id='{$reservation[$i]['member_id']}';"));
				$reserver=$res[0];
			}
			if($reservation[$i]['status']=='0'){
			echo "<tr>";	
			//echo "<tr><td>{$reservation[$i]['service_id']}</td></tr>";
			echo "<td class = allTextBlack>{$reserver}</td>";
			echo "<td class = allTextBlack>",$reservation[$i]['reservation_id'], "</td>";
			echo "<td class = allTextBlack>",$service_name[0], "</td>";
			echo "<td class = allTextBlack>{$reservation[$i]['start_date']}</td>";
			echo "<td class = allTextBlack>{$reservation[$i]['end_date']}</td>";
			echo "<td class = allTextBlack>{$reservation[$i]['price']}</td>";
			//echo "<td class = allTextBlack><a href='edit_reservation.php?reservation_id={$reservation[$i]['reservation_id']}'>Edit</a></td>";
			echo "<td><input id = mysubmit5 type=button onclick=window.location.href='edit_reservation.php?reservation_id={$reservation[$i]['reservation_id']}' value=Edit></center></td>";
			echo "<td><input  id = mysubmit5 type=button onclick=window.location.href='process_check_out.php?reservation_id={$reservation[$i]['reservation_id']}' value= 'Check Out'></td>";
			echo "</tr>";	*/
			}
		}//end-while
?>
	</table-->
</div>

<?php require_once"sql_disconnect.php";?>
<?php require_once"footer.php";?>