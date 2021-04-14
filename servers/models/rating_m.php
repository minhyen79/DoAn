<?php

	// import config.
	include_once '../config/myConfig.php';


	class rating_m extends Connect
	{

	    function __construct()
	    {
	        parent::__construct();
	    }

	    // check rating.
	    public function checkRating($idProduct, $idMember)
	    {
	    	$sql = "SELECT id_rating, rate, status FROM tbl_ratings WHERE id_product = :idProduct AND id_member = :idMember";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
	    	$pre->bindParam(':idMember', $idMember, PDO::PARAM_INT);

	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	    // add rating.
	    public function addRating($idProduct, $idMember, $score)
	    {
	    	$sql = "INSERT INTO tbl_ratings (id_product, id_member, rate) VALUES (:idProduct, :idMember, :score)";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
	    	$pre->bindParam(':idMember', $idMember, PDO::PARAM_INT);
	    	$pre->bindParam(':score', $score, PDO::PARAM_INT);

	    	return $pre->execute();
	    }

	    // update rating.
	    public function updateRating($idRating, $score)
	    {
	    	$sql = "UPDATE tbl_ratings SET rate = :score WHERE id_rating = :idRating";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':score', $score, PDO::PARAM_INT);
	    	$pre->bindParam(':idRating', $idRating, PDO::PARAM_INT);

	    	return $pre->execute();
	    }

			// Top 5 rating.
	    public function top5_rating()
	    {
	    	$sql = "SELECT id_product, AVG(rate) AS 'topRating' FROM tbl_ratings GROUP BY id_product ORDER BY topRating DESC LIMIT 5";

	    	$pre = $this->pdo->prepare($sql);

	    	$pre->execute();
				return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

			// get Rating by ID.
	    public function getRating_By_Id($id)
	    {
	    	$sql = "SELECT id_product, AVG(rate) AS 'topRating' FROM tbl_ratings WHERE id_product = :id";

	    	$pre = $this->pdo->prepare($sql);
				$pre->bindParam(':id', $id, PDO::PARAM_INT);

	    	$pre->execute();
				return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }
	}

?>
