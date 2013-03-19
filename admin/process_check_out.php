 <!--
	Process the Check Out System
 -->
 <?php 
	require_once "sql_connect.php";
	
	$row=mysql_fetch_array(mysql_query("select * from reservation where reservation_id={$_GET['reservation_id']};"));
	  
    if($row){
		$query = "update reservation set status='1' where reservation_id={$_GET['reservation_id']}";
		$result = mysql_query($query);
	}
	require_once("sql_disconnect.php");
	header("Location:view_all_reservations.php");
?>

