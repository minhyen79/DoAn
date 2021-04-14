<?php 
	// import config
	include_once 'configs/myConfig.php';

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
			$sql = "SELECT tbl_category_products.name_cate, tbl_category_products.id_category FROM tbl_category_products";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		

		

	}


 ?>