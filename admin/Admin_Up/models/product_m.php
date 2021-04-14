<?php 
	// import config
	include_once 'configs/myConfig.php';

	/**
	 * 
	 */
	class product_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/*-------------------------------
				Get Product here
		--------------------------------*/
		public function getProduct()
		{
			$sql = 'SELECT 
						tbl_products.id_product ,tbl_products.product_name, tbl_products.main_image, tbl_products.quantity,tbl_products.price
					FROM tbl_products
					ORDER BY tbl_products.id_product DESC';

			$pre = $this->pdo->prepare($sql);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getCateforProduct()
		{
			$sql = "SELECT tbl_category_products.name_cate, tbl_category_products.id_category FROM tbl_category_products";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getBrandforProduct()
		{
			$sql = "SELECT tbl_brands.id_brand, tbl_brands.brand_name FROM tbl_brands";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		/*------------------------------------------
	    				Get Product Id
	    --------------------------------------------*/

	    public function getProductId($id_product)
	    {
	    	$sql = "SELECT * FROM tbl_products WHERE id_product = :id_product";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':id_product', $id_product);

	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

		

	}


 ?>