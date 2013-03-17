<?php
	require_once("sql_connect.php");
	require_once("process_check_if_logged_in.php");

	if(mysql_query("delete from service where service_id={$_GET['service_id']};")){
		header("Location:show_services.php");
	}else{
		die('Could not delete service: ' . mysql_error());
	}
	require_once("sql_disconnect.php");
?>
