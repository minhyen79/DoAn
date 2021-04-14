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

	    
	    /*---------------getbrand-----------------*/
	    public function getContact()
	    {

	    	if (isset($_GET['act'])) {
	    		$act = $_GET['act'];
	    	} else {
	    		$act = 'index';
	    	}

	    	switch ($act) {
	    		
	    		// CRUD by ajax jQuery. | thêm, sửa, xóa => tôi làm ở ajax jQuery(folder server).
	    		default:

	    			if (isset($_SESSION['role'])) {
		
						if ($_SESSION['role'] == 1) {

							$role = 1;
						} elseif ($_SESSION['role'] == 2) {
							
							$role = 2;
						} elseif ($_SESSION['role'] == 3) {
							
							$role = 3;

						} else {

							$role = 0;
						}
					}

	    			//result.
	    			$result = $this->contact->getContact();
	    			// echo "<pre>";
	    			// print_r($result);
	    			// echo "</pre>";

	    			include 'views/contacts/list_contact.php';
	    			break;
	    	}
	    }
	}

?>