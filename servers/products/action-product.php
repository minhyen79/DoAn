<?php  
	
	session_start();

	// import controllers.
	include '../controllers/product_c.php';
	$product = new product_c();

	if (isset($_POST['action']) && !empty($_POST['action'])) {
			
		$action = $_POST['action'];

		switch ($action) {
			// thêm dơn lẻ sp vào giỏ.
			case 'by-single':
				$id         = $_POST['id'];
		        $quantity   = $_POST['quantity']; // số lượng còn tồn trong kho.
		        $result     = $product->getPro_ID($id); // array Single Product by ID.
		        
		        if (!isset($_SESSION['cart1998']) && empty($_SESSION['cart1998'])) {
		            $_SESSION['cart1998'][$id] = $result;
		            $_SESSION['cart1998'][$id]['qty'] = 1;
		        } else {
		            if (array_key_exists($id, $_SESSION['cart1998'])) {
		                if ($_SESSION['cart1998'][$id]['qty'] < $quantity) {
		                    $_SESSION['cart1998'][$id]['qty'] += 1;
		                }
		            } else {
		                $_SESSION['cart1998'][$id] = $result;
		                $_SESSION['cart1998'][$id]['qty'] = 1;
		            }
		        }
		        echo 1;
		        break;


		    // Thêm vào giỏ hàng với số lượng nhiều tùy chỉnh.
		   	case 'by-multiple':
		   			$id        = $_POST['id'];
			    	$qty       = $_POST['qty'];
			        $quantity  = $_POST['quantity'];
			    	$result    = $product->getPro_ID($id); // array Single Product by ID.

			    	if (!isset($_SESSION['cart1998']) && empty($_SESSION['cart1998'])) {
			            $_SESSION['cart1998'][$id] = $result;
						$_SESSION['cart1998'][$id]['qty'] = $qty; // đây là số lượng khách mua.
			        } else {
			            if (array_key_exists($id, $_SESSION['cart1998'])) {
			                if ($_SESSION['cart1998'][$id]['qty'] < $quantity) {
			                    $_SESSION['cart1998'][$id]['qty'] += $qty;
			                }
			            } else {
			                $_SESSION['cart1998'][$id] = $result;
						    $_SESSION['cart1998'][$id]['qty'] = $qty;
			            }
			        }
			        echo 1;
		   		break;

		   	// Thêm vào giỏ hàng với tất cả số lượng hiện có trong kho.
		   	case 'get-all':
		   		$id        = $_POST['id'];
		    	$qty       = $_POST['qty'];
		        $quantity  = $_POST['quantity'];
		    	$result    = $product->getPro_ID($id); // array Single Product by ID.

		    	if (!isset($_SESSION['cart1998']) && empty($_SESSION['cart1998'])) {
		            $_SESSION['cart1998'][$id] = $result;
					$_SESSION['cart1998'][$id]['qty'] = $qty; // đây là số lượng khách mua.
		        } else {
		            if (array_key_exists($id, $_SESSION['cart1998'])) {
		                if ($_SESSION['cart1998'][$id]['qty'] < $quantity) {
		                    $_SESSION['cart1998'][$id]['qty'] += $qty;
		                }
		            } else {
		                $_SESSION['cart1998'][$id] = $result;
					    $_SESSION['cart1998'][$id]['qty'] = $qty;
		            }
		        }
		        echo 1;
		   		break;

		   	// Xóa sản phẩm khỏi giỏ hàng.
		   	case 'delete-cart':
		   		if (isset($_SESSION['cart1998']) && !empty($_SESSION['cart1998'])) {

		            $id = $_POST['id'];
		            unset($_SESSION['cart1998'][$id]);
				    echo 1;
			    }
		   		break;

		   	// Đối với trường hợp số lượng sản phẩm nhỏ hơn 1.
		   	case 'update-cart-err':
		   		if (isset($_SESSION['cart1998']) && !empty($_SESSION['cart1998'])) {

		            $id         = $_POST['id'];
            		$qty       	 = $_POST['qty'];

		            if ($qty < 1) {
		                unset($_SESSION['cart1998'][$id]);
		                echo 1;

		            } 
			    }
		   		break;

		   	// Cập nhật giỏ hàng.
		   	case 'update-cart':
		   		if (isset($_SESSION['cart1998']) && !empty($_SESSION['cart1998'])) {

		   			$id         = $_POST['id'];
			        $qty        = $_POST['qty'];
			        $quantity   = $_POST['quantity'];

			        if ($qty <= $quantity) { // nếu khách hàng nhập vào nhỏ hơn hoặc bằng sản phẩm tồn kho thì được!.
			            $_SESSION['cart1998'][$id]['qty'] = $qty;
			            echo 1;
			        } else { // th khách hàng nhập số lượng lớn hơn hàng tồn kho.
			            echo 0;
			        } 
		   		}
		   		break;

			default:
				
				break;
		}
	}

?>
		