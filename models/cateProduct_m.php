<?php  
	
	// import config.
	include_once 'config/myConfig.php';
	

	class cateProduct_m extends Connect
	{
	   
	    function __construct()
	    {
	        parent::__construct();
	    }


	    // Lẩy tất cả danh mục.
		public function getAllCate()
		{
			$sql = "SELECT id_category, name_cate, status FROM tbl_category_products";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
	}

?>