<html>
		<script type="text/javascript" src="javascript.js"></script>
	<body>
			<form class="form-2" action = "" name = "add" method="post">
					<center>
					<?php
						session_start();
						if((isset($_SESSION['popUp']))){
						echo'<tr>
								<td colspan = "2" class = "loginBottom3"><span class = "textBluer">';
								echo $_SESSION['popUp'];
								echo'</span></td>';
						echo	'</tr>';
							}
						unset($_SESSION['popUp']);
					?>
					<br/>
					<br/>
					<center><input class = "signUP" type = "button" onclick="window.location.href='confirm_reservation.php'" value="Confirm?"></center>
					</center>
			</form>​​

	</body>
</html>