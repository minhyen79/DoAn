<?php 
	
	session_start();


	/*------------------check role---------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'check-role') {

		if (isset($_SESSION['role'])) {

			if ($_SESSION['role'] == 0) {
				
				echo "tài khoản bị khóa";

			} else {

				echo "oke";
				
			}
		}

	}

?>