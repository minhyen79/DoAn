<?php  

	// import model.
	include_once 'models/contact_m.php';

	
	class contact_c extends contact_m
	{
	    
	    private $contact;

	    function __construct()
		{
			$this->contact = new contact_m();
		}


		// trang liên hệ
		public function show()
		{
			if (isset($_POST['sm_contact'])) {
				$name 		= $_POST['name_contact'];
				$email 		= $_POST['email_contact'];
				$phone 		= $_POST['phone_contact'];
				$message 	= $_POST['message_contact'];
				$contact    = '';
				
				$check = $this->contact->checkContact($email,$phone);
				// Đã tồn tại thông tin.
				if (count($check) == 1) {

					foreach ($check as $key => $contact) {
						$id 	= $contact['id_contact'];
						$update = $this->contact->updateContact($id,$message); 

						if ($update) {
							$contact = 'oke';
						}
					}
				} else {
					$add = $this->contact->addContact($name,$email,$phone,$message);
					if ($add) {
						$contact = 'oke';
					}
				}

			}
			include_once 'views/contacts/show-contact.php';
		}

	}
?>