<?php 
	// import config
	include_once '../config/myConfig.php';

	/**
	 * 
	 */
	class slide_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		



		/*------------------------------------------
						Add Slide 
		--------------------------------------------*/
		public function addSlide($slide_title,$slide_content,$slide_image)
		{
			$sql = "INSERT INTO tbl_slides(slide_title,slide_content,slide_image) VALUES (:slide_title,:slide_content,:slide_image)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':slide_title', $slide_title);
			$pre->bindParam(':slide_content', $slide_content);
			$pre->bindParam(':slide_image', $slide_image);
			return $pre->execute();
		}

		/*----------------------------------------------
						Get Slide Id here
		------------------------------------------------*/
		
		public function getSlideId($id_slide)
		{
			$sql = "SELECT tbl_slides.id_slide, tbl_slides.slide_title, tbl_slides.slide_content, tbl_slides.slide_image
			FROM tbl_slides 
			WHERE id_slide = :id_slide";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_slide', $id_slide);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		/*-----------------------------------------------
							Update Slide
		-------------------------------------------------*/
		public function updateSlide($id_slide,$slide_title,$slide_content,$slide_image)
		{
			$sql = "UPDATE tbl_slides SET slide_title= :slide_title, slide_content= :slide_content, slide_image= 				:slide_image WHERE id_slide = :id_slide";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_slide', $id_slide);
			$pre->bindParam(':slide_title', $slide_title);
			$pre->bindParam(':slide_content', $slide_content);
			$pre->bindParam(':slide_image', $slide_image);

			return $pre->execute();

		}

		/*------------------------------------------------
						Delete Slide
		--------------------------------------------------*/

		public function delSlide($id_slide)
		{
			$sql = "DELETE FROM tbl_slides WHERE id_slide = :id_slide";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_slide', $id_slide);

			return $pre->execute();

		}

		

		

	}


 ?>