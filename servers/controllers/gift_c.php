<?php  

	
	// import model.
	include_once '../models/gift_m.php';

	
	class gift_c extends gift_m
	{
	    
	    private $gift;

	    function __construct()
		{
			$this->gift = new gift_m();
		}

		/*----------------------------------------------------------------
				Return Check giftcode here. | Kiểm tra nhập mã quà tặng.
		------------------------------------------------------------------*/
		public function checkGift($code)
		{
			return $this->gift->checkGift($code);
		}


		/*---------------------------------------------------------------------------------------------------------
			(use gift) here. | (trường hợp khách sử mã điểm để đổi giảm giá) -> mỗi 1 lần trừ đi 1 lượt sử dụng.
		----------------------------------------------------------------------------------------------------------*/
		public function updateByGift_Percent($id)
		{
			return $this->gift->updateByGift_Percent($id);
		}

	}
?>