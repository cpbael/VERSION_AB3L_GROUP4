<?php 
	require_once "sql_connect.php";
	require_once "process_check_if_logged_in.php";
	require_once "header.php";
?>
		<div class="log3">
		<form name = "add" method = "POST" action = "process_change_pw.php">
			<table class = "loginBottom"> 
				<br/>
				<tr>
					<div class = "signup">
						Change Password
					</div>
				</tr>
				<br/><br/>
				<tr>
					<td colspan = "2"><hr><td>
				</tr>	
				<br/>
				<tr>
					<td class = "loginBottom1">
						Old password
					</td> 
					<td>
						<input class ="form" type="password" name="old_pw" value="" size="35" required placeholder="Old Password"/>
					</td>
				</tr>
				<br/>
				<tr>
					<td class = "loginBottom1">
						New password
					</td> 
					<td>
						<input class = "form" type="password" name="new_pw" value="" size="35" required placeholder="New Password"/>
					</td>
				</tr>
				<br/>
				<tr>
					<td class = "loginBottom1">
						Confirm new password
					</td>
					<td>
						<input class = "form" type="password" name="confirm_pw" value="" size="35" required placeholder="Confirm New Password" />
					</td>
				</tr>
				<tr>
					<td colspan = "2" class = "loginBottom1">
						
					</td>
				</tr>
				<tr>
					<td colspan = "2" class = "loginBottom1">
						<center><input id = "mysubmit2" type="button" onclick="window.location.href='edit_account.php'" value="Edit Account">
						<input id="mysubmit" type="submit" value="Change" name ="sub" /></center>
					</td>
				</tr>
				<tr>
					<td colspan = "2" class = "loginBottom3">
						<span class = "errorMsg"><br />
						<?php
							if(!empty($_SESSION['MSG']))
									echo $_SESSION['MSG'];
							unset($_SESSION['MSG']);
						?>
						</span>
					</td>
				</tr>
		</table> 	
		</form>
		</div>
	</body>
<?php
 require_once("footer.php");	
 require_once("sql_disconnect.php");
?>
</html>
