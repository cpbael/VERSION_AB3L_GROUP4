<?php
  session_start();
	require_once"sql_connect.php";

		$service_name=$_POST['service_name'];
		$rate=$_POST['rate'];
		$type=$_POST['type'];
		$classification=$_POST['classification'];
		$article=$_POST['article'];
		
		//$img_type=$_FILES['image']['type'];
		// $img_type=str_replace("image/",".",$img_type);
		
		//$image=$_FILES['image']['name'].$img_type;
		$image=$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],"images/{$image}");

		$query = "INSERT INTO service(service_name,rate,classification,article,image) VALUES ('$service_name', '$rate', '$classification', '$article','$image')";

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