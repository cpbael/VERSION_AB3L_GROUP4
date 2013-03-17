<?php
	require_once"process_check_if_logged_in.php";
	require_once("sql_connect.php");
	$type_info=mysql_fetch_array(mysql_query("select * from type where type_id={$_GET['type_id']};"));	

	if(empty($_POST['type_name'])){
		$type_name=$type_info['type_name'];
	}else{
		$type_name=$_POST['type_name'];
	}
	
	if(empty($_POST['rate'])){
		$rate=$type_info['rate'];
	}else{
		$rate=$_POST['rate'];
	}
	
	$classification=$_POST['classification'];
	$article=$_POST['article'];
		
	if(empty($_FILES['item_img']['tmp_name'])){
		$image=$type_info['image'];		
	}else{
		echo "papaltan";
		$imgtype=$_FILES['item_img']['type'];
		$imgtype=str_replace("image/",".",$imgtype);
		$image=htmlspecialchars($type_name.$imgtype);
		echo $image;
		unlink("../images/{$_GET['image']}");		
		move_uploaded_file($_FILES['item_img']['tmp_name'],"../images/{$image}");
	}	
	
	if(mysql_query("update type set type_name='{$type_name}',classification='{$classification}',image='{$image}',article='{$article}',
					rate={$rate} where type_id={$type_info['type_id']};")){
		$_SESSION['ERROR']=false;
		$_SESSION['MSG']="SERVICE UPDATED SUCCESSFULLY!";
	}else{
			die('Could not add service: ' . mysql_error());
	}	
	require_once("sql_disconnect.php");
	header("LOCATION:edit_type.php?type_id={$type_info['type_id']}");
?>
