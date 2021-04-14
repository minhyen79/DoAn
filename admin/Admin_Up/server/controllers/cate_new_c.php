<?php 
	// import model.
	include_once '../models/cate_new_m.php';



	/**
	 * 
	 */
	class cate_new_c extends cate_new_m
	{
		
		private $cate_news;

		function __construct()
		{
			$this->cate_news = new cate_new_m();
		}


		/*--------------------------------------------
					Return Add Category News
		----------------------------------------------*/

		public function addCateNews($name_cate)
		{
			return $this->cate_news->addCateNews($name_cate);
		}

		/*---------------------------------------
				Return Get Cate News Id
		-----------------------------------------*/

		public function getCateNewsId($id_category_new)
		{
			return $this->cate_news->getCateNewsId($id_category_new);
		}


		/*------------------------------------------------
					Return Update Category News
		--------------------------------------------------*/

		public function updateCateNews($id_category_new,$name_cate)
		{
			return $this->cate_news->updateCateNews($id_category_new,$name_cate);
		}


		/*-------------------------------------------------
					Return Delete Category News
		---------------------------------------------------*/

		public function delCateNews($id_category_new)
		{
			return $this->cate_news->delCateNews($id_category_new);
		}

	}

 ?>