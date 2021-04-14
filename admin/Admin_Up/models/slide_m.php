<?php 
	// import config
	include_once 'configs/myConfig.php';

	/**
	 * 
	 */
	class slide_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/*----------------------------------------------
						Get Slide 
		------------------------------------------------*/
		
		public function getSlide()
		{
			$sql = "SELECT tbl_slides.id_slide , tbl_slides.slide_title, tbl_slides.slide_content, tbl_slides.slide_image 
			FROM tbl_slides";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		

		

	}


 ?>