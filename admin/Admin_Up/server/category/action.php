<?php 
	// import controllers.
	include '../controllers/category_c.php';
	$category = new category_c();


	/*------------------Add Category---------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Add Category') {
		$name = $_POST['name'];

		$result = $category->addCategory($name);

		if ($result) {
			echo "1";
		}
	}


	/*-------------------------Get Category Id--------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Edit Category') {
		$id = $_POST['id'];

		$result = $category->getCategoryId($id);

		echo json_encode($result);

	}

	/*------------------------Update Category------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Update Category') {
		$id = $_POST['id'];
		$name = $_POST['name'];

		$result= $category->updateCategory($id,$name);

		if ($result) {
			echo "1";
		}
	}

	/*-------------------------Delete Category--------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Delete Category') {
		$id = $_POST['id'];

		$result = $category->delCategory($id);

		if ($result) {
			echo "1";
		}
	}




?>

