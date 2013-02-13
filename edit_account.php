<?php 
  require_once "process_check_if_logged_in.php";
  require_once "sql_connect.php";
	//require_once "do_check_login.php";
?>

<?php
	$account_info=mysql_fetch_array(mysql_query("select * from member where member_id={$_SESSION['member_id']};"));
	//echo "<pre>".var_dump($account_info)."</pre>";

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Style.css"/>
	</head>

	<body>
<div class="log3">
<table class = "loginBottom"> 
	<form name = "add" method = "POST" action = "process_update.php">
		
		<tr>
			<div class = "signup">
				Edit account
			</div>
		</tr>
		
		<tr>
			<td colspan = "2"><hr><td>
		</tr>
	
	</br>
	
	<tr>
	<td class = "loginBottom1">Email Address: </td> 
		<td><input class = "form" type="email" name="eadd" value="<?php echo $account_info['eadd'];?>" size="35" />
		</td>
	</tr>

	
	</br>
	
	<tr>
	<td class = "loginBottom1">Name: </td> 
		<td><input class = "form" type="text" name="firstname" value="<?php echo $account_info['fullname'];?>" size="35" />
		</td>
	</tr>
	<!--kung paghihiwalayin natin ung name	
	<tr>
		<td class = "loginBottom1">Middle Name: </td> 
		<td><input class = "form" type="text" name="firstname" value="" size="35" />
		</td>
	</tr>
	
	<tr>
		<td class = "loginBottom1">Last Name: </td> 
		<td><input class = "form" type="text" name="firstname" value="" size="35" />
		</td>
	</tr>
	-->
	</br>
	
	
	<tr>
	<td class = "loginBottom1">Username: </td>
	<td><input class = "form"type="text" name="username" value="<?php echo $account_info['uname'];?>" size="35" />
	</td>
	
	<!--tr>
		<td class = "loginBottom1">Password: </td>
		<td><input class = "form"type="password" name="pwd" value="<?php echo $account_info['eadd'];?>" size="35" />
	</td-->
	
	<!--tr>
		<td class = "loginBottom1">Confirm Password: </td>
		<td><input class = "form"type="password" name="pwdconfirm" value="" size="35" />
	</td-->

	</br>
	
	
	<tr>
	<td class = "loginBottom1">Contact Number:</td>
	<td><input class = "form"type="text" name="contact" value="<?php echo $account_info['contactno'];?>" size="35" />
	</td>

	</br>
		
	<!--tr>
	<td class = "loginBottom1">Gender:</td>
	<td><select class="form" name= "gender">
	  <?php //if($account_info['contactno'])?>
	  <option value="NOVALUE" ></option>
	  <option value="MALE" >MALE</option>
	  <option value="FEMALE" >FEMALE</option>
	</select> </td></tr-->
	
	</br>
	
	<tr>
		<!--td colspan = "2" class = "loginBottom3"><span class = "textBlack">I </span><span class = "textBluer">CERTIFY</span> <span class = "textBlack">that all the information given in this form <br/>are true and correct.</span></td-->
		<td><a href="change_password.php">Change Password</a></td>
	</tr>
		
	<tr>
	
	<td colspan = "2" class = "loginBottom1">
		<input id="mysubmit" type="submit" value="Update Account" name = "sub" />
	</td>
	</tr>
</table> 	
	
	
	</form>
	</div>
<?php
 require_once("footer.php");	
 require_once("sql_disconnect.php");
 
 ?>
