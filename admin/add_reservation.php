<?php
	require_once"header.php";
	require_once"process_check_if_logged_in.php";
	require_once"sql_connect.php";	
	$info=mysql_fetch_array(mysql_query("SELECT * FROM type WHERE type_id={$_GET['type_id']}"));
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../Style.css"/>
	<link rel="stylesheet" href="../PopUpStyle.css" />
        <style>
		
			body{
				background: #c9d7e0 url('temp/bg.png');
			}
		</style>
	<title>128 HOTEL</title>
</head>
<body>
	<center>
		<span class = "hposition"><input id = "mysubmit3" type="button" onclick="window.location.href='admin.php'" value="HOME">
		<br/><br/>
		<input id = "mysubmit3" type="button" onclick="window.location.href='process_logout.php'" value="Logout"/>
	</span>
	</center>
	<div class="divLeft">
	<table class="textBlackR"> 
	<form class = "form-2" name = "add" method = "POST" action = "add_reservation.php?type_id=<?php echo $_GET['type_id'];?>">
		
		<tr>
			<center>
				<h1>
				<?php echo $info['type_name']; ?></h1>
			</center>
		</tr>
		<tr>
			<td colspan = "2"><hr><td>
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
			<td class = "loginBottom1"> First Name:</td>
			<td>
				<input type="text" name="first_name" value="<?php if(!empty($_POST['first_name'])) echo $_POST['first_name']; ?>" required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1"> Last Name:</td>
			<td>
				<input type="text" name="last_name" value="<?php if(!empty($_POST['last_name'])) echo $_POST['last_name']; ?>"required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Contact Number:</td>
			<td>
				<input type="text" name="contact_num" value="<?php if(!empty($_POST['contact_num'])) echo $_POST['contact_num']; ?>" required>
			</td>
		</tr>
		<tr>
			<td class = "textBlacker">START DATE:</td>
			<td>
				<input type="date" name="start_date" value="<?php if(!empty($_POST['start_date'])) echo $_POST['start_date']; ?>" min="<?php echo date('Y-m-d')?>" onchange="end_date.min=this.value" required>
			</td>
		</tr>
		<tr>
			<td class = "textBlacker">END DATE:</td>
			<td>
				<input type="date" id="end_date" name="end_date" value="<?php if(!empty($_POST['end_date'])) echo $_POST['end_date']; ?>" min="<?php echo date('Y-m-d')?>" required>
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
<div class="divRight">
<table class="innertable">
<tr>
	<th colspan="2" class="table_header">AVAILABLE ROOMS
	</th>

</tr>
	<div class="scrolldata">
	
				
	<?php
		if(isset($_POST['first_name'])){
			$_SESSION['first_name']=$_POST['first_name'];
		}
		if(isset($_POST['last_name'])){
			$_SESSION['last_name']=$_POST['last_name'];
		}if(isset($_POST['contact_num'])){
			$_SESSION['contact']=$_POST['contact_num'];
		}
		
		if(isset($_POST['start_date'])){
			$array=mysql_query("SELECT * FROM service where service_id NOT IN (SELECT service_id FROM reservation
            WHERE '{$_POST['start_date']}' between start_date AND end_date) and service_id NOT IN (SELECT service_id FROM reservation
            WHERE '{$_POST['end_date']}'  between start_date AND end_date) and type_id={$_GET['type_id']}");
			
			while($row=mysql_fetch_array($array)){
				echo "<tr >";
				echo"<td class=\"table_display\">{$row['service_name']}</td>";
				echo "<td class=\"table_display\"><input id=mysubmit3 type=button  onclick=window.location.href='process_make_reservation.php?service_id={$row['service_id']}&start_date={$_POST['start_date']}&end_date={$_POST['end_date']}' value=Reserve></td>";
				echo "</tr>";
			};
			}
		
	?>
		
	</div>

</table>
</div>
<?php
	require_once"footer.php";
?>