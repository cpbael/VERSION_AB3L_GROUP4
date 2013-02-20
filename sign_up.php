<?php 
	require_once"header.php";
	session_start();
?>

	<div class="log3">
	<table class = "loginBottom"> 
	<form name = "add" method = "POST" action = "process_sign_up.php">
		
		<tr>
			<div class = "signup">
				Sign Up Form
			</div>
		</tr>
		<br />
		<br />
		<br />
		<br />
		<br />
		<tr>
			<td colspan = "2"><hr><td>
		</tr>

		<tr>
			<td class = "loginBottom1">First Name: </td> 
			<td><input class = "form" type="text" name="firstname" value="<?php if(!empty($_SESSION['firstname'])) echo $_SESSION['firstname']; ?>" size="35"   required="required" onchange = "toUpper(this)" pattern= "[a-zA-Z ]*[a-zA-Z ]*[a-zA-Z ]"/>
			</td>
		</tr>

		<tr>
			<td class = "loginBottom1">Last Name: </td> 
			<td><input class = "form" type="text" name="lastname" value="<?php if(!empty($_SESSION['lastname'])) echo $_SESSION['lastname']; ?>" size="35"   required="required" onchange = "toUpper(this)" pattern= "[a-zA-Z ]*[a-zA-Z ]*[a-zA-Z ]"/>
			</td>
		</tr>

		<tr>
			<td class = "loginBottom1">Email Address: </td> 
			<td><input class = "form" type="email" name="eadd" value="<?php if(!empty($_SESSION['eadd'])) echo $_SESSION['eadd']; ?>" size="35" required="required"/>
			</td>
		</tr>

		<tr>
			<td class = "loginBottom1">Username: </td>
			<td><input class = "form" type="text" name="username" id="username" value="<?php if(!empty($_SESSION['username'])) echo $_SESSION['username']; ?>" size="35" required="required" onchange = "toUpper(this);" pattern= "[a-zA-Z0-9 ]*[a-zA-Z0-9]*[a-zA-Z0-9 ]"/>
			</td>
		</tr>
		
		<tr>
			<td class = "loginBottom1">Password: </td>
			<td><input class = "form"type="password" name="pwd" value="" size="35" required="required"/>
			</td>
		</tr>
		
		<tr>
			<td class = "loginBottom1">Confirm Password: </td>
			<td><input class = "form"type="password" name="pwdconfirm" value="" size="35" required="required"/>
			</td>
		</tr>
	
		<tr>
			<td class = "loginBottom1">Contact Number:</td>
			<td><input class = "form"type="text" name="contact" value="<?php if(!empty($_SESSION['contact'])) echo $_SESSION['contact']; ?>" size="35" required="required" pattern = "[0-9]*[0-9]*[0-9]"/>
			</td>
		</tr>

<<<<<<< HEAD
		<!--tr>
=======
		<!--<tr>
>>>>>>> fbf72d7a12c94ba3ce72ef9ff64b3cdf47840d89
			<td class = "loginBottom1">Credit Card No.:</td>
			<td><input class = "form"type="text" name="creditcardno1" value="<?php if(!empty($_SESSION['creditcardno1'])) echo $_SESSION['creditcardno1']; ?>" size="1" required="required" pattern = "[0-9][0-9][0-9][0-9]"/>-
					<input class = "form"type="text" name="creditcardno2" value="<?php if(!empty($_SESSION['creditcardno2'])) echo $_SESSION['creditcardno2']; ?>" size="1" required="required" pattern =  "[0-9][0-9][0-9][0-9]"/>-
					<input class = "form"type="text" name="creditcardno3" value="<?php if(!empty($_SESSION['creditcardno3'])) echo $_SESSION['creditcardno3']; ?>" size="1" required="required" pattern =  "[0-9][0-9][0-9][0-9]"/>-
					<input class = "form"type="text" name="creditcardno4" value="<?php if(!empty($_SESSION['creditcardno4'])) echo $_SESSION['creditcardno4']; ?>" size="1" required="required" pattern =  "[0-9][0-9][0-9][0-9]"/>
			</td>
<<<<<<< HEAD
		</tr-->
=======
		</tr>-->
>>>>>>> fbf72d7a12c94ba3ce72ef9ff64b3cdf47840d89
		
		<tr>
			<td colspan = "2" class = "loginBottom3"><span class = "textBlack">I </span><span class = "textBluer">CERTIFY</span> <span class = "textBlack">that all the information given in this form <br/>are true and correct.</span></td>
		</tr>
		<tr>
			<td colspan = "2" class = "loginBottom3"><span class = "textBlack"><a href="index.php">Login</a></span></td>
		</tr>
		
		<tr>
			<td colspan = "2" class = "loginBottom1">
			<input id="mysubmit" type="submit" value="Submit" name = "sub" />
			</td>
		</tr>

		<tr>
			<td colspan = "2" class = "loginBottom3">
				<span class = "errorMsg"><br />
				<?php
					if(!empty($_SESSION['ERROR'])){
						if($_SESSION['ERROR']==true && !empty($_SESSION['ERRORMSG']))
							echo $_SESSION['ERRORMSG'];
					}
					if(!empty($_SESSION['MSG']))
							echo $_SESSION['MSG'];
					session_destroy();
				?>
				</span>
			</td>
		</tr>

	
</table>
</form>	
</div>
</body>
	
</html>
