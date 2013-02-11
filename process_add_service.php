<?php
  session_start();

	
		$link = mysql_connect('localhost', 'root', '');
		if (!$link) {
			die('Could not connect to mysql: ' . mysql_error());
		}else{
			$db = mysql_select_db("hrm", $link); 
		
			if (!$db) {
				die('Could not connect to database: ' . mysql_error());
			}
		}
		
		$service_name=$_POST['service_name'];
		$rate=$_POST['rate'];
		$type=$_POST['type'];
		$classification=$_POST['classification'];
		$article=$_POST['article'];
		
		$query = "INSERT INTO service VALUES (NULL, '$service_name', '$rate', '$classification', '$article')";
			
		$result = mysql_query($query);

		if (!$result) {
			$_SESSION['ERROR']=true;
			die('Could not add service: ' . mysql_error());
		}else{
			$_SESSION['ERROR']=false;
			$_SESSION['MSG']="SERVICE ADDED SUCCESSFULLY!";
			echo $_SESSION['MSG'];
		}
		
		mysql_close($link);
		
		header("LOCATION:add_service.php"); 
?>
