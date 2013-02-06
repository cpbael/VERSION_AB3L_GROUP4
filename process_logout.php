<?php
	/*This is the php file that will destroy sessions to logout*/
	session_start();
	session_destroy();
	header("Location:login.php");
?>
