<?php 
	// import config
	include_once 'configs/myConfig.php';

	/**
	 * 
	 */
	class subImage_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/*----------------------------------------------
						Get Sub Imgae
		------------------------------------------------*/
		
		public function subImage()
		{
			$sql = "SELECT tbl_detail_images.id_detail_image, tbl_detail_images.sub_image,
							tbl_products.main_image
					FROM tbl_detail_images, tbl_products
					WHERE tbl_detail_images.id_product = tbl_products.id_product
					ORDER BY tbl_detail_images.id_detail_image DESC";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}


		/*------------------------------------------------------
					Get Product for Sub Image
		--------------------------------------------------------*/

		public function getProforSubImg()
		{
			$sql = "SELECT tbl_products.id_product, tbl_products.product_name FROM tbl_products ";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		/*---------------------------------------------
					Add Sub Image
		-----------------------------------------------*/

		public function addSubImage($id_product,$sub_image)
		{
			$sql = "INSERT INTO tbl_detail_images(id_product, sub_image) VALUES (:id_product, :sub_image)
			";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_product', $id_product);
			$pre->bindParam(':sub_image', $sub_image);

			return $pre->execute();
		}

		

	}


 ?>