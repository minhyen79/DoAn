<?php  

	// import connect database.
	include_once '../config/myConfig.php';

	
	class member_m extends Connect
	{
		
	    function __construct()
		{
			parent::__construct();
		}


		/*-------------------------------------
			check email in tbl_members here.
		--------------------------------------*/
	    public function checkEmail($email)
	    {
	    	$sql = "SELECT email
			FROM tbl_members WHERE email = :email";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email, PDO::PARAM_STR);

			$pre->execute();
			return $pre->rowCount(); //  Returns the number of rows affected.
	    }

	    /*-------------------------------------------------
			check email in tbl_members here => array.
		--------------------------------------------------*/
	    public function checkEmail_array($email)
	    {
	    	$sql = "SELECT id_member,email
			FROM tbl_members WHERE email = :email";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email, PDO::PARAM_STR);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }


	    /*------------------------------------
			check phone in tbl_members here.
		-------------------------------------*/
		public function checkPhone($phone)
	    {
	    	$sql = "SELECT phone
			FROM tbl_members WHERE phone = :phone";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':phone', $phone, PDO::PARAM_STR);

			$pre->execute();
			return $pre->rowCount(); //  Returns the number of rows affected.
	    }


	    /*----------------------------------------------------
			check phone in tbl_members here => array.
		----------------------------------------------------*/
	    public function checkPhone_array($phone)
	    {
	    	$sql = "SELECT id_member,phone
			FROM tbl_members WHERE phone = :phone";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':phone', $phone, PDO::PARAM_STR);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }


	    /*------------------------------
			account Register here.
		-------------------------------*/
		public function Register($name, $email, $phone, $password)
	    {
	    	$sql = "INSERT INTO tbl_members (name, email, phone, password) VALUES ( :name, :email, :phone, :password)";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':name', $name, PDO::PARAM_STR);
			$pre->bindParam(':email', $email, PDO::PARAM_STR);
			$pre->bindParam(':phone', $phone, PDO::PARAM_STR);
			$pre->bindParam(':password', $password, PDO::PARAM_STR);

			return $pre->execute();
	    }

	    /*------------------------------
			account Login here.
		-------------------------------*/
		public function login($email, $password)
	    {
	    	$sql = "SELECT 
						id_member, name, email, password, phone, point, address 
					FROM tbl_members 
					WHERE email = :email && password = :password";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email, PDO::PARAM_STR);
			$pre->bindParam(':password', $password, PDO::PARAM_STR);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	   
		/*------------------------------------------------------
			update point here. | c???p nh???t ??i???m th??n thi???t.
		--------------------------------------------------------*/
		public function updateByPoint($point, $id)
		{	
			$sql = "UPDATE tbl_members SET point = point + :point WHERE id_member = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':point', $point, PDO::PARAM_INT);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);

			return $pre->execute();
		}

		/*------------------------------------------------------------------------------------
			(use point) here. | (tr?????ng h???p kh??ch s??? d???ng ??i???m ????? ?????i gi???m gi??)
		-------------------------------------------------------------------------------------*/
		public function updateByPoint_Percent($point, $id)
		{	
			$sql = "UPDATE tbl_members SET point = point - :point WHERE id_member = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':point', $point, PDO::PARAM_INT);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);

			return $pre->execute();
		}

		/*------------------------------------------------------------------------------------
			search point here. | Tra c???u ??i???m hi???n c??.
		-------------------------------------------------------------------------------------*/
		public function searchPoint($id)
		{	
			$sql = "SELECT point FROM tbl_members WHERE id_member = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		/*---------------------------------------------------------
			Add member here. | Th??m m???i t??i kho???n cho kh??ch.
		-----------------------------------------------------------*/
		public function addMember($name,$email,$phone,$password,$address)
		{
			$sql = "  
				INSERT INTO tbl_members (name, email, phone, password, address) VALUES (:name, :email, :phone, :password, :address)";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':name', $name, PDO::PARAM_STR);
			$pre->bindParam(':email', $email, PDO::PARAM_STR);
			$pre->bindParam(':phone', $phone, PDO::PARAM_STR);
			$pre->bindParam(':password', $password, PDO::PARAM_STR);
			$pre->bindParam(':address', $address, PDO::PARAM_STR);

			$pre->execute();
			$_SESSION['lastID_Member'] = $this->pdo->lastInsertId(); // l???y ra id(member) ??? v??? tr?? cu???i c??ng. | insert LastID.
		}

		// Tra c???u ID kh??ch h??ng b???ng Email ho???c Phone.
		public function getID_Email_Phone($email,$phone)
		{
			$sql = "SELECT id_member FROM tbl_members WHERE email = :email OR phone = :phone";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email, PDO::PARAM_STR);
			$pre->bindParam(':phone', $phone, PDO::PARAM_STR);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);
		}


		// Ki???m tra m???t kh???u c?? c?? t???n t???i kh??ng?.
		public function checkOldPass($passw)
		{
			$sql = "SELECT id_member FROM tbl_members WHERE password = :passw";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':passw', $passw, PDO::PARAM_STR);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// ?????i m???t kh???u.
		public function changePassw($passw, $id)
		{
			$sql = "UPDATE tbl_members SET tbl_members.password = :passw WHERE id_member = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->bindParam(':passw', $passw, PDO::PARAM_STR);

			return $pre->execute();
		}

	}

?>