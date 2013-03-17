<?php
	require_once("sql_connect.php");
	session_start();
	
	$service_name=$_POST['service_name'];
	$rate=$_POST['rate'];
	//$type=$_POST['type'];
	//$image=$_POST['image'];
	$classification=$_POST['classification'];
	$article=$_POST['article'];
	
	
	
	if(mysql_query("update service set service_name='{$service_name}',article='{$article}',
					rate={$rate},classification='{$classification}' where service_id={$_GET['service_id']};")){
		echo "Success";
	}else{
			die('Could not add service: ' . mysql_error());
	}
	require_once("sql_disconnect.php");
?>
