<?php require_once"header.php";?>
<?php require_once"sql_connect.php";?>
<?php
	$services_array=mysql_query("select * from service where type_id IN (SELECT type_id from type where classification='SERVICE')");
	$services=array();
	if(mysql_num_rows($services_array) > 0){ 
	while($service_info=mysql_fetch_array($services_array)){
		$services[]=$service_info;
	}
	$i=0;
	$col=1;
		echo "<div class=log4>
		
		<div>";
		while($i<count($services)){
			if($col==4){	
				$col=1;
			}
			$j=0;
				$type_array=mysql_query("select * from type where type_id={$services[$i]['type_id']}");
				$type=mysql_fetch_array($type_array);
				$count=mysql_fetch_array(mysql_query("select count(service_id) from service where type_id={$services[$i]['type_id']}"));
				
				echo "<figure><img src='images/{$type['image']}'/>";
				echo "<figcaption>";
				echo "<h1>{$services[$i]['service_name']}</h1>";
				//echo "<h1>{$type['type_name']}</h1>";				
				echo "<hr/>";
				//echo "{$services[$i]['classification']}";
				echo "{$type['article']}";
				echo "</figcaption></figure>";
			
			if($col==4){
				$col=1;
			}
			$i++;$col++;
		}
	echo "</div></div>";
	}
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