<?php 
    session_start();

    // import controllers.
    include_once '../controllers/product_c.php';
    $product = new product_c();


    if (isset($_POST['action']) && !empty($_POST['action'])) {
    	
    	$action = $_POST['action'];

    	switch ($action) {

    		case 'add-Wishlist':
    			$id     = $_POST['id'];
		        $result = $product->getPro_ID($id);
		        
		        if (!isset($_SESSION['wishlist']) && empty($_POST['wishlist'])) {
		            $_SESSION['wishlist'][$id] = $result;
		            $_SESSION['wishlist'][$id]['wishlist'] = 1;
		        } else {
		            if (array_key_exists($id, $_SESSION['wishlist'])) {
		                $_SESSION['wishlist'][$id]['wishlist'] += 1;
		            } else {
		                $_SESSION['wishlist'][$id] = $result;
		                $_SESSION['wishlist'][$id]['wishlist'] = 1;
		            }
		        }
		       echo 'wishlist successfully!';
    			break;

    		case 'remove-wishlist':
    			if (isset($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) {
					$id = $_POST['id'];
					unset($_SESSION['wishlist'][$id]);
					echo 'remove wishlist successfully';
				}
    			break;
    			
    		default:
    			// code...
    			break;
    	}
    }


?>