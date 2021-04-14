<?php 
	// import model.
	include_once 'models/subImage_m.php';


	/**
	 * 
	 */
	class subImage_c extends subImage_m
	{
		
		private $subImage;

		function __construct()
		{
			$this->subImage = new subImage_m();
		}

		/*---------------Get Sub Image-----------------*/
	    public function subImage()
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
	    			$result = $this->subImage->subImage();
	    			// echo "<pre>";
	    			// print_r($result);
	    			// echo "</pre>";

	    			$pro_sub = $this->subImage->getProforSubImg();
	    			// echo "<pre>";
	    			// print_r($pro_sub);
	    			// echo "</pre>";

	    			include 'views/sub_images/list_subImage.php';
	    			break;
	    	}
	    }
	}

 ?>