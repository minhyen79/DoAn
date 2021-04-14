<?php  
	
	session_start();

	// import controllers.
	include_once '../controllers/product_c.php';
	include_once '../controllers/member_c.php';
	include_once '../controllers/gift_c.php';
	include_once '../controllers/order_c.php';
	include_once '../controllers/detail_order_c.php';

	$product 	= new product_c();
	$member 	= new member_c();
	$gift  	 	= new gift_c();
	$order 		= new order_c();
	$detaiOrder = new detail_order_c();
 
	/*-------------------------------------------------------
		order-has-account here. | Trường hợp có tk mua hàng.
	----------------------------------------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'order-has-account') {
		
		$id 	 		= $_SESSION['id_member'];
		$note 	 		= $_POST['note'];
		$ship_method 	= $_POST['ship_method'];
		$payl_method 	= $_POST['payl_method'];

		//1, update address for member here. | cập nhật lại địa chỉ mới cho khách.
		// $updateAddress = $member->updateByAdress($address, $id);
		/*
			- 7 tiêu chí áp dụng với khách hàng sử dụng tài khoản mua hàng.
				1, add order here. 								| thêm mới đơn hàng.
				2, add detail order here. 						| thêm mới chi tiết đơn hàng.
				3, buy successfully get points here. 			| mua thành công nhận điểm tại đây.
				4, Successful purchase minus points here.		| Nếu khách hàng sử dụng điểm để đổi giảm giá. số điểm hiện có sẽ bị trừ.
				5, tra cứu điểm hiện có.
				6, Successful purchase minus giftQuantity here. | Nếu khách hàng sử dụng phiếu giảm giá, mỗi lần giao dịch phiếu giảm -1.
				7, Tổng kết 									| -> gửi mail.
		*/

		/*------------pinCode here------------*/
		$date 		= getdate();
		$pinCode 	= substr(md5($id.$date['seconds'].'ndh'.$id), 0,6);

		//1, add order here. | thêm mới đơn hàng.
		$addOrder 	= $order->addOrder($id,$note,$pinCode,$ship_method,$payl_method);
		$id_order 	= $_SESSION['lastID_Order'];

		//2, add detail order here. | thêm mới chi tiết đơn hàng.
		$total = 0;
		$sumTotal = 0;
		foreach ($_SESSION['cart1998'] as $key => $val) {
			
			$id_product = $val['id_product'];
			$quantity 	= $val['qty'];
			$price 		= $val['price'];
			$total 		= $val['qty'] * $val['price']; // Tổng tiền trên 1 / sản phẩm.
			$sumTotal  += $val['qty'] * $val['price']; // tổng tất cả số tiền thu được sau giao dịch.

			$add_Detail_Order = $detaiOrder->addDetail_Order($id_order,$id_product,$quantity,$price,$total);
			// update qty here. | mua xong phải trừ slg sản phẩm đó đi. 
			$updateQuantity = $product->reductQuantity($id_product,$quantity); 
		}

		// array detail order here. | Mảng chi tiết đơn hàng sau khi khách đặt.
		$array_sent_mail = $detaiOrder->invoiceDetail($id_order); // id order.
		if (is_array($array_sent_mail)) {

			$_SESSION['array_sent_mail'] = $array_sent_mail;
			$_SESSION['array_sent_mail_index'] = 1; // = 1 tức là sd tài khoản để gd.

			if ($sumTotal < 100000 ) {

				$point = 0; // hóa đơn < 100.000đ không được + điểm.

			}  else {

				$point = $sumTotal / 100000; // hóa đơn trên 100.000đ = tổng tiền / 100.000đ =  số điểm.
			}

									/*-----------usePoint-----------*/
			// 3, buy successfully get points here. | mua thành công nhận điểm tại đây.
			$updatePoint = $member->updateByPoint($point, $id);

			/*  ------------------------Nếu khách hàng sử dụng điểm để đổi giảm giá------------------------ */
			// 4, Successful purchase minus points here. | Nếu khách hàng sử dụng điểm để đổi giảm giá. số điểm hiện có sẽ bị trừ.
			if (isset($_SESSION['usePoint'])) {
				$pointPercent 			= $_SESSION['usePoint'];
				$updatePoint_Percent 	= $member->updateByPoint_Percent($pointPercent, $id);
			}

			// 5, tra cứu điểm hiện có.
			$seachPoint = $member->searchPoint($id);

			foreach ($seachPoint as $key => $val) {

				$_SESSION['pointAfter'] = $val['point'];

			}
									/*-----------./usePoint-----------*/

									/*----------- useGift -----------*/

			// 	6, Successful purchase minus giftQuantity here. | Nếu khách hàng sử dụng mã mỗi lần sẽ trừ đi 1.
			if (isset($_SESSION['id_Gift'])) {

				$id_Gift = $_SESSION['id_Gift'];
				$updateGift_Percent	    = $gift->updateByGift_Percent($id_Gift);	
			}			
			// 7, Tổng kết -> gửi mail.
			echo 'order has account successfully!';
		}
	}



	/*-----------------------------------------------------------------------------
		order-not-account here. | Trường hợp không sử dụng tài khoản mua hàng.
	------------------------------------------------------------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'order-not-account') {
		
		$name 			= $_POST['name'];
		$email 			= $_POST['email'];
		$phone 			= $_POST['phone'];
		$address 		= $_POST['address'];
		$note 			= $_POST['note'];
		$ship_method 	= $_POST['ship_method'];
		$payl_method 	= $_POST['payl_method'];
		$passw 			= $_POST['passw'];
		$passw 			= base64_encode($passw);

		/*------------------Kiểm tra xem email & sdt đã đăng ký chưa?-----------------------*/		
		$checkEmail  = $member->checkEmail_array($email);
		$checkPhone  = $member->checkPhone_array($phone);


		/*--------------Đã sử dụng(email) hoặc (phone)----------------*/
		/*--------------1, dùng cái gì thì mình lấy cái đó order------*/
		/*--------------2, không tạo tài khoản mới nữa----------------*/
		/*--------------3, thay đổi thông tin cho họ khi nhập liệu----*/
		/*--------------4, trường hợp xử lý
			a, nếu email tồn tại -> sẽ lấy (id) người sd email dó đặt hàng.
			b, nếu phone tồn tại -> sẽ lấy (id) người sd phone dó đặt hàng.
			c, nếu cả email và phone tồn tại => ưu tiên người sd email đó đặt hàng.
		----*/
		if (count($checkEmail) == 1 || count($checkPhone) == 1) {
			
			// a, nếu email tồn tại -> sẽ lấy (id) người sd email dó đặt hàng.
			if (count($checkEmail) == 1) {
				
				foreach ($checkEmail as $key => $val) {

					$id 		= $val['id_member'];
				}
			
			// b, nếu phone tồn tại -> sẽ lấy (id) người sd phone dó đặt hàng.
			} elseif (count($checkPhone) == 1) {
				
				foreach ($checkPhone as $key => $val) {
					
					$id  		= $val['id_member'];
				}

			} 
						/*-------------- tồn tại (email) || (phone)----------------*/

			/*------------pinCode here------------*/
			$date 		= getdate();
			$pinCode 	= substr(md5($id.$date['seconds'].'ndh'.$id), 0,6);
			
			// 1, add order here. | thêm mới đơn hàng.
			$addOrder 	= $order->addOrder($id,$note,$pinCode,$ship_method,$payl_method);
			$id_order 	= $_SESSION['lastID_Order']; // khi thêm đơn hàng thành công sẽ lấy đc id ng cuối cùng đặt đơn.

			// 2, add detail order here. | thêm mới chi tiết đơn hàng.
			$total 		= 0;
			$sumTotal 	= 0;
			foreach ($_SESSION['cart1998'] as $key => $val) {
			
				$id_product = $val['id_product'];
				$quantity 	= $val['qty'];
				$price 		= $val['price'];
				$total 		= $val['qty'] * $val['price']; // Tổng tiền trên 1 / sản phẩm.
				$sumTotal  += $val['qty'] * $val['price']; // tổng tất cả số tiền thu được sau giao dịch.

				$add_Detail_Order = $detaiOrder->addDetail_Order($id_order,$id_product,$quantity,$price,$total);
				// update qty here. | mua xong phải trừ slg sản phẩm đó đi. 
				$updateQuantity = $product->reductQuantity($id_product,$quantity); 
			}

			// 3, array detail order here. | Mảng chi tiết đơn hàng sau khi khách đặt. => chỗ này mình sẽ để gửi mailer.
			$array_sent_mail = $detaiOrder->invoiceDetail($id_order); // id order.

			if (is_array($array_sent_mail)) {

				$_SESSION['array_sent_mail'] = $array_sent_mail;
				$_SESSION['array_sent_mail_index'] = 2; // = 2 tức là không sử dụng tài khoản để gd. && cũng là trường hợp lấy thông tin cũ để giao dịch

										/*----------- useGift -----------*/

				// 4, Successful purchase minus giftQuantity here. | Nếu khách hàng sử dụng mã mỗi lần sẽ trừ đi 1.
				if (isset($_SESSION['id_Gift'])) {

					$id_Gift = $_SESSION['id_Gift'];
					$updateGift_Percent	    = $gift->updateByGift_Percent($id_Gift);	
				}			
				// 5, Tổng kết -> gửi mail.
				echo 'order not account successfully!';
			}

		} else {

			/*--------------Chưa từng tồn tại (email) & (phone)----------------*/
			/*
			- Trường hợp này : (khách hàng không dùng tài khoản mua && nhập số phone và email chưa từng tồn tại trc đó.)
				1, Tạo tài khoản mới (new Email, new Phone).
				2, Thêm mới order.
				3, thêm mới detail order.
			*/
			// 1, Create account member here. | Tạo tài khoản cho khách
			$addMember 		= $member->addMember($name,$email,$phone,$passw,$address);
			$id_Last_Member = $_SESSION['lastID_Member']; // id người vừa thêm.

			// 2, Add new Order here. | Thêm mới đơn hàng.
			// a, PinCODE.
			$date 			= getdate();
			$pinCode 		= substr(md5($id_Last_Member.$date['seconds'].'ndh'.$id_Last_Member), 0,6);

			//b, Create.
			$addOrder 		= $order->addOrder($id_Last_Member,$note,$pinCode,$ship_method,$payl_method);
			$id_Last_Order 	= $_SESSION['lastID_Order']; // khi thêm đơn hàng thành công sẽ lấy đc id ng cuối cùng đặt đơn.


			//3, add detail order here. | thêm mới chi tiết đơn hàng.
			$total 		= 0;
			$sumTotal 	= 0;
			foreach ($_SESSION['cart1998'] as $key => $val) {
			
				$id_product = $val['id_product'];
				$quantity 	= $val['qty'];
				$price 		= $val['price'];
				$total 		= $val['qty'] * $val['price']; // Tổng tiền trên 1 / sản phẩm.
				$sumTotal  += $val['qty'] * $val['price']; // tổng tất cả số tiền thu được sau giao dịch.

				$add_Detail_Order = $detaiOrder->addDetail_Order($id_Last_Order,$id_product,$quantity,$price,$total);

				// update qty here. | mua xong phải trừ slg sản phẩm đó đi. 
				$updateQuantity = $product->reductQuantity($id_product,$quantity); 
			}

			// 4, array detail order here. | Mảng chi tiết đơn hàng sau khi khách đặt. => chỗ này mình sẽ để gửi mailer.
			$array_sent_mail = $detaiOrder->invoiceDetail($id_Last_Order); // id order.

			if (is_array($array_sent_mail)) {

				$_SESSION['array_sent_mail'] = $array_sent_mail;
				$_SESSION['array_sent_mail_index'] = 3; // = 3 tức là không sử dụng tài khoản để gd. && cũng là trường hợp Tạo mới tất cả thông tin.

										/*----------- useGift -----------*/

				// 	Successful purchase minus giftQuantity here. | Nếu khách hàng sử dụng mã mỗi lần sẽ trừ đi 1.
				if (isset($_SESSION['id_Gift'])) {

					$id_Gift = $_SESSION['id_Gift'];
					$updateGift_Percent	    = $gift->updateByGift_Percent($id_Gift);	
				}			
				// Tổng kết -> gửi mail.
				echo 'order not account successfully!';
			}
		}	
	}
