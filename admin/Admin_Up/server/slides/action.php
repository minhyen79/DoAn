<?php 
	// import controllers.
	include '../controllers/slide_c.php';
	$slide = new slide_c();

	/*-----------------------Add Slide--------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Add_Slide") {
		$title = $_POST['title'];
		$slider = $_FILES['slider']['name'];
		$slider_x = time().$slider;
		$slider_tmp = $_FILES['slider']['tmp_name'];
		$content = $_POST['content'];

		$result = $slide->addSlide($title,$content,$slider_x);

		if ($result) {
			move_uploaded_file($slider_tmp, "../../../../assets/images/sliders/".time().$slider);
			echo 1;
		}else {
			echo 0;
		}
	}


	/*---------------------------Select Id-----------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Select_Id") {
		$id = $_POST['id'];

		$result = $slide->getSlideId($id);

		echo json_encode($result);
	}

	/*--------------------------Update Slide----------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Update_Slide") {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$slider = $_FILES['slider']['name'];
		$slider_x = time().$slider;
		$slider_tmp = $_FILES['slider']['tmp_name'];
		$content = $_POST['content'];

		$result = $slide->updateSlide($id,$title,$content,$slider_x);

		if ($result) {
			echo 1;
			move_uploaded_file($slider_tmp, "../../../../assets/images/sliders/".time().$slider);
		}else {
			echo 0;
		}
	}

	/*--------------------------Delete Slide---------------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Delete_Slide") {
		$id = $_POST['id'];

		$result = $slide->delSlide($id);

		if ($result) {
			echo 1;
		}else {
			echo 0;
		}
	}

 ?>