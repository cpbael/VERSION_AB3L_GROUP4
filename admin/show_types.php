<?php require_once"header.php";?>
<?php require_once"sql_connect.php";?>
<?php
	$services_array=mysql_query("select * from service group by type_id");
	$services=array();
	while($service_info=mysql_fetch_array($services_array)){
		$services[]=$service_info;
	}
	$i=0;
	$col=1;
		echo "<div class=log4>
		<center><form class=form-2 method=get action=process_search_rate.php id=search>			
		  <input name=query type=text size=50 pattern = '[0-9]*[0-9]*[0-9]' placeholder='Search By Rate' />
		</form></center>
		<div>";
		while($i<count($services)){
			if($col==4){	
				$col=1;
			}
			$j=0;
				$type_array=mysql_query("select * from type where type_id={$services[$i]['type_id']}");
				$type=mysql_fetch_array($type_array);
				$count=mysql_fetch_array(mysql_query("select count(service_id) from service where type_id={$services[$i]['type_id']}"));
				
				echo "<figure><img src='../images/{$type['image']}'/>";
				echo "<figcaption>";
				//echo "<h1>{$services[$i]['service_name']}</h1>";
				echo "<h1>{$type['type_name']}</h1>";				
				echo "<span class=textWhite>RATE:</span>{$type['rate']}<hr/>";
				//echo "{$services[$i]['classification']}";
				echo "{$type['article']}";
				echo"<h3>No. of Rooms: {$count[0]}</h3>";
				
				//echo "<br/><a id=mysubmit href='process_delete_service.php?service_id={$services[$i]['service_id']}'>Delete</a>";
				//echo "<a id=mysubmit href='edit_service.php?service_id={$services[$i]['service_id']}'>Edit</a>";
				//echo "<span onclick='TINY.box.show({url:'add_reservation.php?service_id={$services[$i]['service_id']}',width:300,height:150}')><a href='#'>RESERVE</a></span>";
				//echo "<a href='add_reservation.php?service_id={$services[$i]['service_id']}'>RESERVE</a>";
				echo "<input id = mysubmit3 type=button onclick=window.location.href='add_reservation.php?type_id={$services[$i]['type_id']}' value='Reserve'>";
				echo "</figcaption></figure>";
			
			if($col==4){
				$col=1;
			}
			$i++;$col++;
		}
	echo "</div></div>";
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