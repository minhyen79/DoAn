<?php 
	// import config
	include_once 'configs/myConfig.php';

	/**
	 * 
	 */
	class cate_new_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/*-------------------------------
				Get Cate News here
		--------------------------------*/
		
		public function getCateNews()
		{
			$sql = "SELECT tbl_category_news.id_category_new , tbl_category_news.name_cate FROM tbl_category_news";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		

		

	}


 ?>