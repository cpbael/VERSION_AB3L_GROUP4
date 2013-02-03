<?php
	session_start();
	if(isset($_POST['login'])){
		//Pwede bag ganito yung pagconfirm ng account ng admin? Hhe.
		if($_POST['middleinitial']=='admin' && $_POST['pwdconfirm']=='hotel128'){
			$_SESSION['login']=1;
			header('Location: admin.php');
			exit;
		}else echo 'Invalid username/password';
	}
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
