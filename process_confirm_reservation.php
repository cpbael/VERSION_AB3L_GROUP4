<?php
  require_once("sql_connect.php");
	session_start();
	
	$member_id=$_SESSION['member_id'];
	
	$query="UPDATE reservation SET is_Paid=1 where member_id={$member_id};";				
	$result=mysql_query($query);
	
	$_SESSION['CONFIRMED']=true;
	$_SESSION['TOTAL']=$_POST['total_reservation'];
	header("LOCATION:confirm_reservation.php");
	
?>
