<?php  
	session_start();


	// import controllers.
	include_once '../../controllers/user_c.php';
	$account = new user_c();


	if (isset($_POST['action']) && !empty($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'login':
				$user = $_POST['user'];
				$passw = $_POST['passw'];

				$login =  $account->loginAccount($user, $passw);
				foreach ($login as $key => $val) {
					$_SESSION['id_user'] = $val['id_user'];
					$_SESSION['name'] = $val['name'];
					// phân quyền.
					$_SESSION['role'] = $val['role'];
				}
				echo count($login);
				break;
				
			// Kiểm tra sự tồn tại của email. truowcs khi dang ky
			case 'check-email':
				$email = $_POST['email'];
				echo $result = $account->checkEmail($email);
				break;

			// Kiểm tra sự tồn tại của số điện thoại.
			case 'check-phone':
				$phone = $_POST['phone'];
				echo $result = $account->checkPhone($phone);
				break;

			// Đăng ký tài khoản.
			case 'by-register':
				$name 		= $_POST['name'];
				$email 		= $_POST['email'];
				$phone 		= $_POST['phone'];
				$passw 		= $_POST['passw'];
				$passw		= base64_encode($passw);

				$register 	= $account->Register($name, $email, $phone, $passw);

				if ($register) {
					echo 1;
				}
				break;
			
			default:
				# code...
				break;
		}
	}
	 

?>