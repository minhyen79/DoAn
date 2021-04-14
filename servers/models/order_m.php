<?php  
	
	// import connect database.
	include_once '../config/myConfig.php';

	class order_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/*----------------------------------------------
			Add order here. | Thêm mới đơn hàng.
		-----------------------------------------------*/
		public function addOrder($id_member,$note,$pinCode,$ship_method,$payl_method)
		{
			$sql = "  
				INSERT INTO tbl_orders (id_member, note, pinCode, ship_method, payl_method) VALUES (:id_member, :note, :pinCode, :ship_method, :payl_method)";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_member', $id_member, PDO::PARAM_INT);
			$pre->bindParam(':note', $note, PDO::PARAM_STR);
			$pre->bindParam(':pinCode', $pinCode, PDO::PARAM_STR);
			$pre->bindParam(':ship_method', $ship_method, PDO::PARAM_STR);
			$pre->bindParam(':payl_method', $payl_method, PDO::PARAM_STR);	

			$pre->execute();
			$_SESSION['lastID_Order'] = $this->pdo->lastInsertId(); // lấy ra id(order) ở vị trí cuối cùng. | insert LastID. 
		}

		// Tra cứu 1 đơn hàng gần nhất dựa vào IDmember.
		public function getOrder_IDmember($id)
		{
			$sql = "SELECT id_order FROM tbl_orders WHERE id_member = :id ORDER BY id_order DESC LIMIT 1";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);
		}

		// Tra cứu tất cả đơn hàng dựa vào IDmember.
		public function getAllOrder_IDmember($id)
		{
			$sql = "SELECT id_order FROM tbl_orders WHERE id_member = :id ORDER BY id_order DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
	}

?>