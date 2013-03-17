<?php
	require_once"process_check_if_logged_in.php";
	require_once"header.php";
	require_once"sql_connect.php";	
	$info=mysql_fetch_array(mysql_query("SELECT * FROM type WHERE type_id={$_GET['type_id']}"));
?>
<html>
	<head>

	</head>
	
	<body>
		<div class = "log5">
			<div class="divLeft">
				<table class="tabla"> 
					<form class = "form-2" name = "add" method = "POST" action = "add_reservation.php?type_id=<?php echo $_GET['type_id'];?>">			
						<tr>
							<td colspan="2">
								<center><h1><?php echo $info['type_name']; ?></h1></center>
							</td>
						</tr>
						<tr>
							<td colspan="2"><center>
								<img id='itemImg' src="images/<?php echo $info['image'];?>"/></center>
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
							<td class = "textBlacker">START DATE:</td>
							<td>
								<input type="date" name="start_date" value="<?php if(!empty($_POST['start_date'])) echo $_POST['start_date']; else if(!empty($_GET['start_date'])) echo $_GET['start_date']; ?>" min="<?php echo date('Y-m-d')?>" required>
							</td>
						</tr>
						<tr>
							<td class = "textBlacker">END DATE:</td>
							<td>
								<input type="date" name="end_date" value="<?php if(!empty($_POST['end_date'])) echo $_POST['end_date']; else if(!empty($_GET['end_date'])) echo $_GET['end_date']; ?>" min="<?php echo date('Y-m-d')?>" required>
							</td>
						</tr>
						<tr>
							<td colspan = "2">
								<center><input id="mysubmit" type="submit" value="Submit" name = "sub"/></center>
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
						<td colspan="2"><h1><center>AVAILABLE ROOMS/SERVICES</center></h1></td>
					</tr>
						<?php
							if((isset($_POST['start_date']) and isset($_POST['end_date'])) or (isset($_GET['start_date']) &&isset($_GET['end_date']))){
									
							if(isset($_POST['start_date'])){
								$sdate=$_POST['start_date'];
								$edate=$_POST['end_date'];
							}else{
								$sdate=$_GET['start_date'];
								$edate=$_GET['end_date'];
							}
							$array=mysql_query("SELECT * FROM service where (service_id NOT IN (SELECT service_id FROM reservation
								WHERE '{$sdate}' between start_date AND end_date) and service_id NOT IN (SELECT service_id FROM reservation
								WHERE '{$edate}'  between start_date AND end_date)) and (service_id NOT IN (SELECT service_id FROM reservation
								WHERE start_date between  '{$sdate}' AND  '{$edate}') and service_id NOT IN (SELECT service_id FROM reservation
								WHERE end_date between '{$sdate}' AND  '{$edate}')) and type_id={$_GET['type_id']}");
								while($row=mysql_fetch_array($array)){
									echo "<tr>";
									echo"<td class=\"table_display\">{$row['service_name']}</td>";
									echo "<td class=\"table_display\"><input id=mysubmit3 type=button  onclick=window.location.href='process_add_reservation.php?service_id={$row['service_id']}&start_date={$sdate}&end_date={$edate}' value=Reserve></td>";
									echo "</tr>";
								};
								
							}
						?>
				</table>
			</div>
		</div>
	</body>
</html>
<?php
	require_once"footer.php";
	?>