<?php  
	
	session_start();

	// import controllers.
	include_once '../controllers/member_c.php';
	$member = new member_c();


	if (isset($_POST['action']) && !empty($_POST['action'])) {
		
		$action = $_POST['action'];

		switch ($action) {

			// Kiểm tra sự tồn tại của email.
			case 'check-email':
				$email = $_POST['email'];
				echo $result = $member->checkEmail($email);
				break;

			// Kiểm tra sự tồn tại của số điện thoại.
			case 'check-phone':
				$phone = $_POST['phone'];
				echo $result = $member->checkPhone($phone);
				break;

			// Đăng ký tài khoản.
			case 'by-register':
				$name 		= $_POST['name'];
				$email 		= $_POST['email'];
				$phone 		= $_POST['phone'];
				$passw 		= $_POST['passw'];
				$passw		= base64_encode($passw);

				$register 	= $member->Register($name, $email, $phone, $passw);
				
				if ($register) {
					echo 1;
				} 
				break;
			// Đăng nhập tài khoản.
			case 'by-login':
				$email = $_POST['email'];
				$passw = $_POST['passw'];
				$passw = base64_encode($passw);

				$login = $member->login($email, $passw);

				$countL = count($login);

				if ($countL == 1) {
					echo 1;
				}
				
				foreach ($login as $key => $value) {
					
					$_SESSION['id_member'] 					= $value['id_member'];
					$_SESSION['member_name'] 	   		 	= $value['name'];
					$_SESSION['member_email'] 	   			= $value['email'];
					$_SESSION['member_phone'] 	   			= $value['phone'];
					if (empty($value['address'])) {
						$_SESSION['member_address'] 	= 'Bạn chưa đăng ký địa chỉ nhận hàng';
					} else{
						$_SESSION['member_address']     = $value['address'];
					}
					$_SESSION['point']	   = $value['point'];
				}
				break;

			// Loại bỏ việc sử dụng điểm tích lũy.
			case 'unsetPoint':
				if (isset($_POST['action']) && $_POST['action'] == 'unsetPoint') {
					unset($_SESSION['usePoint']);
					echo 'remove use point successfully';
				}
				break;

			// Kiểm tra điểm tích lũy.
			case 'checkpoint':
				if (isset($_POST['action']) && $_POST['action'] == 'checkpoint') {
					$point = $_POST['point'];
					$_SESSION['usePoint'] = 0; // default 0.
				
					if (isset($_SESSION['point'])) {
						if ($_SESSION['point'] >= $point) {
							// áp dụng điểm thành công!
							$_SESSION['usePoint'] = $point;
							echo 'successfully use point';
						} else {
							// Xin lỗi bạn không đủ điểm!
							echo 'Sorry you do not have enough points';
						}
					} else {
						echo 'Xin lỗi bạn chưa có điểm nào?';
					}
				}
				break;

			case 'by-change':

				$id      = $_POST['id'];
				$oldPass = $_POST['oldPass'];
				$Passw   = $_POST['Passw'];

				// mã hóa.
				$oldPass 	= base64_encode($oldPass);
				$Passw 		= base64_encode($Passw);

				// kiểm tra mật khẩu cũ có đúng không.
				$check_old_pass 	 = $member->checkOldPass($oldPass);
				$numb           = count($check_old_pass);

				if ($numb == 1) {
					// tiếp tục đổi mật khẩu.
					$changePass      = $member->changePassw($Passw, $id);
					if ($changePass) {
						echo 1;
					} else {
						echo 2;
					}

				} else {
					// Dừng lại và đưa ra thông báo.
					echo 0;
				}
				
				break;
			default:
				// code...
				break;
		}
	}


?>