<?php
	require_once"sql_connect.php";
	if(mysql_fetch_array(mysql_query("select * from member where uname='ako';"))){
		echo "meron";
	}else{
		echo "wala";
	}
	//var_dump($result);
	require_once"sql_disconnect.php";
	

?>