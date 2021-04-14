<?php  

	// import config.
	include_once 'configs/myConfig.php';

	
	class home_m extends Connect
	{
	    
	    function __construct()
	    {
	        parent::__construct();
	    }

	    // tổng tất cả sản phẩm.
	    public function countProduct()
	    {
	    	$sql = "SELECT COUNT(id_product) AS 'count' FROM tbl_products";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->execute();
	    	return $pre->fetch(PDO::FETCH_ASSOC);
	    }

	    // tổng tất cả tài khoản.
	    public function countMember()
	    {
	    	$sql = "SELECT COUNT(id_member) AS 'count' FROM tbl_members";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->execute();
	    	return $pre->fetch(PDO::FETCH_ASSOC);
	    }

	    // tổng tất cả đơn hàng.
	    public function countOrder()
	    {
	    	$sql = "SELECT COUNT(id_order) AS 'count' FROM tbl_orders";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->execute();
	    	return $pre->fetch(PDO::FETCH_ASSOC);
	    }

	    // lấy ra id hóa đơn trong ngày hôm nay
	    public function nowDate_Id()
	    {
	    	$sql = "SELECT id_order,DATEDIFF(NOW(),date_order) AS 'Ngay' FROM tbl_orders";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	    // lấy ra tổng tiền bán được trong ngày hôm nay
	    public function nowDate_TotalPrice($id)
	    {
	    	$sql = "SELECT total FROM tbl_detail_orders WHERE id_order IN (:id)";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':id', $id);
	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }	

	      // 
	    // public function nowDate()
	    // {
	    // 	$sql = "SELECT id_order,DATEDIFF(NOW(),date_order)  FROM tbl_orders WHERE DATEDIFF(NOW(),date_order) = 0";

	    // 	$pre = $this->pdo->prepare($sql);
	    // 	$pre->bindParam(':id', $id);
	    // 	$pre->execute();
	    // 	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    // }

	    //
	    public function nowDate()
	    {
	    	$sql = "SELECT tbl_orders.id_order,DATEDIFF(NOW(),date_order),
							tbl_detail_orders.total
					FROM tbl_orders, tbl_detail_orders 
					WHERE tbl_orders.id_order = tbl_detail_orders.id_order 
							AND DATEDIFF(NOW(),date_order) = 0";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	}

?>