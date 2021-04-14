<?php  
	
	// import connect database.
	include_once '../config/myConfig.php';

	
	class gift_m extends Connect
	{
		
	    function __construct()
		{
			parent::__construct();
		}


		/*----------------------------------------------------------
				Check giftcode here. | Kiểm tra nhập mã quà tặng.
		----------------------------------------------------------*/
		public function checkGift($code)
		{
			$sql = "SELECT  id_gift,gift_code,gift_percent,gift_quantity FROM tbl_gifts WHERE gift_code = :code";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam('code', $code, PDO::PARAM_STR);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		/*---------------------------------------------------------------------------------------------------------
			(use gift) here. | (trường hợp khách sử mã điểm để đổi giảm giá) -> mỗi 1 lần trừ đi 1 lượt sử dụng.
		----------------------------------------------------------------------------------------------------------*/
		public function updateByGift_Percent($id)
		{	
			$sql = "UPDATE tbl_gifts SET gift_quantity = gift_quantity - 1 WHERE id_gift = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);

			return $pre->execute();
		}
	}
?>