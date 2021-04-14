<?php 
	// import model.
	include_once '../models/subImage_m.php';


	/**
	 * 
	 */
	class subImage_c extends subImage_m
	{
		
		private $subImage;

		function __construct()
		{
			$this->subImage = new subImage_m();
		}


		/*--------------------------------------------
					Add Sub Image
		----------------------------------------------*/

		public function addSubImage($id_product,$sub_image)
		{
			return $this->subImage->addSubImage($id_product,$sub_image);
		}

		/*---------------------------------------------
					Select Id
		-----------------------------------------------*/

		public function getSubImageId($id_detail_image)
		{
			return $this->subImage->getSubImageId($id_detail_image);
		}

		/*---------------------------------------------
					Get Product for Image
		-----------------------------------------------*/

		public function getProforSubImg($id_detail_image)
		{
			return $this->subImage->getProforSubImg($id_detail_image);
		}

		/*-------------------------------------------------
					Update Sub Image
		---------------------------------------------------*/

		public function updateSunImage($id_detail_image,$id_product,$sub_image)
		{
			return $this->subImage->updateSunImage($id_detail_image,$id_product,$sub_image);
		}

		/*-------------------------------------------------
					Delete Sub Image
		---------------------------------------------------*/

		public function delSubImage($id_detail_image)
		{
			return $this->subImage->delSubImage($id_detail_image);
		}


	}



 ?>