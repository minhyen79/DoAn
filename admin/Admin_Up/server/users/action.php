<?php  
	// import controllers.
	include '../controllers/user_c.php';
	$user = new user_c();

	/*-------------add User----------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'add') {
		
		$name 		= $_POST['name'];
		$position 	= $_POST['position'];
		$email 		= $_POST['email'];
		$phone 		= $_POST['phone'];
		$passw 		= $_POST['passw'];
		$address 	= $_POST['address'];

		$add = $user->addUser($name, $position, $email, $phone, $passw, $address);
		if ($add) {
			echo 'you added successfully';
		}
	}

	/*-------------select User----------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'select') {

		$id = $_POST['id'];
		// select.
		$selectUser = $user->getUser($id);
		echo json_encode($selectUser);
	}

	/*-------------update User----------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'update') {
		
		$id 		= $_POST['id'];
		
		$name 		= $_POST['name'];
		$position 	= $_POST['position'];
		$email 		= $_POST['email'];
		$phone 		= $_POST['phone'];
		$passw 		= $_POST['passw'];
		$address 	= $_POST['address'];
		$status 	= $_POST['status'];

		$update = $user->updateUser($id, $name, $position, $email, $phone, $passw, $status, $address);
		if ($update) {
			echo 'you updated successfully';
		}
	}

	/*-------------delete User----------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'delete') {

		$id = $_POST['id'];

		$delete = $user->deleteUser($id);
		if ($delete) {
			echo 'you deleted successfully';
		}
	}


?>