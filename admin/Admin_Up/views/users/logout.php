<?php  
	
	unset($_SESSION['id_user']);
	unset($_SESSION['name']);

	header("Location: ../index.php");

?>