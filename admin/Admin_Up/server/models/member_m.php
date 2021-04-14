<?php  
	
	// import config.
	include '../config/myConfig.php';

	
	class member_m extends Connect
	{
	    
	    function __construct()
	    {
	        parent::__construct();
	    }

	    /*-------------getMember---------------*/
	    public function getMember($id)
	    {
	    	$sql = "
		    	SELECT 
					id_member, name, email, phone, address, point, status 
				FROM 
					tbl_members
				WHERE 
					id_member = :id";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam('id', $id, PDO::PARAM_INT);

	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	    /*-------------add Member---------------*/
	    public function addMember($name, $email, $phone, $password, $address)
	    {
	    	$sql = "INSERT INTO tbl_members(name, email, phone, password, address) VALUES (:name, :email, :phone, :password, :address)";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':name', $name, PDO::PARAM_STR);
	    	$pre->bindParam(':email', $email, PDO::PARAM_STR);
	    	$pre->bindParam(':phone', $phone, PDO::PARAM_STR);
	    	$pre->bindParam(':password', $password, PDO::PARAM_STR);
	    	$pre->bindParam(':address', $address, PDO::PARAM_STR);

	    	return $pre->execute();
	    }

	    /*-------------update Member---------------*/
	    public function updateMember($id, $name, $email, $phone, $point, $status, $address)
	    {
	    	$sql = "UPDATE tbl_members SET name = :name, email = :email, phone = :phone, point = :point,  status = :status, address = :address WHERE id_member = :id";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':id', $id, PDO::PARAM_INT);
	    	$pre->bindParam(':name', $name, PDO::PARAM_STR);
	    	$pre->bindParam(':email', $email, PDO::PARAM_STR);
	    	$pre->bindParam(':phone', $phone, PDO::PARAM_STR);
	    	$pre->bindParam(':point', $point, PDO::PARAM_INT);
	    	// $pre->bindParam(':password', $password, PDO::PARAM_STR);
	    	$pre->bindParam(':status', $status, PDO::PARAM_INT);
	    	$pre->bindParam(':address', $address, PDO::PARAM_STR);

	    	return $pre->execute();
	    }

	    /*-------------delete Member---------------*/
	    public function deleteMember($id)
	    {
	    	$sql = "DELETE FROM tbl_members WHERE id_member = :id";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam('id', $id, PDO::PARAM_INT);
	    	return $pre->execute();
	    }
	}
?>