<?php
	require_once"process_check_if_logged_in.php";
	require_once"header.php";
	require_once"sql_connect.php";	
	$info=mysql_fetch_array(mysql_query("SELECT * FROM reservation WHERE reservation_id={$_GET['reservation_id']}"));
	if($info['is_Member']==1){
		$info3=mysql_fetch_array(mysql_query("SELECT * FROM member where member_id={$info['member_id']}"));
	} else{
		$info3=mysql_fetch_array(mysql_query("SELECT * FROM guest where guest_id={$info['member_id']}"));
	}
	$info2=mysql_fetch_array(mysql_query("SELECT * FROM service WHERE service_id={$info['service_id']}"));
?>
	<div class="log3">
	<table class = "loginBottom"> 
	<form name = "add" method = "POST" action = "process_edit_reservation.php?reservation_id=<?php echo $_GET['reservation_id'];?>">
		<tr>
			<div class = "signup">
				<?php echo $info2['service_name']; ?>
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
				<img id='itemImg' src="images/<?php echo $info2['image'];?>"/>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Rate per Day:</td>
			<td>
				<?php echo $info2['rate'];?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Classification:</td>
			<td>
				<?php echo $info2['classification'];?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Article:</td>
			<td>
				<?php echo $info2['article'];?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1"> Full Name:</td>
			<td>
				<?php echo $info3['fullname']?>
			</td>
		</tr>

		<tr>
			<td class = "loginBottom1">Contact Number:</td>
			<td>
				<?php echo $info3['contactno']?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Start date:</td>
			<td>
				<input type="date" name="start_date" value="<?php echo date('Y-m-d',strtotime($info['start_date']))?>" min="<?php echo date('Y-m-d')?>" required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">End date:</td>
			<td>
				<input type="date" name="end_date" value="<?php echo date('Y-m-d',strtotime($info['end_date']))?>" min="<?php echo date('Y-m-d')?>" required>
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