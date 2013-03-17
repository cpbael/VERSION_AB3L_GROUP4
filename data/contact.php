<?php

/*
 * SimpleModal Contact Form
 * http://simplemodal.com/
 * http://code.google.com/p/simplemodal/
 *
 * Copyright (c) 2012 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Revision: $Id: contact-dist.php 269 2011-12-17 23:24:14Z emartin24 $
 *
 */

// Process
$action = isset($_POST["action"]) ? $_POST["action"] : "";
if (empty($action)) {
	// Send back the contact form HTML
	$output = "<div style='display:none'>
	<div class='contact-top'></div>
	<div class='contact-content' id='Login'>
		<h1 class='contact-title'>Log in:</h1>
		<div class='contact-loading' style='display:none'></div>
		<div class='contact-message' style='display:none'></div>
		<form action='#' style='display:none'>
			<label for='contact-name'>*Username:</label>
			<input type='text' id='contact-name' class='contact-input' name='name' tabindex='1001' />
			<label for='contact-email'>*Password:</label>
			<input type='password' id='contact-email' class='contact-input' name='email' tabindex='1002' />";

	$output .= "
			<label>&nbsp;</label>
			<button type='submit' class='contact-send contact-button' tabindex='1006'>Add</button>
			<button type='submit' class='contact-cancel contact-button simplemodal-close' tabindex='1007'>Cancel</button>
			<br/>
		</form>
	</div>
	<div class='contact-bottom'><a href='http://www.ericmmartin.com/projects/simplemodal/'>Powered by SimpleModal</a></div>
</div>";

	echo $output;
}
else if ($action == "send") {
	add_user();
}

function add_user() {
	require_once("../sql_connect.php");
	session_start();
		$result = mysql_query("SELECT * FROM member");
		while($row = mysql_fetch_array($result)){
			if($_POST['name']==$row['uname'] && md5($_POST['email'])==$row['password']){
				$_SESSION['login']=1;
				$_SESSION['member_id']=$row['member_id'];
				require_once("../sql_disconnect.php");
				echo"<script>
					 $('#contact-container .contact-title').html('Log in succesful!');
					 $.modal.close();
					</script>";
				//header('Location:home.php');
				exit;
			}
		}
		if(!isset($_SESSION['login'])){
			echo"<script>
				$('#contact-container .contact-message').html($('<div class='contact-error'></div>').append('Username or password incorrect'))
			</script>";
		}
}
?>