<?php 
	// import model
	include_once 'models/product_m.php';
	/**
	 * 
	 */
	class product_c extends product_m
	{
		private $product;	

		function __construct()
		{
			$this->product = new product_m();
		}

		
		/*-------------getOrder-------------*/
		public function getProduct()
		{
			
			if (isset($_GET['act'])) {
				
				$act = $_GET['act'];

			} else {

				$act = 'index';
			}

			switch ($act) {
				// case 'update':
				// 	$id = 
				// 	$update = $this->getProductId($id);
				// 	include_once 'views/products/update_product.php';
				// 	break;

					
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
								
					$result = $this->product->getProduct();

					$cate = $this->product->getCateforProduct();

					$brand = $this->product->getBrandforProduct();
					
					// load page view order.
					include_once 'views/products/list-product.php';
					break;
			}


		}
	}
 ?>