 <?php
  session_start();
	$link = mysql_connect('localhost', 'root', '');
		if (!$link) {
			die('Could not connect to mysql: ' . mysql_error());
		}else{
			$db = mysql_select_db("hrm", $link); 
		
			if (!$db) {
				die('Could not connect to database: ' . mysql_error());
			}
		}
	if(isset($_POST['login'])){
		//Member
		$result = mysql_query("SELECT * FROM member");
		while($row = mysql_fetch_array($result)){
			if($_POST['middleinitial']==$row['uname'] && md5($_POST['pwdconfirm'])==$row['password']){
				$_SESSION['login']=1;
				$_SESSION['member_id']=$row['member_id'];
				header('Location: home.php');
				exit;
			}
		}
		
		//Admin
		$result = mysql_query("SELECT * FROM admin");
		$row = mysql_fetch_array($result);
		if($_POST['middleinitial']==$row['username'] && md5($_POST['pwdconfirm'])==$row['password']){
				$_SESSION['login']=1;
				header('Location: admin.php');
				exit;
		}
	}
	
	mysql_close($link);
?>
