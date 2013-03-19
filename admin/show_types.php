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
		echo "<div class=log5><table>";
		while($i<count($services)){
			if($col==4){	
				echo "<tr>";	
				$col=1;
			}
			$j=0;
				$type_array=mysql_query("select * from type where type_id={$services[$i]['type_id']}");
				$type=mysql_fetch_array($type_array);
				$count=mysql_fetch_array(mysql_query("select count(service_id) from service where type_id={$services[$i]['type_id']}"));
				
			echo "<td><table>";
				echo "<tr><td style='height:100px; width:300px;'><center><img id='itemImg' src='../images/{$type['image']}'/></center></td></tr>";
				echo "<tr><td class = textBluer><hr/><h1>{$type['type_name']}</h1></td></tr>";				
				echo "<tr><td class = textBlack><h2>RATE: {$type['rate']}</h2></td></tr>";
				//echo "<tr><td class = textBlack  style='height:50px; width:310px;'>{$types[$i]['article']}</td></tr>";
				echo"<tr><td class = textBlack><h2>NO. OF ROOMS: {$count[0]}</h2></td></tr>";
				echo "<tr><td><hr/><center><input id = mysubmit3 type=button onclick=window.location.href='add_reservation.php?type_id={$services[$i]['type_id']}' value='Reserve'></center></td></tr><br/>";
				echo "</table></td>";
			
			if($col==4){
				echo "</tr>";	
				$col=1;
			}
			$i++;$col++;
		}
	echo "</table></center></div>";
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