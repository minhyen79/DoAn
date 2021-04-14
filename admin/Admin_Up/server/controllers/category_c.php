<?php 
	// import model.
	include_once '../models/category_m.php';


	/**
	 * 
	 */
	class category_c extends category_m
	{

		private $category;

		function __construct()
		{
			$this->category = new category_m();
		}

		/*------------------------------------
					Get Category
		--------------------------------------*/
		public function getCategory()
		{
			return $this->category->getCategory();
		}

		/*-------------------------------------
					Add Category
		---------------------------------------*/
		public function addCategory($name_cate)
		{
			return $this->category->addCategory($name_cate);
		}

		/*--------------------------------------
					Get Category Id
		----------------------------------------*/
		public function getCategoryId($id_category)
		{
			return $this->category->getCategoryId($id_category);
		}

		/*--------------------------------------
					Update Category 
		----------------------------------------*/
		public function updateCategory($id_category,$name_cate)
		{
			return $this->category->updateCategory($id_category,$name_cate);
		}

		/*--------------------------------------
					Delete Category 
		----------------------------------------*/
	    
	    public function delCategory($id_category)
	    {
	    	return $this->category->delCategory($id_category);
	    }

	    /*-------------------------------------------
	    			Detail Category
	    ---------------------------------------------*/
	    public function detailCate($id_product)
	    {
	    	return $this->category->detailCate($id_product);
	    }
	}

 ?>