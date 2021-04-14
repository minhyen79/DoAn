<?php 
	// import model.
	include_once 'models/rating_m.php';


	/**
	 * 
	 */
	class rating_c extends rating_m
	{
		
		private $rating;

		function __construct()
		{
			$this->rating = new rating_m();
		}

		/*---------------Get Rating-----------------*/
	    public function getRating()
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
	    			$result = $this->rating->getRating();
	    			// echo "<pre>";
	    			// print_r($result);
	    			// echo "</pre>";

	    			include 'views/ratings/list_rating.php';
	    			break;
	    	}
	    }
	}

 ?>