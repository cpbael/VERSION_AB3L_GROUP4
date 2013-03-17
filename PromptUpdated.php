<?php 
  require_once "process_check_if_logged_in.php";
  require_once "sql_connect.php";
  require_once "header.php";
?>
<?php
	$account_info=mysql_fetch_array(mysql_query("select * from member where member_id={$_SESSION['member_id']};"));

?>
<html>		
<head>
</head>
	<body>
		<div  class="log3">
				<center>
					<span class = "errorMsg">
						<?php
								if(!empty($_SESSION['MSG']))
								echo $_SESSION['MSG'];
								unset($_SESSION['MSG']);
						?>
					</span>
				</center>
			<form action = "home.php" name = "add" method="post">				
				<table class ="tabla">
					<tr>
						<td colspan = "2"><center><span class="log-in h1">ACCOUNT DETAILS</span></center></td>
					</tr>
					<tr>
						<td>Email Address</td>
						<td><?php echo "<span>".$account_info['eadd']."</span>";?></td>
					</tr>
					<tr>
						<td>Name</td> 
						<td><?php echo "<span>".$account_info['fullname']."</span>";?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><?php echo "<span>".$account_info['uname']."</span>";?></td>
					</tr>
					<tr>
						<td>Contact Number</td>
						<td><?php echo "<span>".$account_info['contactno']."</span>";?></td>
					</tr>
				</table>
			</form>​​
		</div>
	</body>
</html>
<?php
 require_once("sql_disconnect.php");
 require_once("footer.php");
?>