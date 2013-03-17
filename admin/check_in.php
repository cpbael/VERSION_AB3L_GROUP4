<?php 
/*
Piniprint yung laman ng reservation table. 

May flag sa reservation table. Pag 0-reserved, 1-checked in, -1-checked out, 2-reserved na hindi na-check in.
*/

  //require_once "update_reservations.php";
  require_once "sql_connect.php";
  require_once "header.php";
  

?>

<?php
	$result = mysql_query("SELECT * FROM reservation");
	echo "RESERVATIONS </br ></br >";
	echo "<table class = tabla> <tr> <td>name</td> <td>reservation_id</td>  <td>start_date</td> <td>end_date</td> <td>Check in </td></tr>";
	while($row = mysql_fetch_array($result)){
		//$name = mysql_fetch_array(mysql_query("SELECT fullname FROM member where member_id = $row[member_id]"));
		
		
		if($row['flag']==0){
			if($row['is_Member']==1){
				$name = mysql_fetch_array(mysql_query("SELECT fullname FROM member where member_id = $row[member_id]"));
			}else{
				$name = mysql_fetch_array(mysql_query("SELECT fullname FROM guest where guest_id = $row[member_id]"));
			}
			echo "<tr> <td>$name[0]</td> <td>$row[reservation_id]</td>  <td>$row[start_date]</td> <td>$row[end_date]</td> <td><a href='process_check_in.php?id=$row[reservation_id]'>Check in </a></td></tr>";
		}
	}
	echo "</table>";
	
	echo "</br >";
	
	$result = mysql_query("SELECT * FROM reservation");
	echo "CHECKED-IN GUESTS </br ></br >";
	echo "<table border=1px style=solid> <tr> <td>name</td> <td>reservation_id</td>  <td>start_date</td> <td>end_date</td> <td>Check out </td></tr>";
	while($row = mysql_fetch_array($result)){
		if($row['is_Member']==1){
			$name = mysql_fetch_array(mysql_query("SELECT fullname FROM member where member_id = $row[member_id]"));
		}else{
			//$name="HAHA";
			$name = mysql_fetch_array(mysql_query("SELECT fullname FROM guest where guest_id = $row[member_id]"));
		}
		if($row['flag']==1){
			echo "<tr> <td>$name[0]</td> <td>$row[reservation_id]</td>  <td>$row[start_date]</td> <td>$row[end_date]</td> <td><a href='process_check_out.php?id=$row[reservation_id]'>Check out </a></td></tr>";
		}
	}
	echo "</table>";
	
	require_once("sql_disconnect.php");

?>

<html>
	<head>
	
	</head>
	
	<body>
		
	</body>

<html>