<?php  
	
	// import config.
	include_once 'config/myConfig.php';

	
	class profile_m extends Connect
	{
	    
	    function __construct()
	    {
	        parent::__construct();
	    }


	    // hiển thị thông tin cá nhân của 1 người nào đó.
		public function showAvatar_Id($id)
		{
			$sql = "SELECT * FROM tbl_members WHERE id_member = :id";	

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Tra cứu tất cả đơn hàng dựa vào IDmember.
		public function getAllOrder_IDmember($id)
		{
			$sql = "SELECT id_order,pinCode FROM tbl_orders WHERE id_member = :id ORDER BY id_order DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Cập nhật địa chỉ cho khách hàng.
		public function updateAddress($id,$address)
		{
			$sql = "UPDATE tbl_members SET address = :address WHERE id_member = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->bindParam(':address', $address, PDO::PARAM_STR);
			return $pre->execute();
		}
	}
?>