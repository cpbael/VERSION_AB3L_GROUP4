<?php
	session_start();
	$link = mysql_connect('localhost', 'root', '');
		if (!$link) {
			die('Could not connect to mysql: ' . mysql_error());
		}else{
			$db = mysql_select_db("hrm", $link); 
		
			if (!$db) {
				die('Could not connect to database: ' . mysql_error());
			}
		}
	if(isset($_POST['login'])){
		//Member
		$result = mysql_query("SELECT * FROM member");
		while($row = mysql_fetch_array($result)){
			if($_POST['middleinitial']==$row['uname'] && $_POST['pwdconfirm']==$row['password']){
				$_SESSION['login']=1;
				header('Location: home.php');
				exit;
			}
		}
		
		//Admin
		$result = mysql_query("SELECT * FROM admin");
		$row = mysql_fetch_array($result);
		if($_POST['middleinitial']==$row['username'] && $_POST['pwdconfirm']==$row['password']){
				$_SESSION['login']=1;
				header('Location: admin.php');
				exit;
		}
	}
	
	mysql_close($link);
?>

<html>
  <head>
		<link rel="stylesheet" type="text/css" href="Style.css"/>
	</head>
	
	<body>
<div class="log3">
<table class = "loginBottom"> 
	<form name = "add" method = "POST" action = "">	
		<tr>
			<td colspan = "2"><hr><td>
		</tr>
	
	</br>

	
	<tr>
	<td class = "loginBottom1">Username: </td>
	<td><input class = "form" type="text" name="middleinitial" value="" size="35" />
	</td>
	
	<tr>
		<td class = "loginBottom1">Password: </td>
		<td><input class = "form"type="password" name="pwdconfirm" value="" size="35" />
	</td>
	
	<tr>

		<tr>
			<td colspan = "2" class = "loginBottom3"><span class = "textBluer">Forget Password?</span></td>
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
	</body>
	
</html>
