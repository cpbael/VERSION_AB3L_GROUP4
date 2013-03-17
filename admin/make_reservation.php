<?php
	require_once"process_check_if_logged_in.php";
	require_once"header.php";
	require_once"sql_connect.php";	
	$info=mysql_fetch_array(mysql_query("SELECT * FROM	service WHERE service_id={$_GET['service_id']}"));
?>
	<div class="log3">
	<table class = "loginBottom"> 
	<form name = "add" method = "POST" action = "process_make_reservation.php?service_id=<?php echo $_GET['service_id'];?>">
		<tr>
			<div class = "signup">
				<?php echo $info['service_name']; ?>
			</div>
		</tr>
		<br />
		<br />
		<br />
		<br />
		<br />
		<tr>
			<td colspan = "2"><hr><td>
		</tr>
		<tr>
			<td class = "loginBottom1">
			</td>
			<td>
				<img id='itemImg' src="images/<?php echo $info['image'];?>"/>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Rate per Day:</td>
			<td>
				<?php echo $info['rate'];?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Classification:</td>
			<td>
				<?php echo $info['classification'];?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Article:</td>
			<td>
				<?php echo $info['article'];?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1"> First Name:</td>
			<td>
				<input type="text" name="first_name" required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1"> Last Name:</td>
			<td>
				<input type="text" name="last_name" required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Contact Number:</td>
			<td>
				<input type="text" name="contact_num" required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Start date:</td>
			<td>
				<input type="date" name="start_date" value="" min="<?php echo date('Y-m-d')?>" required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">End date:</td>
			<td>
				<input type="date" name="end_date" value="" min="<?php echo date('Y-m-d')?>" required>
			</td>
		</tr>
		<tr>
			<td colspan = "2" class = "loginBottom1">
			<input id="mysubmit" type="submit" value="Submit" name = "sub" />
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
<?php require_once"footer.php";?>