<?php 
	// import model.
	include_once '../models/rating_m.php';

	/**
	 * 
	 */
	class rating_c extends rating_m
	{
		
		private $rating;

		function __construct()
		{
			$this->rating = new rating_m();
		}


		/*---------------------------------------------
					Return Delete Rating
		-----------------------------------------------*/
		
		public function delRating($id_rating)
		{
			return $this->rating->delRating($id_rating);
		}

	}



 ?>