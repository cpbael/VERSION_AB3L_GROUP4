<?php require_once"header.php";?>
<div class="log3">
<table class = "loginBottom"> 
	<form name = "add" method = "POST" action = "process_login.php">	
		<tr>
			<td colspan = "2"><hr><td>
		</tr>
	
	</br>
	<?php
		session_start();
		if(!(isset($_SESSION['login_msg']))){
			$_SESSION['login_msg']="Fill up to login";
		}
		echo'<tr>
			<tr>
				<td colspan = "2" class = "loginBottom3"><span class = "textBluer">';
		echo $_SESSION['login_msg'];
				
		echo'</span></td>
			</tr>
		</tr>';
		unset($_SESSION['login_msg']);
		session_destroy();
	?>
	<center><img src="images/HotelLogo.jpg" alt="some_text" width="330" height="228"></center>
	
	<tr>
	<td class = "loginBottom1">Username: </td>
	<td><input class = "form" type="text" name="middleinitial" value="" size="35" required/>
	</td>
	
	<tr>
		<td class = "loginBottom1">Password: </td>
		<td><input class = "form"type="password" name="pwdconfirm" value="" size="35" required/>
	</td>
	
	<tr>

		<tr>
			<td><span class = "allTextBlue"><a class = "button2" href="sign_up.php">Sign-up</a></span></td>
			<td><span class = "allTextBlue"><a class = "button2"  href="#">Forgot Password?</a></span></td>
		</tr>
		
	<tr>
	
	<td colspan = "2" class = "loginBottom1">
		<input class="login" type="submit" value="Log In" name = "login" />
	</td>
	</tr>
	
		<tr>
			<td colspan = "2"><hr><td>
		</tr>
</table> 	
	
	
	</form>
	</div>
<?php require_once"footer.php";?>