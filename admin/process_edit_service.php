<?php
	require_once "process_check_if_logged_in.php";
	require_once("sql_connect.php");
	
	$service_name=$_POST['service_name'];
	$type_id=$_POST['type'];
	if(mysql_query("update service set service_name='{$service_name}',type_id={$type_id} where service_id={$_GET['service_id']};")){
		$_SESSION['ERROR']=false;
		$_SESSION['MSG']="SERVICE UPDATED SUCCESSFULLY!";
	}else{
			die('Could not add service: ' . mysql_error());
	}

	require_once("sql_disconnect.php");
	header("LOCATION:edit_service.php?service_id={$_GET['service_id']}");
?>

