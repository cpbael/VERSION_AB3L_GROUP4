<?php 
  require_once "process_check_if_logged_in.php";
  require_once "sql_connect.php";
?>
<?php
	$account_info=mysql_fetch_array(mysql_query("select * from member where member_id={$_SESSION['member_id']};"));

?>
<html>		
<head>
			<link rel="stylesheet" href="css/PopUpStyle.css" />
			 <script src="javascripts/tinybox.js"></script>
			 <script type="text/javascript" src="javascript.js"></script>
</head>
	<body>
			<form class="form-2" action = "process_change_pw.php" name = "add" method="post">
				<h1><span class="log-in">Change Password</span></h1>
					<center>

					<br/>
					<span class = "loginBottom1">Old password</span> 
						<input class ="form" type="password" name="old_pw" value="" size="35" required placeholder="Old Password"/>
					<br/>
					<span class = "loginBottom1">New password</span> 
						<input class = "form" type="password" name="new_pw" value="" size="35" required placeholder="New Password"/>

					<span class = "loginBottom1">Confirm New Password</span>
						<input class = "form" type="password" name="confirm_pw" value="" size="35" required placeholder="Confirm New Password" />
					<br/><br/>
					<input class = "signUP floatLeft" type = "button" onclick="TINY.box.show({url:'PopUpEdit.php',width:300,height:320})" value="Edit Account">
					<input type="submit" name="sub" value="Update Password">
					</center>
			</form>​​
						<span class = "errorMsg">
			<?php
					if(!empty($_SESSION['MSG']))
							echo $_SESSION['MSG'];
					unset($_SESSION['MSG']);
			?>
			</span>
	
	</body>
</html>
<?php
 require_once("sql_disconnect.php");
?>