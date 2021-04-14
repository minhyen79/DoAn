<?php  
	
	include_once '../controllers/member_c.php';
	include_once '../controllers/order_c.php';
	include_once '../controllers/detail_order_c.php';


	$member 		= new member_c();
	$order  		= new order_c();
	$detailOrder 	= new detail_order_c();
	
	if (isset($_POST['action']) && !empty($_POST['action'])) {
		
		$action = $_POST['action'];

		// Tra cứu đơn hàng nhanh. | không sd tài khoản.
		switch ($action) {
			// ở đây hệ thống sẽ lấy ra đơn hàng gần nhất cho bạn.
			case 'fast-lookup':
				$key 		= $_POST['key'];
				$arr_member = $member->getID_Email_Phone($key,$key);
				if (is_array($arr_member) && !empty($arr_member)) {
					// lấy được id member.
					$idMember   = $arr_member['id_member'];
					$arr_Order  = $order->getOrder_IDmember($idMember);
					// kiểm tra xem đơn hàng này có tồn tại hay không?
					if (is_array($arr_Order) && !empty($arr_Order)) {
						// lấy được id order.
						$idOrder    = $arr_Order['id_order'];
						// mảng chứa chi tiết đơn hàng.
						$result     = $detailOrder->getDetail_idOrder($idOrder);
						// chuyển kết quả về json.
						echo json_encode($result);	
					} else {
						// rỗng.
						echo 0;
					}

				} else {
					// Tức là không tồn tại email hoặc phone.
					echo 0;
				}
				
				break;

			// Tra cứu đơn hàng bằng tài khoản.
			case 'account-lookup':
				// đây là mã đơn hàng.
				$id = $_POST['id'];
				// mảng chứa chi tiết đơn hàng.
				$result     = $detailOrder->getDetail_idOrder($id);
				// chuyển kết quả về json.
				echo json_encode($result);		

				break;
			
			default:
				// code...
				break;
		}
	}

?>