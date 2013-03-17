<?php
  session_start();
	require_once"sql_connect.php";

		$reservation_id=$_GET['reservation_id'];
		$start_date=$_POST['start_date']." 11:00:00";
		$end_date=$_POST['end_date']." 11:00:00";
		$start=new DateTime($start_date);
		$end=new DateTime($end_date);
		
		if($start>$end){
			$temp=$start_date;
			$start_date=$end_date;
			$end_date=$temp;
		}
		
		$start_time=strtotime($start_date);
		$end_time=strtotime($end_date);
		$diff_hour=floor(($end_time-$start_time)/(60*60*24));
		
		
		
		// echo "Service id".$service_id."<br/>";
		// echo $start_date;
		// echo "<br/>".$end_date."<br/>";
		// $diff= $start->diff($end);
		// printf('%d days, %d hours, %d minutes', $diff->d, $diff->h, $diff->i);
		
		
		if ($res=mysql_fetch_array(mysql_query("SELECT * FROM reservation WHERE service_id=(SELECT service_id from reservation where reservation_id='$reservation_id') AND '$start_date' < end_date AND '$end_date' > start_date AND '$start_date' != start_date AND '$end_date' != end_date;"))){
			$_SESSION['ERROR']=true;
			$_SESSION['MSG']="SERVICE already reserved from {$res['start_date']} to {$res['end_date']}";
			echo $_SESSION['MSG'];
		}else{
			$query_insert_reservation="UPDATE reservation SET start_date = '$start_date', end_date = '$end_date' where reservation_id = $reservation_id";
			if(mysql_query($query_insert_reservation)){
				$_SESSION['ERROR']=false;
				$_SESSION['MSG']="Service succesfully updated:<br/>New Reservation date is from<br/><strong>$start_date to $end_date</strong><br/>Price: $price";
			}else{
				die('Could not add reservation: ' . mysql_error());
			}
		}

	require_once("sql_disconnect.php");

	header("LOCATION:edit_reservation.php?reservation_id=$reservation_id"); 
	//header("LOCATION:admin.php"); 
?>