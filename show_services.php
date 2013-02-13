<?php require_once"header.php";?>
<?php require_once"sql_connect.php";?>
<?php
	$services_array=mysql_query("select * from service");
	$services=array();
	while($service_info=mysql_fetch_array($services_array)){
		$services[]=$service_info;
	}
	$i=0;
	$col=1;
	echo "<table>";
		while($i<count($services)){
			if($col==4){
				echo "<tr>";	
				$col=1;
			}
			$j=0;
			echo "<td><table id='service'>";
				echo "<tr><td><img id='itemImg' src='images/{$services[$i]['image']}'/></td></tr>";
				echo "<tr><td>{$services[$i]['service_name']}</td></tr>";
				echo "<tr><td>{$services[$i]['rate']}</td></tr>";
				echo "<tr><td>{$services[$i]['classification']}</td></tr>";
				echo "<tr><td>{$services[$i]['article']}</td></tr>";
				echo "<tr><td><a href='process_delete_service.php?service_id={$services[$i]['service_id']}'>Delete</a></td></tr>";
				echo "<tr><td><a href='edit_service.php?service_id={$services[$i]['service_id']}'>Edit</a></td></tr>";
			echo "</table></td>";
			if($col==4){
				echo "</tr>";	
				$col=1;
			}
			$i++;$col++;
		}
	echo "</table>";

?>


<?php require_once"sql_disconnect.php";?>
<?php require_once"footer.php";?>