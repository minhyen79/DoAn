<?php

	// import controllers.
	include '../controllers/rating_c.php';

	$rating 	= new rating_c();
	// $product 	= new product_c();

	if (isset($_POST['action']) && !empty($_POST['action'])) {

		$action = $_POST['action'];

		switch ($action) {

			// add-rating.
			case 'add-rating':
				/*
					*, Check rating exists or not.
						- (if it exists) 	=> I will update.
						- (if none exists)  => I will add.
				*/
				$idMember  = $_POST['id_member'];
				$idProduct = $_POST['id_product'];
				$score     = $_POST['rating'];

				$check     = $rating->checkRating($idProduct, $idMember);
				// (if it exists) 	=> I will update.
				if (is_array($check) && !empty($check)) {

					foreach ($check as $key => $val) {
						$idRating  = $val['id_rating'];
					}
					$update  = $rating->updateRating($idRating, $score);
					if ($update) {
						echo 'Thank you for rating';
					}
				// (if none exists)  => I will add.
				} else {
					$add     = $rating->addRating($idProduct, $idMember, $score);
					if ($add) {
						echo 'Thank you for rating';
					}
				}

				break;
				
			case 'show-rating':
				
				$id = $_POST['id'];
				$result = $rating->getRating_By_Id($id);

				if (is_array($result) && !empty($result)) {
					foreach ($result as $key => $item) {
						echo $rate = $item['topRating'];
					}
				} 
				break;

			default:
				// code...
				break;
		}
	}

?>
