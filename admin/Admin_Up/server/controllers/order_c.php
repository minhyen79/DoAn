<?php 
	// import model.
	include_once '../models/order_m.php';

	/**
	 * 
	 */
	class order_c extends order_m
	{
		
		private $order;
		function __construct()
		{
			$this->order = new order_m();
		}


		/*---------------------------------------
				Return Detail Order
		-----------------------------------------*/

		public function detailOrder($id_order)
		{
			return $this->order->detailOrder($id_order);
		}

		/*--------------------------------------------
				Return Change State
		----------------------------------------------*/

		public function changeStateOrder_Done($id_order,$status)
		{
			return $this->order->changeStateOrder_Done($id_order,$status);
		}

		/*-----------------------------------------
					Return Delete Order
		-------------------------------------------*/
		public function delOrder($id_order)
		{
			return $this->order->delOrder($id_order);
		}

	}


 ?>