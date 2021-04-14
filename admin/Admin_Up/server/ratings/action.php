<?php 
	// import controllers.
	include '../controllers/rating_c.php';
	$rating = new rating_c();

	/*----------------------Delete Rating------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Del_Rating") {
		$id = $_POST['id'];

		$result = $rating->delRating($id);

		if ($result) {
			echo 1;
		}else {
			echo 0;
		}
	}

 ?>