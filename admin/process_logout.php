<?php
	/*This is the php file that will destroy sessions to logout*/
	session_start();
	unset($_SESSION['member_id']);
	header("Location:login.php");
?>
