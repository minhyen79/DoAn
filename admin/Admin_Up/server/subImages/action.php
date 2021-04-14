<?php 
 	session_start();
	// import controllers.
	include '../controllers/subImage_c.php';
	$subImage = new subImage_c();

	/*------------------Add Sub Image---------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Add_sub_Imgae') {
		$id = $_POST['id'];
		$sub_image = $_FILES['sub_image']['name'];
		$sub_image_x = time().$sub_image;
		$sub_image_tmp = $_FILES['sub_image']['tmp_name'];

		$result = $subImage->addSubImage($id,$sub_image_x);

		if ($result) {
			echo 1;
			move_uploaded_file($sub_image_tmp, '../../../../assets/images/products-childen/'.time().$sub_image);
		}else {
			echo 0;
		}
	}

	/*--------------------------Select Sub Image ID--------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == 'Select_Id') {
		$id = $_POST['id'];
		$result = $subImage->getSubImageId($id);
		$pro_img = $subImage->getProforSubImg($id);

		foreach ($result as $key => $image) {
?>
				
				<form action="" class="parsley-examples form-update-category" enctype="multipart/form-data" data-parsley-validate="" novalidate="" method="POST">
                    
                    <div class="form-group">
                        <label for="emailAddress-update">Main Product<span class="text-danger">*</span></label>
                        <?php 
                        		foreach ($pro_img as $key => $pro) {
                        	?>
                        		<input type="text" class="form-control main_products" id="<?php echo $pro['id_product']; ?>" value="<?php echo $pro['product_name']; ?>" readonly>
                        	<?php
                        		}
                         ?>
                        

                    </div>

                    <div class="form-group">
                        <label for="emailAddress-update">Sub Image<span class="text-danger">*</span></label>
                        <input type="file" class="form-control sub_images" value="<?php echo $image['sub_image'] ?>" accept="image/png, image/jpg, image/jpeg" name="">
                    </div>

                    <div class="form-group text-right mb-0">
                        <button id="<?php echo $image['id_detail_image'] ?>" class="btn btn-primary waves-effect waves-light mr-1 md_update_subImage" type="submit">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect cancel-category-news">
                            Cancel
                        </button>
                    </div>
                </form>

<?php
		}

	}

	/*--------------------------Update Sub Image-----------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Update_SubImage") {
		$id = $_POST['id'];
		$main_product = $_POST['main_product'];
		$sub_img = $_FILES['sub_img']['name'];
		$sub_image_x = time().$sub_img;
		$sub_image_tmp = $_FILES['sub_img']['tmp_name'];

		$result = $subImage->updateSunImage($id,$main_product,$sub_image_x);

		if ($result) {
			echo 1;
			move_uploaded_file($sub_image_tmp, '../../../../assets/images/products-childen/'.time().$sub_img);
		}else {
			echo 0;
		}
	}


	/*--------------------------Delete Sub Image-----------------------------*/

	if (isset($_POST['action']) && $_POST['action'] == "Delete_SubImage") {
		$id = $_POST['id'];

		$result = $subImage->delSubImage($id);

		if ($result) {
			echo 1;
		}else {
			echo 0;
		}
	}

 ?>