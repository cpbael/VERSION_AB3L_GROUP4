<?php
  session_start();

	if(strcmp($_POST['pwd'], $_POST['pwdconfirm'])!=0){
			$_SESSION['ERROR']=true;
			$_SESSION['ERRORMSG']="*PASSWORD DOES NOT MATCH";
	}else{
		require_once("sql_connect.php");
		
		$query="SELECT * from member";
		
		$result=mysql_query($query);
		while($row = mysql_fetch_array($result)){
			if($_POST['username']==$row[1]){
				$_SESSION['ERROR']=true;
				$_SESSION['ERRORMSG']="*USERNAME NOT AVAILABLE";
				break;
			}else
				$_SESSION['ERROR']=false;	
		}
		if($_SESSION['ERROR']==false){
		
			$uname=$_POST['username'];
			$password=md5($_POST['pwd']);
			$fullname=$_POST['firstname']." ".$_POST['l	astname'];
			$contactno=(int)$_POST['contact'];
			$eadd=$_POST['eadd'];
			//$creditcardno=$_POST['creditcardno1']."".$_POST['creditcardno2']."".$_POST['creditcardno3']."".$_POST['creditcardno4'];
			$query = "INSERT INTO member (uname, password, fullname, contactno, eadd) VALUES ('$uname', '$password', '$fullname', '$contactno', '$eadd')";
			
			$result = mysql_query($query);
	
			if (!$result) {
				$_SESSION['ERROR']=true;
			}else{
				$_SESSION['ERROR']=false;
				$_SESSION['MSG']="SIGN-UP SUCCESSFUL!";
			}
		}
		
	}
	if($_SESSION['ERROR']==true){
		$_SESSION['member_id']=mysql_insert_id();
		$_SESSION['username']=$_POST['username'];
		$_SESSION['firstname']=$_POST['firstname'];
		$_SESSION['lastname']=$_POST['lastname'];
		$_SESSION['contact']=(int)$_POST['contact'];
		$_SESSION['eadd']=$_POST['eadd'];
	//	$_SESSION['creditcardno1']=$_POST['creditcardno1'];
	//	$_SESSION['creditcardno2']=$_POST['creditcardno2'];
	//	$_SESSION['creditcardno3']=$_POST['creditcardno3'];
	//	$_SESSION['creditcardno4']=$_POST['creditcardno4'];
	}	
	
	mysql_close($conn);
	header("LOCATION:home.php"); 
?>
