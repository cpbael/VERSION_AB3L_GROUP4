<?php
  session_start();
	require_once"sql_connect.php";

		$service_name=$_POST['service_name'];
		$rate=$_POST['rate'];
		$article=$_POST['article'];
		//$type=$_POST['type'];
		if(!empty($_POST['new_type']) && !empty($_FILES['item_img'])){
		//if(!isset($_POST['type'])){
			$classification=$_POST['classification'];
			$type=$_POST['new_type'];
			$imgtype=$_FILES['item_img']['type'];
			$imgtype=str_replace("image/",".",$imgtype);
			$image=htmlspecialchars($type.$imgtype);
			echo $type.$image.$classification;
			echo "huy";
			if(!mysql_query("INSERT INTO type(type_name,image,classification,rate,article) VALUES ('$type','$image','$classification','$rate','$article');")){
				die('Could not add service: ' . mysql_error());
			}
			
			$type_id_array=mysql_fetch_array(mysql_query("SELECT * FROM type WHERE type_name='{$type}' and image='{$image}' and classification='{$classification}';"));
			$type_id=$type_id_array[0];
			echo "type_id:".$type_id;
			move_uploaded_file($_FILES['item_img']['tmp_name'],"../images/{$image}");	
		}else{
			$type_id=$_POST['type'];
		}

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
	header("LOCATION:add_service.php"); 
?>