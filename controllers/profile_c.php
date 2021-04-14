<?php  
	
	// import models.
	include_once 'models/profile_m.php';

	
	class profile_c extends profile_m
	{
	   	
	   	private $profile;

	    function __construct()
	    {
	        $this->profile = new profile_m();
	    }


	    // hiển thị trang cá nhân.
	    public function show()
	    {

	    	if (isset($_GET['act'])) {
	    		$act = $_GET['act'];	
	    	} else {
	    		$act = 'avatar';
	    	}

	    	// get ID.
    		if (isset($_GET['id'])) {
    			$id = (int)$_GET['id'];
    				
    		}

	    	// Các nhánh con là views.
	    	switch ($act) {

	    		case 'don-hang':
	    			$index  = 1;
	    			$result	= $this->profile->getAllOrder_IDmember($id);
	    			
	    			include_once 'views/profiles/profile-order.php';
	    			break;

	    		case 'cap-nhat-dia-chi':
	    			$index  = 2;
	    			if (isset($_POST['sm-update-profile'])) {
	    				$address = $_POST['inp-update-profile'];
	    				$update = $this->profile->updateAddress($id,$address);
	    				if ($update) {
	    				 	$_SESSION['noti'] = 1;
	    				} 
	    			}
	    			include_once 'views/profiles/profile-update.php';
	    			break;
	    		
	    		case 'doi-mat-khau':
	    			$index = 3;

	    			include_once 'views/profiles/profile-change.php';
	    			break;

	    		case 'dang-xuat':
	    			$index = 4;

	    			include_once 'views/profiles/profile-logout.php';
	    			break;

	    		default:
	    			$index = 0;
	    			$result = $this->profile->showAvatar_Id($id);

	    			include_once 'views/profiles/profile-avatar.php';
	    			break;
	    	}
	    	// Đây là layout.
	    	include_once 'views/profiles/profile.php';
	    }
	}

?>