<?php 
	// import config
	include_once '../config/myConfig.php';

	/**
	 * 
	 */
	class brand_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/*-------------------------------
				Get Category here
		--------------------------------*/
		

		public function getBrand()
		{
			$sql = "SELECT tbl_brands.id_brand, tbl_brands.brand_name FROM tbl_brands";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}



		/*-------------------------------
				Add Brand here
		--------------------------------*/
		public function addBrand($brand_name)
		{
			$sql = "INSERT INTO tbl_brands(brand_name) VALUES (:brand_name)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':brand_name', $brand_name);
			return $pre->execute();
		}

		/*-------------------------------
			Get Brand Id here
		--------------------------------*/
		
		public function getBrandId($id_brand)
		{
			$sql = "SELECT tbl_brands.brand_name, tbl_brands.id_brand FROM tbl_brands 
					WHERE id_brand = :id_brand";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_brand', $id_brand);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		/*-------------------------------
				Update Brand here
		--------------------------------*/
		public function updateBrand($id_brand,$brand_name)
		{
			$sql = "UPDATE tbl_brands SET brand_name= :brand_name WHERE id_brand = :id_brand";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_brand', $id_brand);
			$pre->bindParam(':brand_name', $brand_name);

			return $pre->execute();

		}

		/*-------------------------------
			Delete Brand here
		--------------------------------*/

		public function delBrand($id_brand)
		{
			$sql = "DELETE FROM tbl_brands WHERE id_brand = :id_brand";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_brand', $id_brand);

			return $pre->execute();

		}

		/*------------------------------------------
					Detail Brand
		--------------------------------------------*/
		
		public function detailBrand($id_product)
		{
			$sql = 'SELECT tbl_brands.brand_name
					FROM tbl_brands, tbl_products 
					WHERE tbl_brands.id_brand = tbl_products.id_brand AND tbl_products.id_product = :id_product';

			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_product', $id_product);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		

	}


 ?>