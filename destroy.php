<?php
	// if(!isset($_SESSION[name]))
	// {
	// 	header('Location:login.php');
	// }

	if($_GET[id] > 0){
		$q = "DELETE FROM events WHERE id = $_GET[id]";
		$r = mysqli_query($dbc, $q);
		header('Location:index.php');
	}
	else{
		header('Location:login.php');
	}

?>