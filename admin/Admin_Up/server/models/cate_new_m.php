<?php 
	// import config
	include_once '../config/myConfig.php';

	/**
	 * 
	 */
	class cate_new_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/*--------------------------------------------
					Add Category News
		----------------------------------------------*/

		public function addCateNews($name_cate)
		{
			$sql = "INSERT INTO tbl_category_news(name_cate) VALUES (:name_cate)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':name_cate', $name_cate);
			return $pre->execute();
		}

		/*---------------------------------------
				Get Cate News Id
		-----------------------------------------*/

		public function getCateNewsId($id_category_new)
		{
			$sql = "SELECT tbl_category_news.id_category_new , tbl_category_news.name_cate FROM tbl_category_news 
					WHERE id_category_new = :id_category_new";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_category_new', $id_category_new);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}


		/*------------------------------------------------
					Update Category News
		--------------------------------------------------*/
		public function updateCateNews($id_category_new,$name_cate)
		{
			$sql = "UPDATE tbl_category_news SET name_cate= :name_cate WHERE id_category_new = :id_category_new";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_category_new', $id_category_new);
			$pre->bindParam(':name_cate', $name_cate);

			return $pre->execute();

		}


		/*-------------------------------------------------
					Delete Category News
		---------------------------------------------------*/

		public function delCateNews($id_category_new)
		{
			$sql = "DELETE FROM tbl_category_news WHERE id_category_new = :id_category_new";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_category_new', $id_category_new);

			return $pre->execute();

		}

	}


 ?>