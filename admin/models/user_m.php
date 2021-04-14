<?php  
	
	// import config.
	include_once '../../configs/myConfig.php';

	class user_m extends Connect
	{
	    
	    function __construct()
	    {
	        parent::__construct();
	    }

	    /*-------------------------
	    	login account.
	    -------------------------*/
	    public function loginAccount($user, $passw)
	    {
	    	$sql = "
    			SELECT 
					id_user,name,email,phone,password,role,status,address,create_at
				FROM 
					tbl_users 
				WHERE
				 	tbl_users.email = :user AND tbl_users.password = :passw";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':user', $user, PDO::PARAM_STR);
			$pre->bindParam(':passw', $passw, PDO::PARAM_STR);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	    /*-------------------------------------
			check email in tbl_members here.
		--------------------------------------*/
	    public function checkEmail($email)
	    {
	    	$sql = "SELECT email
			FROM tbl_users WHERE email = :email";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email, PDO::PARAM_STR);

			$pre->execute();
			return $pre->rowCount(); //  Returns the number of rows affected.
	    }

  		/*------------------------------------
			check phone in tbl_members here.
		-------------------------------------*/
		public function checkPhone($phone)
	    {
	    	$sql = "SELECT phone
			FROM tbl_users WHERE phone = :phone";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':phone', $phone, PDO::PARAM_STR);

			$pre->execute();
			return $pre->rowCount(); //  Returns the number of rows affected.
	    }

	    /*------------------------------
			account Register here.
		-------------------------------*/
		public function Register($name, $email, $phone, $password)
	    {
	    	$sql = "INSERT INTO tbl_users (name, email, phone, password) VALUES ( :name, :email, :phone, :password)";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':name', $name, PDO::PARAM_STR);
			$pre->bindParam(':email', $email, PDO::PARAM_STR);
			$pre->bindParam(':phone', $phone, PDO::PARAM_STR);
			$pre->bindParam(':password', $password, PDO::PARAM_STR);

			return $pre->execute();
	    }



	}

?>