<?php  

	// import config.
	include_once 'configs/myConfig.php';

	
	class user_m extends Connect
	{
	    
	    function __construct()
	    {
	        parent::__construct();
	    }

	    /*---------------get User----------------*/
	    public function getUser()
	    {
	    	$sql = "
		    	SELECT 
					id_user, name, email, phone,
				CASE
					WHEN role = 1 THEN 'Nhân Viên'
					WHEN role = 2 THEN 'Admin'
					WHEN role = 3 THEN 'Supper Admin'
				ELSE 'noAction'
					END AS 'role',
				CASE
					WHEN status = 1 THEN 'Active'
				ELSE 'Lock'
					END AS 'status'
				FROM tbl_users
				ORDER BY id_user DESC";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	}

?>