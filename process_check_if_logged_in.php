<?php
	session_start();
	if(!(isset($_SESSION['member_id']))){
		$_SESSION['login_msg']="Please log in to continue";
		header("Location:login.php");
	}
?>