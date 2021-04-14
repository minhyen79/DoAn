<?php  

	// import config.
	include_once 'configs/myConfig.php';

	
	class member_m extends Connect
	{
	    
	    function __construct()
	    {
	        parent::__construct();
	    }

	    /*---------------get Member----------------*/
	    public function getMember()
	    {	
	    	$sql = "SELECT 
						id_member, name, email, phone, address, point, 
					CASE
						WHEN tbl_members.status = 1 THEN 'Active'
					ELSE 'Lock'
					     END AS 'status'
					FROM 
						tbl_members
					ORDER BY id_member DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }
	}

?>