<?php 
	// import config
	include_once '../config/myConfig.php';

	/**
	 * 
	 */
	class category_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/*-------------------------------
				Get Category here
		--------------------------------*/
		

		public function getCategory()
		{
			$sql = "SELECT id_category,name_cate FROM tbl_category_products";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}


		/*-------------------------------
				Add Category here
		--------------------------------*/
		public function addCategory($name_cate)
		{
			$sql = "INSERT INTO tbl_category_products(name_cate) VALUES (:name_cate)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':name_cate', $name_cate);
			return $pre->execute();
		}


		/*-------------------------------
			Get Category Id here
		--------------------------------*/
		
		public function getCategoryId($id_category)
		{
			$sql = "SELECT tbl_category_products.name_cate, tbl_category_products.id_category FROM tbl_category_products 
					WHERE id_category = :id_category";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_category', $id_category);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		/*-------------------------------
				Update Category here
		--------------------------------*/
		public function updateCategory($id_category,$name_cate)
		{
			$sql = "UPDATE tbl_category_products SET name_cate= :name_cate WHERE id_category = :id_category";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_category', $id_category);
			$pre->bindParam(':name_cate', $name_cate);

			return $pre->execute();

		}


		/*-------------------------------
			Delete Category here
		--------------------------------*/

		public function delCategory($id_category)
		{
			$sql = "DELETE FROM tbl_category_products WHERE id_category = :id_category";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_category', $id_category);

			return $pre->execute();

		}

		public function detailCate($id_product)
		{
			$sql = 'SELECT tbl_category_products.name_cate
					FROM tbl_category_products, tbl_products
					WHERE tbl_category_products.id_category = tbl_products.id_category AND tbl_products.id_product = :id_product';
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_product', $id_product);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		

		

	}


 ?>