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

<<<<<<< HEAD
	</body>
	
</html>
	
=======
	<h1>Welcome to HRM</h1>
			WELCOME! <a href="process_logout.php">Logout</a> <br/>
			<?php
				foreach($info as $key=>$value){
					echo "{$key} : {$value} <br/>";
				}
//<<<<<<< HEAD
// =======
				//echo "<pre>".var_dump($_SE	SSION['member'])."</pre>";
				//echo "<pre>".var_dump($info)."</pre>";
// >>>>>>> fbf72d7a12c94ba3ce72ef9ff64b3cdf47840d89
			?>
			<a href="<?php echo $edit_url;?>">Edit Account</a>
	<br/>		
<?php require_once"footer.php";?>
>>>>>>> fc5abc10c80b15a4bb050166b98d899473f7a9f3
