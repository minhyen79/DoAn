<?php  
	
	// import model.
	include_once '../models/detail_order_m.php';

	
	class detail_order_c extends detail_order_m
	{
	    
	    private $detailOrder;

	    function __construct()
		{
			$this->detailOrder = new detail_order_m();
		}

		/*--------------------------------------------------------------
			Return Add detail order here. | thêm mới chi tiết đơn hàng.
		---------------------------------------------------------------*/
		public function addDetail_Order($id_order,$id_product,$quantity,$price,$total)
		{
			return $this->detailOrder->addDetail_Order($id_order,$id_product,$quantity,$price,$total);
		}

		/*----------------------------------------------------------
			Return invoice details here. | Trả về chi tiết hóa đơn.
		------------------------------------------------------------*/
		public function invoiceDetail($id)
		{
			return $this->detailOrder->invoiceDetail($id);
		}

		// Tra cứu chi tiết đơn hàng bằng IDorder.
		public function getDetail_idOrder($id)
		{
			return $this->detailOrder->getDetail_idOrder($id);
		}

	}

?>