<?php 
	// import config
	include_once 'configs/myConfig.php';

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
				Get Brand here
		--------------------------------*/
		
		public function getBrand()
		{
			$sql = "SELECT tbl_brands.id_brand, tbl_brands.brand_name FROM tbl_brands";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		

		

	}


 ?>