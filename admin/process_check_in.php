 <?php 
/*
Kina-copy sa check-in table yung guest na i-checheck in.
*/
 
 
 
  require_once "sql_connect.php";
	
	$row=mysql_fetch_array(mysql_query("select * from reservation where reservation_id={$_GET['id']};"));
	  
    if($row){
		$query = "update reservation set status='0' where reservation_id={$_GET['id']}";
		$result = mysql_query($query);
		
	}
	require_once("sql_disconnect.php");
	header("Location:view_all_reservations.php");
?>

