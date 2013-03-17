<html>
	<head>
		<link rel="stylesheet" href="css/Style.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="css/PopUpStyle.css" type="text/css" media="screen"/>
	</head>
	<body>
		<div class="log3">
			<form class="form-2" action = "process_login.php" name = "add" method="post">
				<table class = "tabla">
					<center>
					<tr>
						<td>
						<?php
							session_start();
							if(!(isset($_SESSION['login_msg']))){
								$_SESSION['login_msg']="Administrator";
							}
							echo'<h1><center><span class="log-in">';
							echo $_SESSION['login_msg'];
									
							echo'</span></center></h1>';
							unset($_SESSION['login_msg']);
							session_destroy();
						?>
						</td>
					</tr>
					<tr>
						<td><input class = "form" type="text" name="username" value="" size="35" required placeholder="Username"/></td>
					</tr>
					<tr>
						<td><input class = "form" type="password" name="pwdconfirm" value="" size="35" required placeholder="Password"/></td>
					</tr>
					<tr>
						<td><center><input class="login" type="submit" value="Log In" name = "login" /></center></td>
					</tr>
					</center>
				</table>
			</form>​​
		</div>
	</body>
</html>