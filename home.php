<?php
	require_once"sql_connect.php";
	require_once"process_check_if_logged_in.php";
	require_once"header.php";
	$edit_url="edit_account.php";
	$edit_url=rawurlencode($edit_url);
	$info=mysql_fetch_assoc(mysql_query("select * from member where member_id={$_SESSION['member_id']};"));
?>

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