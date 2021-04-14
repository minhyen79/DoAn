<?php  
	
	// import connect database.
	include_once '../config/myConfig.php';

	class detail_order_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/*--------------------------------------------------------------
			Add detail order here. | thêm mới chi tiết đơn hàng.
		---------------------------------------------------------------*/
		public function addDetail_Order($id_order,$id_product,$quantity,$price,$total)
		{
			$sql = "
				  INSERT INTO tbl_detail_orders (id_order, id_product, quantity, price, total) VALUES (:id_order, :id_product, :quantity, :price, :total)";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_order', $id_order, PDO::PARAM_INT);
			$pre->bindParam(':id_product', $id_product, PDO::PARAM_INT);
			$pre->bindParam(':quantity', $quantity, PDO::PARAM_INT);
			$pre->bindParam(':price', $price);
			$pre->bindParam(':total', $total);

			return $pre->execute();	
		}


		/*---------------------------------------------
			invoice details here. | chi tiết hóa đơn.
		-----------------------------------------------*/
		public function invoiceDetail($id)
		{
			$sql = "SELECT 
				tbl_members.name, tbl_members.email, tbl_members.phone, tbl_members.password, tbl_members.address,tbl_members.id_member,
			    tbl_orders.pinCode,tbl_orders.date_order,
			    
			CASE
				WHEN tbl_orders.ship_method = 'shipone' THEN 'Giao tận nơi'
               	ELSE 'Nhận tại cửa hàng'
            END AS 'shipping',

            CASE
				WHEN tbl_orders.payl_method = 'paylone' THEN 'Thanh toán khi giao hàng'
               	ELSE 'Chuyển khoản qua ngân hàng'
            END AS 'payl',

			    tbl_products.product_name,
			    tbl_detail_orders.quantity, tbl_detail_orders.price, tbl_detail_orders.total
			FROM
				tbl_members,
			    tbl_orders,
			    tbl_products,
			    tbl_detail_orders
			WHERE 
				tbl_members.id_member = tbl_orders.id_member 
			AND 
				tbl_orders.id_order = tbl_detail_orders.id_order 
			AND 
				tbl_detail_orders.id_product = tbl_products.id_product
			AND 
				tbl_detail_orders.id_order = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Tra cứu chi tiết 1 đơn hàng bằng IDorder.
		public function getDetail_idOrder($id)
		{
			$sql = "
				SELECT 
					tbl_detail_orders.quantity, tbl_detail_orders.price, tbl_detail_orders.total,
				    tbl_products.product_name, tbl_products.main_image, tbl_orders.date_order, tbl_orders.pinCode
				FROM 
					tbl_detail_orders, tbl_products, tbl_orders
				WHERE 
					tbl_orders.id_order = tbl_detail_orders.id_order
				AND 
					tbl_products.id_product = tbl_detail_orders.id_product
				AND 
					tbl_orders.id_order = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

	}

?>