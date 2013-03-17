<?php require_once"header.php";?>
<?php require_once"sql_connect.php";?>
			
		<form action="" method="post">
			  <input type="date" name="start_date" value="" min="<?php echo date('Y-m-d')?>" required>
			  <input type="submit" value="Search" id="search_button"/>
		</form>
