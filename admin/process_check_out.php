 <?php 

 
 
 
  require_once "sql_connect.php";
	
	$row=mysql_fetch_array(mysql_query("select * from reservation where reservation_id={$_GET['id']};"));
	  
    if($row){
		$query = "update reservation set flag='-1' where reservation_id={$_GET['id']}";
		$result = mysql_query($query);
	}
	require_once("sql_disconnect.php");
	header("Location:check_in.php");
?>

