<?php  
	
	// import config.
	include_once 'config/myConfig.php';
	

	class slider_m extends Connect
	{
	   
	    function __construct()
	    {
	        parent::__construct();
	    }


	    // Lẩy 3 băng chuyền mới nhất.
	    public function getSlider()
	    {
	    	$sql = "SELECT id_slide, slide_title, slide_content, slide_image FROM tbl_slides ORDER BY id_slide DESC LIMIT 3";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }
		
	}

?>