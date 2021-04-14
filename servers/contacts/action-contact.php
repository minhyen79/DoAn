<?php  
	
	// import controllers.
	include_once '../controllers/contact_c.php';
	$contact = new contact_c();
	
	if (isset($_POST['action']) && $_POST['action'] == 'contact-md') {
		$name 	= $_POST['name'];
		$email 	= $_POST['email'];
		$phone 	= $_POST['phone'];
		$note 	= $_POST['note'];


		// Kiểm tra xem email hay sốdt đã tồn tại chưa?
		// nếu tồn tại => Update.
		// Chưa        => thêm mới.
		$check = $contact->checkContact($email,$phone);	

		// Đã tồn tại thông tin.
		if (count($check) == 1) {
			foreach ($check as $key => $item) {
				$id 	= $item['id_contact'];
				$update = $contact->updateContact($id,$note); 

				if ($update) {
					echo 1;
				}
			}
		} else {
			$add = $contact->addContact($name,$email,$phone,$note);
			if ($add) {
				echo 1;
			}
		}
	}
	
?>