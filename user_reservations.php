<?php 
  require_once "process_check_if_logged_in.php";
  require_once "sql_connect.php";
	require_once"header.php";
	//require_once "do_check_login.php";
?>

<?php
	$account_info=mysql_fetch_array(mysql_query("select * from member where member_id={$_SESSION['member_id']};"));
	//echo "<pre>".var_dump($account_info)."</pre>";
	$reservations=mysql_query("select * from reservation where member_id={$_SESSION['member_id']}");
	

	while($reservation_info=mysql_fetch_array($reservations)){
		$reservation[]=$reservation_info;
	}
	$i=0;
	$col=1;
	echo "<div class=log3>";

	echo "<table class = tabla>";	
	echo "<tr><td colspan=6><center><h1>RESERVATION HISTORY</h1></center></td></tr>";
	echo "<tr>";
			echo "<th>SERVICE NAME</th>";
			echo "<th>ID</th>";
			echo "<th>START DATE</th>";
			echo "<th>END DATE</th>";
			echo "<th>PRICE</th>";
			echo "<th>STATUS</th>";
			echo "</tr>";
		while($i<count($reservation)){
			if($col==4){
				echo "<tr>";	
				$col=1;
			}
			$j=0;
			$query="SELECT service_name from service where service_id={$reservation[$i]['service_id']};";
			$service_name= mysql_fetch_array(mysql_query($query));			///get service_name
			$start=explode(" ",$reservation[$i]['start_date']);
			$end=explode(" ",$reservation[$i]['end_date']);
			
				//echo "<tr><td>{$reservation[$i]['service_id']}</td></tr>";
				
				echo "<tr class = textBluer><td>",$service_name[0], "</td>";
				echo "<td>{$reservation[$i]['reservation_id']}</td>";
				echo "<td>{$start[0]}</td>";
				echo "<td>{$end[0]}</td>";
				echo "<td>{$reservation[$i]['price']}</td>";
				if ($reservation[$i]['status']==0){
					echo "<td>CHECKED-IN</td>";
				}else if($reservation[$i]['status']==1){
					echo "<td>CHECKED-OUT</td>";
				}else if ($reservation[$i]['status']==-1 && $reservation[$i]['is_Paid']==0){
					echo "<td>UNPAID</td>";
				}else if($reservation[$i]['status']==-1){
					echo "<td>PAID</td>";
				}
				
			echo "</tr>";
			if($col==4){
				echo "</tr>";	
				$col=1;
			}
			$i++;$col++;
		}
	echo "</table></div>";

?>


<?php require_once"sql_disconnect.php";?>
<?php require_once"footer.php";?>