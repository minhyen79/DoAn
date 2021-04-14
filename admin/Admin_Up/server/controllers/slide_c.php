<?php 
	// import model.
	include_once '../models/slide_m.php';

	/**
	 * 
	 */
	class slide_c extends slide_m
	{
		
		private $slide;	

		function __construct()
		{
			$this->slide = new slide_m();
		}


		/*----------------------------------------------------
						Return Add Slide
		------------------------------------------------------*/

		public function addSlide($slide_title,$slide_content,$slide_image)
		{
			return $this->slide->addSlide($slide_title,$slide_content,$slide_image);
		}

		/*----------------------------------------------
					Return Get Slide Id here
		------------------------------------------------*/

		public function getSlideId($id_slide)
		{
			return $this->slide->getSlideId($id_slide);
		}

		/*-----------------------------------------------
						Return Update Slide
		-------------------------------------------------*/

		public function updateSlide($id_slide,$slide_title,$slide_content,$slide_image)
		{
			return $this->slide->updateSlide($id_slide,$slide_title,$slide_content,$slide_image);
		}


		/*----------------------------------------------------
					Return Delete Slide
		------------------------------------------------------*/

		public function delSlide($id_slide)
		{
			return $this->slide->delSlide($id_slide);
		}

	}


 ?>