<?php 
	// import controllers.
	include '../controllers/product_c.php';
	include '../controllers/category_c.php';
	include '../controllers/brand_c.php';
	$product = new product_c();
	$brand = new brand_c();
	$category = new category_c();


	if (isset($_POST['action']) && !empty($_POST['action'])) {
		
		$action = $_POST['action'];

		switch ($action) {

			// Add_Product
			case 'Add_Product':
				$name = $_POST['name_product'];
				$category = $_POST['category'];
				$brand = $_POST['brand'];
				$origin = $_POST['origin'];
				$main_img = $_FILES['main_img']['name'];
				$main_img_x = time().$main_img;
				$main_img_tmp = $_FILES['main_img']['tmp_name'];
				$second_img = $_FILES['second_img']['name'];
				$second_img_x = time().$second_img;
				$second_img_tmp = $_FILES['second_img']['tmp_name'];
				$price = $_POST['price'];
				$quantity = $_POST['quantity'];
				$mass = $_POST['mass'];
				$classify = $_POST['classify'];
				$sale = $_POST['sale'];
				$price_sale = $_POST['price_sale'];
				$desr = $_POST['desr'];


				$result = $product->addProduct($name,$category,$brand,$origin,$main_img_x,$second_img_x,$price,$quantity,$mass,$desr,$classify,$sale,$price_sale);
				if ($result) {
					move_uploaded_file($main_img_tmp, "../../../../assets/images/products/".time().$main_img);
					move_uploaded_file($second_img_tmp, "../../../../assets/images/hl-products/".time().$second_img);
					echo "Add_Product";
				}else {
					echo "Thêm thất bại";
				}

				break;

			case 'Select':
				// select product.
				$id = $_POST['id'];
				$getProId = $product->getProductId($id);
				
				foreach ($getProId as $key => $val) {
?>
			<form action="" method="POST" role="form" id="forms_md_user" enctype="multipart/form-data">
				<div id="show_form_add">
					<div class="form-group">
						<label for="">Name product:</label>
						<input type="text" required="" name="" class="form-control name_pro" value="<?php echo $val['product_name'] ?>">
					</div>
					<div class="form-group">
						<label for="">Category:</label>
						<select class="form-control cate">
							<?php 
							$cate_select = $category->getCategory();
							foreach ($cate_select as $key => $val_cate) {
								?>
								<option <?php if ($val['id_category'] == $val_cate['id_category']) {echo "selected";} ?> value="<?php echo $val_cate['id_category']; ?>"><?php echo $val_cate['name_cate']; ?></option>
								<?php
							}
							?>

						</select>
					</div>
					<div class="form-group">
						<label for="">Brand:</label>
						<select class="form-control brands">
							<?php 
							$brand_select = $brand->getBrand();
							foreach ($brand_select as $key => $val_brand) {
								?>

								<option <?php if ($val['id_brand'] == $val_brand['id_brand']) {echo "selected";} ?> value="<?php echo $val_brand['id_brand'] ?>"><?php echo $val_brand['brand_name']; ?></option>

								<?php
							}
							?>

						</select>
					</div>
					<div class="form-group">
						<label for="">Origin:</label>
						<input type="text" required="" class="form-control origin_pro" value="<?php echo $val['origin'] ?>">
					</div>
					<div class="form-group">
						<label for="">Main image:</label>
						<input type="file" required="" accept="image/png, image/jpg, image/jpeg" class="form-control main_image" value="">
					</div>
					<div class="form-group">
						<label for="">Second image:</label>
						<input type="file" required="" accept="image/png, image/jpg, image/jpeg" class="form-control second_image" value="">
					</div>
					<div class="form-group">
						<label for="">Price:</label>
						<input type="number" required="" min="0" class="form-control price_pro" value="<?php echo $val['price'] ?>">
					</div>
					<div class="form-group">
						<label for="">Quantity:</label>
						<input type="number" required="" min="0" class="form-control quantity_pro" value="<?php echo $val['quantity'] ?>">
					</div>
					<div class="form-group">
						<label for="">Mass:</label>
						<input type="text" required="" class="form-control mass_pro" value="<?php echo $val['mass'] ?>">
					</div>
					<div class="form-group">
						<label for="">Classify:</label>
						<input type="text" required="" class="form-control classify_pro" value="<?php echo $val['classify'] ?>">
					</div>
					<div class="form-group">
						<label for="">Sale:</label>
						<input type="text" required="" class="form-control sale_pro" value="<?php echo $val['sale'] ?>">
					</div>
					<div class="form-group">
						<label for="">Price sale:</label>
						<input type="number" required="" min="0" class="form-control price_sales" value="<?php echo $val['price_sale'] ?>">
					</div>
					<div class="form-group">
						<label for="">Description:</label>
						<textarea class="form-control description" rows="10" name="description" id=""><?php echo $val['description'] ?></textarea>
					</div>

					<button type="submit"  id="update_product_md" value="<?php echo $val['id_product'] ?>" class="btn btn-info">Update Product</button>
				</div>
			</form>
<?php
				}
				break;

			case 'Update_Product':
				
				$id_product = $_POST['id_product'];
				$name = $_POST['name_product'];
				$category = $_POST['category'];
				$brand = $_POST['brand'];
				$origin = $_POST['origin'];

				if(isset($_FILES['main_img']['name']) && isset($_FILES['second_img']['name'])){
					$main_img = $_FILES['main_img']['name'];
					$main_img_x = time().$main_img;
					$main_img_tmp = $_FILES['main_img']['tmp_name'];

					$second_img = $_FILES['second_img']['name'];
					$second_img_x = time().$second_img;
					$second_img_tmp = $_FILES['second_img']['tmp_name'];
				}else{
					$second_img = $main_img = 'undefined';
				}
				
				
				$price = $_POST['price'];
				$quantity = $_POST['quantity'];
				$mass = $_POST['mass'];
				$classify = $_POST['classify'];
				$sale = $_POST['sale'];
				$price_sale = $_POST['price_sale'];
				$desr = $_POST['desr'];

				if ($second_img != 'undefined' && $main_img != 'undefined') {
					$result = $product->updateProduct($id_product,$category,$brand,$name,$origin,$main_img_x,$second_img_x, $price,$quantity,$mass,$desr,$classify,$sale,$price_sale);
					echo "Update_Product";
					move_uploaded_file($main_img_tmp, "../../../../assets/images/products/".time().$main_img);
					move_uploaded_file($second_img_tmp, "../../../../assets/images/hl-products/".time().$second_img);
				}else {
					$result = $product->updateProductNoImage($id_product,$category,$brand,$name,$origin, $price,$quantity,$mass,$desr,$classify,$sale,$price_sale);
					echo 'Update_Product';
				}

				break;

			case 'Delete_Product':
					
				$id	= $_POST['id'];

				$result = $product->delProduct($id);

				if ($result) {
					echo "1";
				}else {
					echo "0";
				}

				break;

			case 'Detail_Product':
				$id = $_POST['id'];
				$result = $product->getProductId($id);
				foreach ($result as $key => $detail) {
?>
			<div class="detail_product">
				<div class="images">
					<div id="product-img">
						<img style="width: 365px; height: auto" src="../../assets/images/products/<?php echo $detail['main_image'] ?>" />
					</div>
				</div>
				<div id="product-details">
					<h1><?php echo $detail['product_name']; ?></h1>
					<?php 
						$cate_detail = $category->detailCate($id);
						foreach ($cate_detail as $key => $val_cate) {
							?>
							<p>Category: <span class="font-weight-bold"><?php echo $val_cate['name_cate']; ?></span></p>
							<?php
						}
					?>

					<?php 
						$brand_detail = $brand->detailBrand($id);
						foreach ($brand_detail as $key => $val_brand) {
							?>
							<p>Brand: <span class="font-weight-bold"><?php echo $val_brand['brand_name']; ?></span></p>
							<?php
						}
					?>
					
					<p>Origin: <span class="font-weight-bold"><?php echo $detail['origin']; ?></span></p>
					<p>Quantity: <span class="font-weight-bold"><?php echo $detail['quantity']; ?></span></p>
					<p>Mass: <span class="font-weight-bold"><?php echo $detail['mass']; ?></span></p>
					<p>Classify: <span class="font-weight-bold"><?php echo $detail['classify']; ?></span></p>
					<p>Sale: <span class="font-weight-bold"><?php echo $detail['sale']; ?></span></p>
					<p>Price Sale: <span class="font-weight-bold"><?php echo $detail['price_sale']; ?></span></p>
					<p>Price: <span class="font-weight-bold"><?php echo number_format($detail['price']).'<sup>đ</sup>'; ?></span></p>
					<p>Description: <br>
						<span class="font-weight-bold text-justify"><?php echo $detail['description']; ?></span></p>

				</div>
			</div>

<?php
				}
				break;


			
			default:
				# code...
				break;
		}
	}



?>

  