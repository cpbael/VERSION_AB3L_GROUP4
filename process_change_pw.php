<?php
  require_once("sql_connect.php");
	session_start();
	$old=$_POST['old_pw'];
	$new=$_POST['new_pw'];
	$confirm=$_POST['confirm_pw'];
	$true_old=mysql_fetch_array(mysql_query("select * from member where member_id='{$_SESSION['member_id']}';"));
	if(md5($old)===$true_old['password']){
		if($new===$confirm){
			if(mysql_query("update member set password='md5({$confirm})' where member_id={$_SESSION['member_id']};")){
				echo "Success";
			}else{
				echo "Nagkaproblem";
			}
		}else{
			echo "abay tama-tamai ang password";
		}
	}else{
		echo "INPUT".md5($old);
		echo "<br/>";
		echo "DATI:".$true_old['password'];
	}
	
	require_once("sql_disconnect.php");
?>