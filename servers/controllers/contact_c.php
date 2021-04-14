<?php  

	
	// import model.
	include_once '../models/contact_m.php';

	
	class contact_c extends contact_m
	{
	    
	    private $contact;

	    function __construct()
		{
			$this->contact = new contact_m();
		}

		// Kiểm tra xem email & phone đã tồn tại chưa? nếu tồn tại thì Sửa, chưa thì Thêm.
		public function checkContact($email,$phone)
		{
			return $this->contact->checkContact($email,$phone);
		}

		// Thêm liên hệ.
		public function addContact($name,$email,$phone,$description)
		{
			return $this->contact->addContact($name,$email,$phone,$description);
		}

		// Cập nhật liên hệ (chỉ thay đổi lời nhắn)
		public function updateContact($id,$description)
		{
			return $this->contact->updateContact($id,$description);
		}

	}
?>