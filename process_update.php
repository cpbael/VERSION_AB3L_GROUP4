<?php
	require_once("sql_connect.php");
	session_start();
	
	$name=$_POST['firstname'];
	$eadd=$_POST['eadd'];
	$uname=$_POST['username'];
	$contact=$_POST['contact'];
	
	if(mysql_query("update member set uname='{$uname}',
					eadd='{$eadd}',contactno='{$contact}',fullname='{$name}' where member_id={$_SESSION['member_id']};")){
		echo "Success";
	}else{
		echo "Update unsuccessful";
	}
	
	require_once("sql_disconnect.php");
?>
