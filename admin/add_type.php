<?php 
	require_once "process_check_if_logged_in.php";
	require_once "header.php";
	require_once "sql_connect.php";
?>
	<div class="log3">
	<table class = "tabla"> 
	<form name = "edit_type" method = "POST" action = "process_add_type.php" enctype="multipart/form-data">
		<tr>
			<div class = "signup">
				<td colspan = "2"><h1><center>ADD TYPE</center></h1></td>
			</div>
		</tr>
		<br/><br/><br/><br/><br/>
		<tr>
			<td class = "loginBottom1">Name:</td>
			<td><input class = "form" type="text" name="type_name" value="" size="35" required="required"/>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Classification:</td>
			<td>
				<select name="classification">
					<option value="ROOM">ROOM</option>
					<option value="FACILITY">FACILITY</option>
					<option value="SERVICE">SERVICE</option>
				</select>
				
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Rate:</td>
			<td><input class = "form"type="text" name="rate" value="" size="35" required="required" pattern = "[0-9]*[0-9]*[0-9]"/>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Image:</td>
			<td>
				<input class = "form" type="file" name="item_img" value=""/>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Article:</td>
			<td><textarea rows="4" cols="25" name="article" value=""  required="required"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan = "2" class = "loginBottom1">
				<center><input id="mysubmit" type="submit" value="Add Type" name = "sub" /></center>
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
<?php
	require_once"footer.php";
	require_once "sql_disconnect.php";
?>