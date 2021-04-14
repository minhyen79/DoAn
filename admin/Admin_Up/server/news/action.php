<?php 
	// import controllers.
	include '../controllers/new_c.php';
	$new = new new_c();
	$cate_news = new new_c();
	$user_news = new new_c();

	/*--------------------------Delete News-----------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Delete_News") {
		$id = $_POST['id'];

		$result = $new->delNews($id);

		if ($result) {
			echo 1;
		}else {
			echo 0;
		}
	}

?>