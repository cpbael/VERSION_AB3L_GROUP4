<?php 
  require_once "process_check_if_logged_in.php";
  require_once "sql_connect.php";
?>
<?php
	$account_info=mysql_fetch_array(mysql_query("select * from member where member_id={$_SESSION['member_id']};"));

?>
<html>
	<head>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/PopUpStyle.css" />
        <link rel="stylesheet" href="css/Style.css" />
		<script src="javascripts/tinybox.js"></script>
	</head>
	<body>
			<form class="form-2" action = "process_update.php" name = "add" method="post">
					<h1><span class="log-in">Edit Account</span></h1>
					<center>

					<br/>
					<span class = "loginBottom1">Email Address</span> 
					<input type="email" name="eadd" value="<?php echo $account_info['eadd'];?>" size="35" required placeholder="Email Address"/>
					<br/>
					<span class = "loginBottom1">Name</span> 
					<input type="text" name="firstname" value="<?php echo $account_info['fullname'];?>" size="35" required placeholder = "Name" />

					<span class = "loginBottom1">Username</span>
					<input type="text" name="username" value="<?php echo $account_info['uname'];?>" size="35" required placeholder = "Username">

					<span class = "loginBottom1">Contact Number</span>
					<input type="text" name="contact" value="<?php echo $account_info['contactno'];?>" size="35" required placeholder = "Contact Number"/>
					
					<br/><br/>
					<input class = "signUP floatLeft" type = "button" onclick="TINY.box.show({url:'PopUpChangePassword.php',width:300,height:300})" value="Change Password">
					<input type="submit" name="sub" value="Update Account">
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