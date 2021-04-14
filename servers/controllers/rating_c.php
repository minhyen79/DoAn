<?php

	// import config.
	include_once '../models/rating_m.php';


	class rating_c extends rating_m
	{

	   	private $rating;

	    function __construct()
	    {
	        $this->rating = new rating_m();
	    }

	    // Return check rating.
	    public function checkRating($idProduct, $idMember)
	    {
	    	return $this->rating->checkRating($idProduct, $idMember);
	    }

	    // Return add rating.
	    public function addRating($idProduct, $idMember, $score)
	    {
	    	return $this->rating->addRating($idProduct, $idMember, $score);
	    }

	   	// Return update rating.
	    public function updateRating($idRating, $score)
	    {
	    	return $this->rating->updateRating($idRating, $score);
	    }

			// Return Top 5 rating.
	    public function top5_rating()
		{
			return $this->rating->top5_rating();
		}

			// get Rating by ID.
	    public function getRating_By_Id($id)
		{
			return $this->rating->getRating_By_Id($id);
		}
	}

?>
