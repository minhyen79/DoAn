<?php  

	// import model.
	include_once 'models/user_m.php';

	
	class user_c extends user_m
	{

	    private $user;

	    function __construct()
	    {
	        $this->user = new user_m();
	    }

	    
	    /*---------------getUser-----------------*/
	    public function getUser()
	    {

	    	if (isset($_GET['act'])) {
	    		$act = $_GET['act'];
	    	} else {
	    		$act = 'index';
	    	}

	    	switch ($act) {

	    		case 'logout':
	    			include_once 'views/users/logout.php';
	    			
	    			break;

	    		// CRUD by ajax jQuery. | thêm, sửa, xóa => tôi làm ở ajax jQuery(folder server).
	    		default:

	    			if (isset($_SESSION['role'])) {
		
						if ($_SESSION['role'] == 1) {

							$role 	= 1;
						} elseif ($_SESSION['role'] == 2) {
							
							$role  = 2;
						} elseif ($_SESSION['role'] == 3) {
							
							$role  = 3;

						} else {

							$role  = 0;
						}
					}
	    			// resut.
	    			$result = $this->user->getUser();

	    			include 'views/users/list-user.php';
	    			break;
	    	}
	    }
	}

?>