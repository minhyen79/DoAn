<?php  

	// import model.
	include_once 'models/brand_m.php';

	
	class brand_c extends brand_m
	{

	    private $brand;

	    function __construct()
	    {
	        $this->brand = new brand_m();
	    }

	    
	    /*---------------getbrand-----------------*/
	    public function getBrand()
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
	    			$result = $this->brand->getBrand();

	    			include 'views/brands/list_brand.php';
	    			break;
	    	}
	    }
	}

?>