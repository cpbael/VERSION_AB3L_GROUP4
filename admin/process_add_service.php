<?php
  session_start();
	require_once"sql_connect.php";

		$service_name=$_POST['service_name'];
		$type_id=$_GET['type_id'];
		$query = "INSERT INTO service(service_name,type_id) VALUES ('$service_name', '$type_id');";
		if (!mysql_query($query)) {
			$_SESSION['ERROR']=true;
			die('Could not add service: ' . mysql_error());
		}else{
			$_SESSION['ERROR']=false;
			$_SESSION['MSG']="SERVICE ADDED SUCCESSFULLY!";
			echo $_SESSION['MSG'];
		}


	require_once"sql_disconnect.php";
	header("LOCATION:show_type.php?type_id={$type_id}"); 
?>