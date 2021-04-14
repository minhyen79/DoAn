<?php  
	
	// import model.
	include_once '../models/order_m.php';

	
	class order_c extends order_m
	{
	    
	    private $order;

	    function __construct()
		{
			$this->order = new order_m();
		}

		/*----------------------------------------------
			Return Add order here. | Thêm mới đơn hàng.
		-----------------------------------------------*/
		public function addOrder($id_member,$note,$pinCode,$ship_method,$payl_method)
		{
			return $this->order->addOrder($id_member,$note,$pinCode,$ship_method,$payl_method);
		}

		// Trả về Tra cứu đơn hàng dựa vào IDmember.
		public function getOrder_IDmember($id)
		{
			return $this->order->getOrder_IDmember($id);
		}

		// Tra cứu tất cả đơn hàng dựa vào IDmember.
		public function getAllOrder_IDmember($id)
		{
			return $this->order->getAllOrder_IDmember($id);
		}
	}

?>