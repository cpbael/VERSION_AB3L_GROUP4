<?php
  session_start();
	require_once"sql_connect.php";

		$service_id=$_GET['service_id'];
		$start_date=$_GET['start_date']." 11:00:00";
		$end_date=$_GET['end_date']." 11:00:00";
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
		
		$service=mysql_fetch_array(mysql_query("SELECT * FROM SERVICE WHERE service_id='{$service_id}';"));
		
		if ($res=mysql_fetch_array(mysql_query("SELECT * FROM reservation WHERE service_id=$service_id AND '$start_date' < end_date AND '$end_date' > start_date;"))){
			$_SESSION['ERROR']=true;
			$_SESSION['popUp']="SERVICE already reserved from {$res['start_date']} to {$res['end_date']}";
			echo $_SESSION['popUp'];
		}else{
			$rate=mysql_fetch_array((mysql_query("SELECT rate from type where type_id='{$service['type_id']}';")));
			echo "<br/> rate:".$rate[0];
			//$price= (($diff->m * 30 )+($diff->d * 24))* $rate[0];
			$price= $diff_hour * $rate[0];
			echo "<br/> Price:".$price;
			$query_insert_reservation="INSERT INTO reservation(service_id,start_date,end_date,is_Member,member_id,price,status) VALUES($service_id,'{$start_date}','{$end_date}',1,{$_SESSION['member_id']},{$price},-1);";
			if(mysql_query($query_insert_reservation)){
				$_SESSION['ERROR']=false;
				$_SESSION['popUp']="{$service['service_name']} succesfully reserved from<br/><strong>$start_date to $end_date</strong><br/>Price: $price";
				echo $_SESSION['popUp'];
			}else{
				die('Could not add reservation: ' . mysql_error());
			}
		}
		$_SESSION['toPopUp']=true;

	require_once("sql_disconnect.php");

	header("LOCATION:add_reservation.php?type_id={$service['type_id']}"); 
?>