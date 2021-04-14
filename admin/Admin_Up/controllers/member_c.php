<?php  

	// import model.
	include_once 'models/member_m.php';

	
	class member_c extends member_m
	{

	    private $member;

	    function __construct()
	    {
	        $this->member = new member_m();
	    }

	    
	    /*---------------getMember-----------------*/
	    public function getMember()
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

							$role 	= 1;
						} elseif ($_SESSION['role'] == 2) {
							
							$role  = 2;
						} elseif ($_SESSION['role'] == 3) {
							
							$role  = 3;

						} else {

							$role  = 0;
						}
					}

	    			//result.
	    			$result = $this->member->getMember();

	    			include 'views/members/list-member.php';
	    			break;
	    	}
	    }
	}

?>