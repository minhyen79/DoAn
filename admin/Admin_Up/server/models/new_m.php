<?php 
	// import config.
	include '../config/myConfig.php';


	/**
	 * 
	 */
	class new_m extends Connect
	{
		
		function __construct()
		{
			 parent::__construct();
		}

		/*-----------------------Add News-------------------------*/

		public function addNews($id_category_new,$id_user,$classify,$title,$main_image,$description,$main_content)
		{
			$sql = "INSERT INTO tbl_news( id_category_new, id_user, classify, title, main_image, description, main_content) VALUES (:id_category_new, :id_user, :classify ,:title, :main_image, :description, :main_content)";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_category_new', $id_category_new);
			$pre->bindParam(':id_user', $id_user);
			$pre->bindParam(':classify', $classify);
			$pre->bindParam(':title', $title);
			$pre->bindParam(':main_image', $main_image);
			$pre->bindParam(':description', $description);
			$pre->bindParam(':main_content', $main_content);

			return $pre->execute();
		}

		/*-----------------------Get News Id-------------------------*/

		public function selectNews($id_news)
		{
			$sql = "SELECT tbl_news.id_news, tbl_news.id_category_new, tbl_news.id_user, tbl_news.title, 
							tbl_news.main_image, tbl_news.description,tbl_news.main_content,tbl_news.classify
					FROM tbl_news 
					WHERE tbl_news.id_news = :id_news";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_news', $id_news);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		/*-------------------get Category for News---------------------*/
		public function getCateforNews()
	    {
	    	$sql = "SELECT tbl_category_news.name_cate, tbl_category_news.id_category_new  FROM tbl_category_news";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	    /*----------------------Get User for News--------------------------*/

	    public function getUserforNews()
	    {
	    	$sql = "SELECT tbl_users.id_user  , tbl_users.name  FROM tbl_users";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	    /*-----------------------------Delete News-----------------------------*/

	    public function delNews($id_news)
	    {
	    	$sql = "DELETE FROM tbl_news WHERE id_news = :id_news";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_news', $id_news);

			return $pre->execute();
	    }

	}


 ?>