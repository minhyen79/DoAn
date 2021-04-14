<?php 
	// import controllers.
	include '../controllers/brand_c.php';
	$brand = new brand_c();

	/*------------------Add Brand---------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Add Brand') {
		$name = $_POST['name'];

		$result = $brand->addBrand($name);

		if ($result) {
			echo "1";
		}
	}

	/*-------------------------Get Brand Id--------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Edit Brand') {
		$id = $_POST['id'];

		$result = $brand->getBrandId($id);

		echo json_encode($result);

	}

	/*------------------------Update Brand------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Update Brand') {
		$id = $_POST['id'];
		$name = $_POST['name'];

		$result= $brand->updateBrand($id,$name);

		if ($result) {
			echo "1";
		}
	}

	/*-------------------------Delete Category--------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Delete Brand') {
		$id = $_POST['id'];

		$result = $brand->delBrand($id);

		if ($result) {
			echo "1";
		}
	}


 ?>