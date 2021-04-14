<?php  

	// import model.
	include_once '../models/member_m.php';

	
	class member_c extends member_m
	{
	    
	    private $member;

	    function __construct()
		{
			$this->member = new member_m();
		}

		/*------------------------------------
			Return check email in tbl_members here.
		-------------------------------------*/
		public function checkEmail($email)
		{
			return $this->member->checkEmail($email);
		}

		/*-------------------------------------------------
			Return check email in tbl_members here => array.
		--------------------------------------------------*/
		public function checkEmail_array($email)
		{
			return $this->member->checkEmail_array($email);
		}


		/*------------------------------------
			Return check emai in tbl_members here.
		-------------------------------------*/
		public function checkPhone($phone)
		{
			return $this->member->checkPhone($phone);
		}

		/*-------------------------------------------------
			Return check phone in tbl_members here => array.
		--------------------------------------------------*/
		public function checkPhone_array($phone)
		{
			return $this->member->checkPhone_array($phone);
		}

		/*------------------------------------
			Return account Register here.
		-------------------------------------*/
		public function Register($name, $email, $phone, $password)
		{
			return $this->member->Register($name, $email, $phone, $password);
		}

		/*------------------------------
			Return account Login here.
		-------------------------------*/

		public function login($email, $password)
		{
			return $this->member->login($email, $password);
		}


		/*-----------------------------------------------------
			Return update address here. | cập nhật địa chỉ.
		-------------------------------------------------------*/
		public function updateByAdress($address, $id)
		{
			return $this->member->updateByAdress($address, $id);
		}

		/*------------------------------------------------------
			Return update point here. | cập nhật điểm thân thiết.
		--------------------------------------------------------*/
		public function updateByPoint($point, $id)
		{
			return $this->member->updateByPoint($point, $id);
		}

		/*------------------------------------------------------------------------------------
			Return (use point) here. | (trường hợp khách sử dụng điểm để đổi giảm giá)
		-------------------------------------------------------------------------------------*/
		public function updateByPoint_Percent($point, $id)
		{
			return $this->member->updateByPoint_Percent($point, $id);
		}

		/*------------------------------------------------------------------------------------
			Return search point here. | Tra cứu điểm hiện có.
		-------------------------------------------------------------------------------------*/
		public function searchPoint($id)
		{
			return $this->member->searchPoint($id);
		}

		/*---------------------------------------------------------------------------------------------------------------------------
			Return update property avatar here. | Cập nhật thông tin lại cho khách(Đối với khách sd email hoặc phone dki trước đó)
		-----------------------------------------------------------------------------------------------------------------------------*/
		public function updateAvatar_s1($name, $address, $id)
		{
			return $this->member->updateAvatar_s1($name, $address, $id);
		}


		/*---------------------------------------------------------
			Return Add member here. | Thêm mới tài khoản cho khách.
		-----------------------------------------------------------*/
		public function addMember($name,$email,$phone,$password,$address)
		{
			return $this->member->addMember($name,$email,$phone,$password,$address);
		}

		// Return Tra cứu ID khách hàng bằng Email hoắc Phone.
		public function getID_Email_Phone($email,$phone)
		{
			return $this->member->getID_Email_Phone($email,$phone);
		}

		// Kiểm tra mật khẩu cũ có tồn tại không?.
		public function checkOldPass($passw)
		{
			return $this->member->checkOldPass($passw);
		}

		// đổi mật khẩu.
		public function changePassw($passw, $id)
		{
			return $this->member->changePassw($passw, $id);
		}

	}
?>