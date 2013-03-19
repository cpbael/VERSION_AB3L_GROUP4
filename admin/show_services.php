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
		echo "<div class=log5><table>";
		while($i<count($types)){
			if($col==4){	
				echo "<tr>";	
				$col=1;
			}
			$j=0;
				$count=mysql_fetch_array(mysql_query("select count(service_id) from service where type_id={$types[$i]['type_id']}"));
			echo "<td><table>";
				echo "<tr><td style='height:100px; width:300px;'><center><img id='itemImg' src='../images/{$types[$i]['image']}'/></center></td></tr>";
				echo "<tr><td class = textBluer><hr/><h1>{$types[$i]['type_name']}</h1></td></tr>";				
				echo "<tr><td class = textBlack><h2>RATE: {$types[$i]['rate']}</h2></td></tr>";
				//echo "<tr><td class = textBlack  style='height:50px; width:310px;'>{$types[$i]['article']}</td></tr>";
				echo"<tr><td class = textBlack><h2>NO. OF ROOMS: {$count[0]}</h2></td></tr>";
				
				echo "<tr><td><hr/><center><input id = mysubmit3 type=button onclick=window.location.href='show_type.php?type_id={$types[$i]['type_id']}' value='View Services'></center></td></tr><br/>";
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
</head>

</body>
</html>
<?php require_once"sql_disconnect.php";?>
<?php require_once"footer.php";?>