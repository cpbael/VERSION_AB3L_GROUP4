<?php
	require_once"process_check_if_logged_in.php";
	require_once"sql_connect.php";	
	require_once"header.php";	
	$info=mysql_fetch_array(mysql_query("SELECT * FROM type WHERE type_id={$_GET['type_id']}"));
?>
<html>
<head>
	
</head>
<body>
	<div class = "log5">
		<div class="divLeft">
			<table class="tabla"> 
			<!--form class = "form-2" name = "add" method = "POST" action = "show_type.php?type_id=<?php echo $_GET['type_id'];?>"-->
				<form class = "form-2" name = "add_reservation" method = "POST" action = "edit_type.php?type_id=<?php echo $_GET['type_id'];?>">
					<tr>
							<td colspan="2">
								<center><h1><?php echo $info['type_name']; ?></h1></center>
							</td>
					</tr>
			
					<tr>
						<td colspan="2"><center>
							<img id='itemImg' src="../images/<?php echo $info['image'];?>"/></center>
						</td>
					</tr>
					<tr>
						<td class = "textBlacker">RATE PER DAY:</td>
						<td>
							<?php echo $info['rate'];?>
						</td>
					</tr>
					<tr>
						<td class = "textBlacker">CLASSIFICATION:</td>
						<td>
							<?php echo $info['classification'];?>
						</td>
					</tr>
					<tr>
						<td class = "textBlacker">ARTICLE:</td>
						<td>
							<?php echo $info['article'];?>
						</td>
					</tr>
					<tr>
						<td colspan = "2">
							<center><input id="mysubmit" type="submit" value="Edit Type" name = "sub"/></center>
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
				</form>	
			</table>
		</div>
		
		<div>
			<table class="tabla">
				<tr>
					<th colspan="3"><center><h1>ROOMS</h1></center></th>
				</tr>
					<div class="scrolldata">
						<tr>
							<form class = "form-2" name ="add" method = "POST" action = "process_add_service.php?type_id=<?php echo $_GET['type_id'];?>">
							<th>SERVICE NAME</th>
								<td>
									<input type="text" name="service_name" placeholder='ex. Room 101, Room 502' />
								</td>
								<td class=\"table_display\"><input id=mysubmit type=submit value=Add></td>
							</form>
						</tr>
									
						<?php
							
							//if(isset($_POST['start_date'])){
								$array=mysql_query("SELECT * FROM service where type_id={$_GET['type_id']}");
								
								while($row=mysql_fetch_array($array)){
									echo "<tr >";
									echo"<td class=\"table_display\">{$row['service_name']}</td>";
									echo "<td class=\"table_display\"><input id=mysubmit3 type=button  onclick=window.location.href='edit_service.php?service_id={$row['service_id']}' value=Edit></td>";
									echo "<td class=\"table_display\"><input id=mysubmit4 type=button  onclick=window.location.href='process_delete_service.php?service_id={$row['service_id']}&type_id={$row['type_id']}' value=Delete></td>";
									echo "</tr>";
								};
							//}
							
						?>					
					</div>
			</table>
		</div>
	</div>
<?php
	require_once"footer.php";
?>