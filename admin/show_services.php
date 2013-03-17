<?php require_once"header.php";?>
<?php require_once"sql_connect.php";?>
<?php
	$types_array=mysql_query("select * from type");
	$types=array();
	while($type_info=mysql_fetch_array($types_array)){
		$types[]=$type_info;
	}
	$i=0;
	$col=1;
		echo "<div class=log5>";
		while($i<count($types)){
			if($col==4){	
				$col=1;
			}
			$j=0;
				$count=mysql_fetch_array(mysql_query("select count(service_id) from service where type_id={$types[$i]['type_id']}"));
				
				echo "<figure><img src='../images/{$types[$i]['image']}'/>";
				echo "<figcaption>";
				//echo "<h1>{$services[$i]['service_name']}</h1>";
				echo "<h1>{$types[$i]['type_name']}</h1>";				
				echo "<span class=textWhite>RATE:</span>{$types[$i]['rate']}<hr/>";
				//echo "{$services[$i]['classification']}";
				echo "{$types[$i]['article']}";
				echo"<h3>No. of Rooms: {$count[0]}</h3>";
				
				//echo "<br/><a id=mysubmit href='process_delete_service.php?service_id={$services[$i]['service_id']}'>Delete</a>";
				//echo "<a id=mysubmit href='edit_service.php?service_id={$services[$i]['service_id']}'>Edit</a>";
				//echo "<span onclick='TINY.box.show({url:'add_reservation.php?service_id={$services[$i]['service_id']}',width:300,height:150}')><a href='#'>RESERVE</a></span>";
				//echo "<a href='add_reservation.php?service_id={$services[$i]['service_id']}'>RESERVE</a>";
				echo "<input id = mysubmit3 type=button onclick=window.location.href='show_type.php?type_id={$types[$i]['type_id']}' value='View Services'>";
				echo "</figcaption></figure>";
			
			if($col==4){
				$col=1;
			}
			$i++;$col++;
		}
	echo "</div>";
?>
<html>
<head>
        <style>
		
			body{
				background: #c9d7e0 url('temp/bg.png');
			}
		</style>
		<link rel="stylesheet" href="PopUpStyle.css" />
</head>

</body>
</html>
<?php require_once"sql_disconnect.php";?>
<?php require_once"footer.php";?>