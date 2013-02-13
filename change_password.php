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
						<input class ="form" type="password" name="old_pw" value="" size="35" />
					</td>
				</tr>
				<br/>
				<tr>
					<td class = "loginBottom1">
						New password
					</td> 
					<td>
						<input class = "form" type="password" name="new_pw" value="" size="35" />
					</td>
				</tr>
				<br/>
				<tr>
					<td class = "loginBottom1">
						Confirm new password
					</td>
					<td>
						<input class = "form" type="password" name="confirm_pw" value="" size="35" />
					</td>
				</tr>
				<tr>
					<td class = "loginBottom1">
						<a href="edit_account.php">Back to edit Accout</a>
					</td>
				</tr>
				<tr>
					<td colspan = "2" class = "loginBottom1">
						<input id="mysubmit" type="submit" value="Change" name ="sub" />
					</td>
				</tr>
		</table> 	
		</form>
		</div>
	</body>
<?php require_once("sql_disconnect.php")?>
</html>
