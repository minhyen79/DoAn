<?php  

	// import model.
	include_once 'models/member_m.php';

	
	class member_c extends member_m
	{
	    
	    private $member;

	    function __construct()
		{
			$this->member = new member_m();
		}


		// trang đăng nhập.
		public function login()
		{
			include_once 'views/members/login.php';
		}

		// trang đăng ký.
		public function register()
		{
			include_once 'views/members/register.php';
		}

		// trang đăng xuất.
		public function logout()
		{
			include_once 'views/members/logout.php';
		}
	}
?>