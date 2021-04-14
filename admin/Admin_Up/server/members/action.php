<?php  
	// import controllers.
	include '../controllers/member_c.php';
	$member = new member_c();

	/*-------------add Member----------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'add') {
		
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$phone 		= $_POST['phone'];
		$passw 		= $_POST['passw'];
		$address 	= $_POST['address'];

		$add = $member->addMember($name, $email, $phone, $passw, $address);
		if ($add) {
			echo 'you added successfully';
		}
	}

	/*-------------select Member----------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'select') {

		$id = $_POST['id'];
		// select.
		$selectMember = $member->getMember($id);
		echo json_encode($selectMember);
	}

	/*-------------update Member----------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'update') {
		
		$id 		= $_POST['id'];
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$phone 		= $_POST['phone'];
		$point 		= $_POST['point'];
		// $passw 		= $_POST['passw'];
		$address 	= $_POST['address'];
		$status 	= $_POST['status'];

		$update = $member->updateMember($id, $name, $email, $phone, $point, $status, $address);
		if ($update) {
			echo 'you updated successfully';
		}
	}

	/*-------------delete Member----------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'delete') {

		$id = $_POST['id'];

		$delete = $member->deleteMember($id);
		if ($delete) {
			echo 'you deleted successfully';
		}
	}


?>