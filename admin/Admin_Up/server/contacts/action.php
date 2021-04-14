<?php 
	// import controllers.
	include '../controllers/contact_c.php';
	$contact = new contact_c();

	/*----------------------Delete Rating------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Del_Contact") {
		$id = $_POST['id'];

		$result = $contact->delContact($id);

		if ($result) {
			echo 1;
		}else {
			echo 0;
		}
	}

 ?>
