<?php  

	// import model.
	include_once 'models/category_m.php';

	
	class category_c extends category_m
	{

	    private $category;

	    function __construct()
	    {
	        $this->category = new category_m();
	    }

	    
	    /*---------------getMember-----------------*/
	    public function getCategory()
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
	    			$result = $this->category->getCategory();

	    			include 'views/categorys/list_category.php';
	    			break;
	    	}
	    }
	}

?>