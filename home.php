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
		<link rel="stylesheet" href="css/styles.css" />
			<style type="text/css" media="screen">
				 .bg{
				 background: url(temp/7.jpg) no-repeat;
				 width:100%;
				 height:666px;
				 display:block;
				}
			</style>
	</head>
    <body class = "bg">
		<?php
			if(isset($_SESSION['CHANGE_PW']) && $_SESSION['CHANGE_PW']==true){
				unset($_SESSION['CHANGE_PW']);
				echo "<script> TINY.box.show({url:'PopUpChangePassword.php',width:300,height:250}) </script>";
				
			}
		?>
		<div class = "log4">
			<?php echo "<h1>Welcome Back, ".$info['fullname']."<h1>";?>
		</div>
	</body>
	
</html>
	
