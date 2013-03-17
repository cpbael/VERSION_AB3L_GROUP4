<?php
	require_once("sql_connect.php");
	require_once("process_check_if_logged_in.php");

	$old=$_POST['old_pw'];
	$new=$_POST['new_pw'];
	$confirm=$_POST['confirm_pw'];
	$true_old=mysql_fetch_array(mysql_query("select * from member where member_id='{$_SESSION['member_id']}';"));
	if(md5($old)===$true_old['password']){
		if($new===$confirm){
			if(mysql_query("update member set password=md5('{$confirm}') where member_id={$_SESSION['member_id']};")){
				$_SESSION['ERROR']=false;
				$_SESSION['MSG']="Password succesfully changed";				
			}else{
				$_SESSION['ERROR']=false;
				$_SESSION['MSG']="Password was not changed";	
			}
		}else{
			$_SESSION['ERROR']=true;
			$_SESSION['MSG']="Passwords do not match";	
		}
	}else{
		$_SESSION['ERROR']=true;
		$_SESSION['MSG']="Incorrect password.";	
	}
	require_once("sql_disconnect.php");
	header("Location:change_password.php");
?>
