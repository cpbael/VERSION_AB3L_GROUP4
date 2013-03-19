<html>		
<head>
<link rel="stylesheet" href="Style.css" type="text/css" media="screen"/>
<?php	session_start();
?>
</head>
<body>

			<form class="form-2" name = "add" method = "POST" action = "process_sign_up.php">
				
				<h1><span class="log-in">Sign Up</span></h1>
				<center>
				<input class = "form" type="text" name="firstname" value="<?php if(!empty($_SESSION['firstname'])) echo $_SESSION['firstname']; ?>" size="35"   required="required" onchange = "this.value=this.value.toUpperCase();" pattern= "[a-zA-Z ]*[a-zA-Z ]*[a-zA-Z ]" required placeholder = "First Name"/>

				<input class = "form" type="text" name="lastname" value="<?php if(!empty($_SESSION['lastname'])) echo $_SESSION['lastname']; ?>" size="35"   required="required" onchange = "this.value=this.value.toUpperCase();" pattern= "[a-zA-Z ]*[a-zA-Z ]*[a-zA-Z ]" required placeholder = "Last Name"/>

				<input type="email" name="eadd" value="<?php if(!empty($_SESSION['eadd'])) echo $_SESSION['eadd']; ?>" size="35" required="required" required placeholder = "Email Address"/>

				<input class = "form" type="text" name="username" id="username" value="<?php if(!empty($_SESSION['username'])) echo $_SESSION['username']; ?>" size="35" required="required" pattern= "[a-zA-Z0-9 ]*[a-zA-Z0-9]*[a-zA-Z0-9 ]" required placeholder = "Username"/>

				<input class = "form" type="password" name="pwd" value="" size="35" required="required" required placeholder = "Password"/>
				
				<input class = "form"type="password" name="pwdconfirm" value="" size="35" required="required" required placeholder = "Confirm Password"/>

				<input class = "form"type="text" name="contact" value="<?php if(!empty($_SESSION['contact'])) echo $_SESSION['contact']; ?>" size="35" required="required" pattern = "[0-9]*[0-9]*[0-9]" required placeholder = "Contact Number"/>
				</center>
				<h1><span class="log-in">Credit Card Number</span></h1>
				<center>
				<input type="text"  maxlength="4" name="creditcardno1" value="<?php if(!empty($_SESSION['creditcardno1'])) echo $_SESSION['creditcardno1']; ?>" size="2" required="required" pattern = "[0-9][0-9][0-9][0-9]"/>-
							<input type="text" name="creditcardno2" value="<?php if(!empty($_SESSION['creditcardno2'])) echo $_SESSION['creditcardno2']; ?>" size="2" maxlength="4" required="required" pattern =  "[0-9][0-9][0-9][0-9]"/>-
							<input type="text"  maxlength="4"name="creditcardno3" value="<?php if(!empty($_SESSION['creditcardno3'])) echo $_SESSION['creditcardno3']; ?>" size="2" required="required" pattern =  "[0-9][0-9][0-9][0-9]"/>-
							<input type="text" maxlength="4" name="creditcardno4" value="<?php if(!empty($_SESSION['creditcardno4'])) echo $_SESSION['creditcardno4']; ?>" size="2" required="required" pattern =  "[0-9][0-9][0-9][0-9]"/>
				</center>
			
				<center>
				<span colspan = "2"><span class = "textBlack">I </span><span class = "textBluer">CERTIFY</span> <span class = "textBlack">that all the information given in this form <br/>are true and correct.</span></span>
				<br/>
				<span class = "errorMsg"><br/>
				<?php
					if(!empty($_SESSION['ERROR'])){
						if($_SESSION['ERROR']==true && !empty($_SESSION['ERRORMSG']))
							echo "<p style='color: red;'>{$_SESSION['ERRORMSG']}</p>";
					}
					if(!empty($_SESSION['MSG']))
							echo $_SESSION['MSG'];
					session_destroy();
				?>
				<input type="submit" value="Submit" name = "sub" /></center>
							

			  </div>
			</div>
		</div>
</body>
</html>