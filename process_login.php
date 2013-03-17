 <?php
	require_once("sql_connect.php");
	session_start();
	if(isset($_POST['login'])){
		//Member
		$result = mysql_query("SELECT * FROM member");
		while($row = mysql_fetch_array($result)){
			if($_POST['username']==$row['uname'] && md5($_POST['pwdconfirm'])==$row['password']){
				$_SESSION['login']=1;
				$_SESSION['member_id']=$row['member_id'];
				echo "OKay";
				header('Location: home.php');
				require_once("sql_disconnect.php");
				exit;
			}
		}
		
		//Admin
		// $result = mysql_query("SELECT * FROM admin");
		// $row = mysql_fetch_array($result);
		// if($_POST['username']==$row['username'] && md5($_POST['pwdconfirm'])==$row['password']){
				// $_SESSION['login']=1;
				// header('Location: admin.php');
				// require_once("sql_disconnect.php");
				// exit;
		// }
		
		$_SESSION['login_msg']='Username or password incorrect';
		$_SESSION['login'] =-1;
		header("Location:login.php");
	}
	else{			echo "Not OKay";}
	
?>
