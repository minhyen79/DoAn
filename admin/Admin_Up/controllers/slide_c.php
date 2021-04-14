<?php  

	// import model.
	include_once 'models/slide_m.php';

	
	class slide_c extends slide_m
	{

	    private $slide;

	    function __construct()
	    {
	        $this->slide = new slide_m();
	    }

	    
	    /*---------------getMember-----------------*/
	    public function getSlide()
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
	    			$result = $this->slide->getSlide();

	    			include 'views/slides/list_slide.php';
	    			break;
	    	}
	    }
	}

?>