<?php
	require_once "";
	require_once"sql_connect.php";
		$rate=$_POST['rate'];
		$article=$_POST['article'];
		//$type=$_POST['type'];
		
			$classification=$_POST['classification'];
			$type=$_POST['type_name'];
			$imgtype=$_FILES['item_img']['type'];
			$imgtype=str_replace("image/",".",$imgtype);
			$image=htmlspecialchars($type.$imgtype);
			echo $type.$image.$classification;
			echo "huy";
			if(!mysql_query("INSERT INTO type(type_name,image,classification,rate,article) VALUES ('$type','$image','$classification','$rate','$article');")){
				$_SESSION['ERROR']=true;
				$_SESSION['MSG']=mysql_error();
				die('Could not add service: ' . mysql_error());
			}else{
				$_SESSION['ERROR']=false;
				$_SESSION['MSG']="SERVICE ADDED SUCCESSFULLY!";
				echo $_SESSION['MSG'];
			}
			move_uploaded_file($_FILES['item_img']['tmp_name'],"../images/{$image}");	
	require_once"sql_disconnect.php";
	header("LOCATION:add_type.php"); 
?>