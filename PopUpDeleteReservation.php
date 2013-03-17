<html>
		<script type="text/javascript" src="javascript.js"></script>
	<body>
			<form class="form-2" action = "process_login.php" name = "add" method="post">
				<h1><span class="log-in">Delete Reservation</span></h1>
					<center>
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
					<br/>
					<!--input type="text" name="username" required placeholder="Username" onchange="this.value=this.value.toUpperCase();"/-->
					<input type="text" name="username" required placeholder="Username"/>
					<input class = "showpassword" type="password" name="pwdconfirm" required placeholder="Password">
					<input type="submit" name="login" value="Log in">
					</center>
			</form>​​

	</body>
</html>