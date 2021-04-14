<?php  

	// import model.
	include_once 'models/cate_new_m.php';

	
	class cate_new_c extends cate_new_m
	{

	    private $cate_new;

	    function __construct()
	    {
	        $this->cate_new = new cate_new_m();
	    }

	    
	    /*---------------getMember-----------------*/
	    public function getCateNews()
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
	    			$result = $this->cate_new->getCateNews();

	    			include 'views/cate_news/list_cate_news.php';
	    			break;
	    	}
	    }
	}

?>