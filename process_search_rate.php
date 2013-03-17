<?php require_once"sql_connect.php";?>
<?php require_once"header.php";?>

<html>
	<head>
	</head>
	
	<body>
	</body>
</html>
<?php
    $rate = $_GET['rate']; 

      
        $raw_results = mysql_query("SELECT * FROM service
            WHERE type_id in (SELECT type_id from type where rate<= $rate and classification!='SERVICE') group by type_id ") or die(mysql_error());
			echo "<div class = log4>
		<center><form class=form-2 method=get action=process_search_rate.php id=search>			
		  <input name=rate type=text size=50 value={$rate} pattern = '[0-9]*[0-9]*[0-9]' placeholder='Search By Rate' />
		</form></center>
		<div>";
        if(mysql_num_rows($raw_results) > 0){ 
            while($results = mysql_fetch_array($raw_results)){
				$type_array=mysql_query("select * from type where type_id={$results['type_id']}");
				$type=mysql_fetch_array($type_array);
				$count=mysql_fetch_array(mysql_query("select count(service_id) from service where type_id={$results['type_id']}"));
				
				echo "<figure><img src='images/{$type['image']}'/>";
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
				echo "<input id = mysubmit3 type=button onclick=window.location.href='add_reservation.php?type_id={$results['type_id']}' value=Reserve>";
				echo "</figcaption></figure>";
			}
             
        }
        else{ 
            echo "<center><span class = h1>No Results</span></center>";
        }
		
  ?>
<?php require_once"footer.php";?>