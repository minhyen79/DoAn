<?php  
	
	// import config.
	include '../config/myConfig.php';

	
	class user_m extends Connect
	{
	    
	    function __construct()
	    {
	        parent::__construct();
	    }

	    /*-------------getUser---------------*/
	    public function getUser($id)
	    {
	    	$sql = "
		    	SELECT 
					id_user, name, email, phone, address, role, status 
				FROM 
					tbl_users
				WHERE 
					id_user = :id";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam('id', $id, PDO::PARAM_INT);

	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	    /*-------------add User---------------*/
	    public function addUser($name, $role, $email, $phone, $password, $address)
	    {
	    	$sql = "INSERT INTO tbl_users(name, role, email, phone, password, address) VALUES (:name, :role, :email, :phone, :password, :address )";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':name', $name, PDO::PARAM_STR);
	    	$pre->bindParam(':role', $role, PDO::PARAM_INT);
	    	$pre->bindParam(':email', $email, PDO::PARAM_STR);
	    	$pre->bindParam(':phone', $phone, PDO::PARAM_STR);
	    	$pre->bindParam(':password', $password, PDO::PARAM_STR);
	    	$pre->bindParam(':address', $address, PDO::PARAM_STR);

	    	return $pre->execute();
	    }

	    /*-------------update User---------------*/
	    public function updateUser($id, $name, $role, $email, $phone, $password, $status, $address)
	    {
	    	$sql = "UPDATE tbl_users SET name = :name, role = :role, email = :email, phone = :phone, password = :password, status = :status, address = :address WHERE id_user = :id";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':id', $id, PDO::PARAM_INT);
	    	$pre->bindParam(':name', $name, PDO::PARAM_STR);
	    	$pre->bindParam(':role', $role, PDO::PARAM_INT);
	    	$pre->bindParam(':email', $email, PDO::PARAM_STR);
	    	$pre->bindParam(':phone', $phone, PDO::PARAM_STR);
	    	$pre->bindParam(':password', $password, PDO::PARAM_STR);
	    	$pre->bindParam(':status', $status, PDO::PARAM_INT);
	    	$pre->bindParam(':address', $address, PDO::PARAM_STR);

	    	return $pre->execute();
	    }

	    /*-------------delete User---------------*/
	    public function deleteUser($id)
	    {
	    	$sql = "DELETE FROM tbl_users WHERE id_user = :id";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam('id', $id, PDO::PARAM_INT);
	    	return $pre->execute();
	    }
	}
?>