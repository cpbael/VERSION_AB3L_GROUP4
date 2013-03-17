<?php
	$conn=mysql_connect('localhost','root','');
	if(!$conn){
		die('Could not connect to database:'.mysql_error());
	}
	mysql_select_db('hrm',$conn);

	if (!$conn) {
				die('Could not connect to database: ' . mysql_error());
			}
?>

