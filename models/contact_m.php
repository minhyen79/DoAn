<?php  

	// import connect database.
	include_once 'config/myConfig.php';

	
	class contact_m extends Connect
	{
		
	    function __construct()
		{
			parent::__construct();
		}

		// Thêm mới lời nhắn liên hệ.

		// Kiểm tra xem email & phone đã tồn tại chưa? nếu tồn tại thì Sửa, chưa thì Thêm.
		public function checkContact($email,$phone)
		{
			$sql = "SELECT id_contact FROM tbl_contacts WHERE phone = :phone || email = :email";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email' ,$email, PDO::PARAM_STR);
			$pre->bindParam(':phone' ,$phone, PDO::PARAM_STR);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Thêm liên hệ.
		public function addContact($name,$email,$phone,$description)
		{
			$sql = "INSERT INTO tbl_contacts (name, phone, email, description) VALUES (:name, :phone, :email, :description)";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email' ,$email, PDO::PARAM_STR);
			$pre->bindParam(':phone' ,$phone, PDO::PARAM_STR);
			$pre->bindParam(':name' ,$name, PDO::PARAM_STR);
			$pre->bindParam(':description' ,$description, PDO::PARAM_STR);

			return $pre->execute();
		}

		// Cập nhật liên hệ (chỉ thay đổi lời nhắn)
		public function updateContact($id,$description)
		{
			$sql = "UPDATE tbl_contacts SET description = :description WHERE id_contact = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id' ,$id, PDO::PARAM_INT);
			$pre->bindParam(':description' ,$description, PDO::PARAM_STR);

			return $pre->execute();
		}
	}

?>