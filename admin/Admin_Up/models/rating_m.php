<?php 
	// import config
	include_once 'configs/myConfig.php';

	/**
	 * 
	 */
	class rating_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/*------------------------------------------
						Get Rating
		--------------------------------------------*/

		public function getRating()
		{
			$sql = "SELECT tbl_ratings.id_rating, tbl_ratings.rate,
							tbl_products.product_name,tbl_products.main_image,
					        tbl_members.name
					FROM tbl_ratings, tbl_products, tbl_members 
					WHERE  tbl_ratings.id_product = tbl_products.id_product 
							AND tbl_ratings.id_member = tbl_members.id_member
					ORDER BY tbl_ratings.id_rating DESC";

			$pre = $this->pdo->prepare($sql);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
	}


 ?>