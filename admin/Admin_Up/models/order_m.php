<?php 
	// import config.
	include_once 'configs/myConfig.php';

	/**
	 * 
	 */
	class order_m extends Connect
	{
		
		function __construct()
		{
			 parent::__construct();
		}

		/*--------------------------------------------
						Get Order
		----------------------------------------------*/

		public function getOrder()
		{
			$sql = " SELECT 
							tbl_orders.id_order,
						CASE
							WHEN tbl_orders.ship_method = 'shipone' THEN 'Giao tận nơi'
						ELSE 'Nhận tại cửa hàng'
							END AS 'ship_method',
						CASE
							WHEN tbl_orders.payl_method = 'paylone' THEN 'Thanh toán khi nhận hàng'
						ELSE 'Chuyển khoản qua ngân hàng'
							END AS 'payl_method',
						CASE
							WHEN tbl_orders.status = '0' THEN 'Chưa giao'
						ELSE 'Đã giao'
							END AS 'status',
						    tbl_members.name
						FROM
							tbl_orders,tbl_members 
						WHERE 
							tbl_orders.id_member = tbl_members.id_member 
						ORDER BY tbl_orders.id_order DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
	}


 ?>
