<?php
	require_once"header.php";
	require_once"sql_connect.php";
	require_once"process_check_if_logged_in.php";
	$edit_url="edit_account.php";
	$edit_url=rawurlencode($edit_url);
	$member_id=$_SESSION['member_id'];
	$info=mysql_fetch_assoc(mysql_query("select * from member where member_id={$member_id};"));
?>
<html>
    <head>
        <title>HOTEL 128</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

	</head>
    <body>

	</body>
	
</html>
	
