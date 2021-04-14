<?php 
	// import controllers.
	include '../controllers/cate_new_c.php';
	$cate_new = new cate_new_c();


	/*-----------------------Add Category News-----------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Add_Cate_News") {
		$name_cate = $_POST['name_cate'];

		$result = $cate_new->addCateNews($name_cate);

		if ($result) {
			echo "1";
		}else {
			echo "0";
		}
	}

	/*---------------------------Select Id Cate News--------------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Select_Id") {
		$id = $_POST['id'];

		$result = $cate_new->getCateNewsId($id);

		echo json_encode($result);
	}


	/*----------------------------Update Category News------------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Update_Cate_News") {
		$id = $_POST['id'];
		$name = $_POST['name'];

		$result = $cate_new->updateCateNews($id,$name);

		if ($result) {
			echo 1;
		}else {
			echo 0;
		}
	}

	/*-----------------------------Delete Category News----------------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Delete_Cate_News") {
		$id = $_POST['id'];

		$result = $cate_new->delCateNews($id);

		if ($result) {
			echo 1;
		}else {
			echo 0;
		}
	}

 ?>