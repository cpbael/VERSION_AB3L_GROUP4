<?php require_once"sql_connect.php";?>
<?php require_once"header.php";?>
<html>
	<head>
	<link rel="stylesheet" href="Style.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="PopUpStyle.css" />
	</head>
	
	<body>
	</body>
</html>
<?php
    $sdate = $_GET['avail_sdate']; 
	$edate = $_GET['avail_edate']; 
    
         
        //$query = htmlspecialchars($query); 
        //$query = mysql_real_escape_string($query);
         
        //$raw_results = mysql_query("SELECT * FROM reservation
        //    WHERE (start_date <= '".$query."' AND end_date >= '".$query."')") or die(mysql_error());
        $raw_results= mysql_query("SELECT * FROM service where (service_id NOT IN (SELECT service_id FROM reservation
            WHERE '{$sdate}' between start_date AND end_date) and service_id NOT IN (SELECT service_id FROM reservation
            WHERE '{$edate}'  between start_date AND end_date)) and (service_id NOT IN (SELECT service_id FROM reservation
            WHERE start_date between  '{$sdate}' AND  '{$edate}') and service_id NOT IN (SELECT service_id FROM reservation
            WHERE end_date between '{$sdate}' AND  '{$edate}')) and type_id IN (SELECT type_id from type where classification='ROOM' or classification='FACILITY') group by type_id");
        			echo "<div class = log4>
			<form  method=get action=process_search_availability.php id=search>
				<center>
				START:<input type=date name=avail_sdate value={$sdate} required placeholder=Search>
				END:<input type=date name=avail_edate value={$edate} required placeholder=Search>
				<input type=submit id = mysubmit5 value=Search />
			</center>
			</form>
		<div>";
		
            while($results = mysql_fetch_array($raw_results)){
				$type_array=mysql_query("select * from type where type_id={$results['type_id']}");
				$type=mysql_fetch_array($type_array);
                $count=mysql_fetch_array(mysql_query("select count(service_id) from service where (service_id NOT IN (SELECT service_id FROM reservation
            WHERE '{$sdate}' between start_date AND end_date) and service_id NOT IN (SELECT service_id FROM reservation
            WHERE '{$edate}'  between start_date AND end_date)) and (service_id NOT IN (SELECT service_id FROM reservation
            WHERE start_date between  '{$sdate}' AND  '{$edate}') and service_id NOT IN (SELECT service_id FROM reservation
            WHERE end_date between '{$sdate}' AND  '{$edate}')) and type_id ={$results['type_id']}"));
				
				echo "<figure><img src='images/{$type['image']}'/>";
				echo "<figcaption>";
				echo "<h1>{$type['type_name']}</h1>";
				if($type['classification']!='SERVICE')				
				echo "<span class=textWhite>RATE:</span>{$type['rate']}";
				//echo "{$services[$i]['classification']}";
				echo "<hr/>";
				echo "{$type['article']}";
				if($type['classification']!='SERVICE')
				echo"<h3>Available Rooms: {$count[0]}</h3>";
				echo "<input id = mysubmit3 type=button onclick=window.location.href='add_reservation.php?type_id={$results['type_id']}&start_date={$sdate}&end_date={$edate}' value=Reserve>";
				echo "</figcaption></figure>";
            }
             
       
         
    

?>
<?php require_once"footer.php";?>