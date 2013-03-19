 <!--
	CMSC128 AB-3L GROUP 4 PROJECT: HOTEL 128 Reservation System
	Claudine Bael
	Theresa Mercado
	Anitsirc Ybur Haniel
	Renee Chiarianne Navarrosa
	Kevin Lawrence Romas
	
	Description: Used for Editing the Type
 -->
<?php 
	require_once "process_check_if_logged_in.php";
	require_once "header.php";
	require_once "sql_connect.php";
	$type_info=mysql_fetch_array(mysql_query("select * from type where type_id={$_GET['type_id']};"));
	
?>
<html>
	<head></head>
	<body>
		<div class="log3">
		<table class = "loginBottom"> 
		<form name = "edit_type" method = "POST" action = "process_edit_type.php?type_id=<?php echo $_GET['type_id'];?>" enctype="multipart/form-data">
			
			<tr>
				<div class = "signup">
					Edit <?php echo $type_info['type_name'];?>
				</div>
			</tr>
			<br/><br/><br/><br/><br/>
			<tr>
				<td colspan = "2"><hr><td>
			</tr>
			<tr>
				<td class = "loginBottom1">
				</td>
				<td>
					<img id='itemImg' src="../images/<?php echo $type_info['image'];?>"/>
				</td>
			</tr>
			<tr>
				<td class = "loginBottom1">Name:</td>
				<td><input class = "form" type="text" name="type_name" value="<?php echo $type_info['type_name'];?>" size="35" required="required"/>
				</td>
			</tr>
			<tr>
				<td class = "loginBottom1">Classification:</td>
				<td>
					<select name="classification">
						<?php
							echo "<option value='{$type_info['classification']}'>{$type_info['classification']}</option>";
								if($type_info['classification']!=='ROOM'){?>
									<option value="ROOM">ROOM</option>
						<?php 	}if($type_info['classification']!=='FACILITY'){?>
									<option value="FACILITY">FACILITY</option>
						<?php 	}if($type_info['classification']!=='SERVICE'){?>
									<option value="SERVICE">SERVICE</option>
						<?php }?>
					</select>
					
				</td>
			</tr>
			<tr>
				<td class = "loginBottom1">Rate:</td>
				<td><input class = "form"type="text" name="rate" value="<?php echo $type_info['rate'];?>" size="35" required="required" pattern = "[0-9]*[0-9]*[0-9]"/>
				</td>
			</tr>
			<tr>
				<td class = "loginBottom1">Image:</td>
				<td>
					<input class = "form" type="file" name="item_img" value="<?php echo $type_info['image'];?>"/>
				</td>
			</tr>
			<tr>
				<td class = "loginBottom1">Article:</td>
				<td><textarea rows="4" cols="25" name="article" value=""  required="required"><?php echo $type_info['article'];?></textarea>
				</td>
			</tr>
			<tr>
				<td class=\"table_display\">
					<input id="mysubmit" type="button"  onclick=window.location.href='show_type.php?type_id=<?php echo $type_info['type_id'];?>' value="Back">
				</td>
				<td colspan = "2" class = "loginBottom1">
				<input id="mysubmit" type="submit" value="Update Type" name = "sub" />
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
	</body>
</html>
<?php
	require_once"footer.php";
	require_once "sql_disconnect.php";
?>