<?php 
	// import model.
	include_once '../models/new_m.php';

	/**
	 * 
	 */
	class new_c extends new_m
	{
		
		private $news;

		function __construct()
		{
			$this->news = new new_m();
		}


		/*-------------------------------------
				Return Add News
		---------------------------------------*/

		public function addNews($id_category_new,$id_user, $classify,$title,$main_image,$description,$main_content)
		{
			return $this->news->addNews($id_category_new,$id_user, $classify,$title,$main_image,$description,$main_content);
		}

		/*------------------------------------
				Return get News Id
		--------------------------------------*/

		public function selectNews($id_news)
		{
			return $this->news->selectNews($id_news);
		}

		/*----------------------------------------
				Return get Cate for News
		------------------------------------------*/
		public function getCateforNews()
		{
			return $this->news->getCateforNews();
		}

		/*----------------------------------------
				Return get User for News
		------------------------------------------*/
		public function getUserforNews()
		{
			return $this->news->getUserforNews();
		}

		/*----------------------------------------
				Return Delete News
		------------------------------------------*/

		public function delNews($id_news)
		{
			return $this->news->delNews($id_news);
		}

	}


 ?>