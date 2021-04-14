<?php  
	
	session_start();

	// import controllers.
	include_once '../controllers/gift_c.php';
	$gift =  new gift_c();

	/*---------------------------------------------
		Check gift here. | kiểm tra mã quà tặng.
	---------------------------------------------*/
	if (isset($_POST['action'])  && $_POST['action'] == 'checkGift') {
		
		$giftCODE 	= $_POST['giftCODE'];

		$check = $gift->checkGift($giftCODE);

		if (is_array($check) && !empty($check)) {
			
			foreach ($check as $key => $val) {
				
				// tức là mã này đã hết lượt sử dụng. => không tồn tại nữa
				// nếu có thể fix mã hết hạn theo ngày.
				if ($val['gift_quantity'] < 1) {
					// Mã giảm giá đã hến hạn hoặc không tồn tại
					echo 'Coupon code is expired or not available';

				} else {

					// lấy % giảm giá.
					// using the gift code successfully. | sử dụng mã quà tặng thành công.
					$_SESSION['giftCODE'] = $val['gift_percent']; // đây là % giảm giá.
					$_SESSION['id_Gift']  = $val['id_gift']; // lấy ra được ID gift.
					echo 'using the gift code successfully';
				}
			}
			
		} else {
			// Gift code does not exist . | Mã quà tặng không tồn tại!.
			echo 'Gift code does not exist';
		}
	}

	/*------------------------------------------------
		remove giftCODE here. | loại bỏ mã quà tặng.
	-------------------------------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'removeGift') {
		
		unset($_SESSION['giftCODE']);
		echo 'remove gift code successfully';
	}
?>