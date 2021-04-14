<?php 
	// import config
	include_once '../config/myConfig.php';


	/**
	 * 
	 */
	class rating_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/*-------------------------------------------------------
							Delete Rating
		---------------------------------------------------------*/

		public function delRating($id_rating)
		{
			$sql = "DELETE FROM tbl_ratings WHERE id_rating = :id_rating";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_rating', $id_rating);

			return $pre->execute();
		}

	}


 ?>