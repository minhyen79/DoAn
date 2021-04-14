<?php 
	// import config
	include_once '../config/myConfig.php';


	/**
	 * 
	 */
	class subImage_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
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

		/*------------------------------------------
						Select Id
		--------------------------------------------*/

		public function getSubImageId($id_detail_image)
		{
			$sql = "SELECT tbl_detail_images.id_detail_image, tbl_detail_images.id_product, tbl_detail_images.sub_image 
					FROM tbl_detail_images 
					WHERE tbl_detail_images.id_detail_image = :id_detail_image";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_detail_image', $id_detail_image);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		/*------------------------------------------------------
					Get Product for Sub Image
		--------------------------------------------------------*/

		public function getProforSubImg($id_detail_image)
		{
			$sql = "SELECT tbl_products.id_product, tbl_products.product_name
					FROM tbl_products, tbl_detail_images
					WHERE tbl_products.id_product = tbl_detail_images.id_product
                    		AND tbl_detail_images.id_detail_image = :id_detail_image";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_detail_image', $id_detail_image);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}


		/*-------------------------------------------------------
								Update Image
		---------------------------------------------------------*/

		public function updateSunImage($id_detail_image,$id_product,$sub_image)
		{
			$sql = "UPDATE tbl_detail_images SET id_detail_image = :id_detail_image, id_product = :id_product, sub_image =  :sub_image WHERE id_detail_image = :id_detail_image";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_product', $id_product);
			$pre->bindParam(':id_detail_image', $id_detail_image);
			$pre->bindParam(':sub_image', $sub_image);

			return $pre->execute();

		}

		/*---------------------------------------------------
						Delete Sub Image
		-----------------------------------------------------*/

		public function delSubImage($id_detail_image)
		{
			$sql = "DELETE FROM tbl_detail_images WHERE id_detail_image = :id_detail_image";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_detail_image', $id_detail_image);

			return $pre->execute();

		}

	}


 ?>