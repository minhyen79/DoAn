<?php  
	
	// import controllers.
	include '../controllers/product_c.php';
	$product = new product_c();

	if (isset($_POST['action']) && !empty($_POST['action'])) {
			
		$action = $_POST['action'];

		switch ($action) {
			// hiển thị ảnh liên quan sp.
			case 'by-related':
				$id 	= $_POST['id'];
				$result = $product->product_Img_Related($id);
				echo json_encode($result);
				break;
			
			default:
				// hiển thị thông tin và ảnh chính sp.
				$id 	= $_POST['id'];
				$result = $product->modalPro_ID($id);
				echo json_encode($result);
				break;
		}
	}

?>