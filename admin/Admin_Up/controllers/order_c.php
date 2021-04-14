<?php 
	// import model.
	include_once 'models/order_m.php';

	/**
	 * 
	 */
	class order_c extends order_m
	{
		
		private $order;	

		function __construct()
		{
			$this->order = new order_m();
		}

		 /*---------------getMember-----------------*/
	    public function getOrder()
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
	    			$result = $this->order->getOrder();
	    			// echo "<pre>";
	    			// print_r($result);
	    			// echo "</pre>";

	    			include 'views/orders/list_order.php';
	    			break;
	    	}
	    }
	}


 ?>