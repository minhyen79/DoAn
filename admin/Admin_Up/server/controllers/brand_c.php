<?php 
	// import model.
	include_once '../models/brand_m.php';


	/**
	 * 
	 */
	class brand_c extends brand_m
	{

		private $brand;

		function __construct()
		{
			$this->brand = new brand_m();
		}

		/*------------------------------------
					Get Brand
		--------------------------------------*/
		public function getBrand()
		{
			return $this->brand->getBrand();
		}

		/*------------------------------------
					Add Category
		--------------------------------------*/
		public function addBrand($brand_name)
		{
			return $this->brand->addBrand($brand_name);
		}

		/*------------------------------------
					Get Brand Id
		--------------------------------------*/
		public function  getBrandId($id_brand)
		{
			return $this->brand->getBrandId($id_brand);
		}

		/*--------------------------------------
					Update Brand
		----------------------------------------*/
		public function updateBrand($id_brand,$brand_name)
		{
			return $this->brand->updateBrand($id_brand,$brand_name);
		}

		/*--------------------------------------
					Delete Brand
		----------------------------------------*/
	    
	    public function delBrand($id_brand)
	    {
	    	return $this->brand->delBrand($id_brand);
	    }

	    /*------------------------------------------
	    			Detail Brand
	    --------------------------------------------*/
	    public function detailBrand($id_product)
	    {
	    	return $this->brand->detailBrand($id_product);
	    }
	
	    
	}

 ?>