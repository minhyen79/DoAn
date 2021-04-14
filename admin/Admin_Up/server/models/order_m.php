<?php 
	// import config
	include_once '../config/myConfig.php';

	/**
	 * 
	 */
	class order_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/*-------------------------------------------
						Detail Order
		---------------------------------------------*/

		public function detailOrder($id_order)
		{
			$sql = "SELECT 	tbl_orders.id_order,tbl_orders.status,tbl_orders.note,
							tbl_members.name,
							tbl_products.product_name, tbl_products.main_image,
					        tbl_detail_orders.quantity, tbl_detail_orders.price, tbl_detail_orders.total
					FROM 	tbl_orders, tbl_members, tbl_products, tbl_detail_orders 
					WHERE 	tbl_orders.id_order = tbl_detail_orders.id_order AND
							tbl_detail_orders.id_product = tbl_products.id_product AND
					        tbl_orders.id_member = tbl_members.id_member AND
					        tbl_orders.id_order = :id_order";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_order', $id_order);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}


		/*-----------------------------------------
					Change State Order
		-------------------------------------------*/

		public function changeStateOrder_Done($id_order,$status)
		{
			$sql = "UPDATE tbl_orders SET status = :status  WHERE id_order = :id_order";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_order', $id_order);
			$pre->bindParam(':status', $status);
			return $pre->execute();

		}


		/*----------------------------------------------
						Delete Order
		------------------------------------------------*/

		public function delOrder($id_order)
		{
			$sql = 'DELETE FROM tbl_orders WHERE id_order = :id_order';

			$pre = $this->pdo->prepare($sql);

	    	$pre->bindParam(':id_order' , $id_order);

	    	return $pre->execute();
		}

	}



 ?>