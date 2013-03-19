<?php
	require_once "sql_connect.php";
	
	if(mysql_query("delete from reservation where reservation_id='{$_GET['id']}';")){
		session_start();
		$_SESSION['DELETED']=true;
		header("Location:confirm_reservation.php");
	}else{
		die('Could not delete service: ' . mysql_error());
	}
	
	require_once "sql_disconnect.php";


?>