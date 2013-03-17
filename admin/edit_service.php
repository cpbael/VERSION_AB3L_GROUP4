<?php 
	require_once "process_check_if_logged_in.php";
	require_once "header.php";
	require_once "sql_connect.php";
	$account_info=mysql_fetch_array(mysql_query("select * from service where service_id={$_GET['service_id']};"));
	$type_info=mysql_fetch_array(mysql_query("select * from type where type_id={$account_info['type_id']};"));
	$type=mysql_query("SELECT * FROM type ORDER BY type_name ASC;");
?>
	<div class="log3">
	<table class = "loginBottom"> 
	<form name = "add" method = "POST" action = "process_edit_service.php?service_id=<?php echo $_GET['service_id'];?>" enctype="multipart/form-data">
		
		<tr>
			<div class = "signup">
				Edit Service
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
			<td class = "loginBottom1">Service Name: </td> 
			<td><input class = "form" type="text" name="service_name" value="<?php echo $account_info['service_name'];?>" size="35"   required="required" onchange = "toUpper(this)" pattern= "[a-zA-Z0-9 ]*[a-zA-Z0-9 ]*[a-zA-Z0-9 ]"/>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Type:</td>
			<td>
				<select name="type">	
					<?php
						echo "<option value='{$type_info['type_id']}'>{$type_info['type_name']}</option>";
						while ($type_i=mysql_fetch_array($type)){
							if($type_i['type_id']!==$type_info['type_id']){
								echo "<option value='{$type_i['type_id']}'>
							{$type_i['type_name']}</option>";
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan = "2" class = "loginBottom1">
				<input id="mysubmit" type="button" value="Back" name = "back" onclick="window.location.href='show_type.php?type_id=<?php echo $account_info['type_id'];?>'"/>

			</td>
			
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
<?php require_once "sql_disconnect.php";?>