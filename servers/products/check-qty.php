<?php  
	
	// import controllers.
	include '../controllers/product_c.php';
	$product = new product_c();

	if (isset($_POST['act']) && !empty($_POST['act'])) {
			
		$action = $_POST['act'];

		switch ($action) {
			// kiểm tra số lượng sp.
			case 'check-qty':

				$id = $_POST['id'];
				$result = $product->checkQuantity($id);
				
				foreach ($result as $key => $val) {
					$quantity = $val['quantity'];
					if ($quantity < 1) {
						echo 'empty';	
					} else {
						echo $quantity;
					}
				}

			default:
				
				break;
		}
	}

?>