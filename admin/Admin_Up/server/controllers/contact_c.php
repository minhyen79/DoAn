<?php 
	// import model.
	include_once '../models/contact_m.php';

	/**
	 * 
	 */
	class contact_c extends contact_m
	{
		
		private $contact;

		function __construct()
		{
			$this->contact = new contact_m();
		}


		/*---------------------------------------------
					Return Delete Rating
		-----------------------------------------------*/
		
		public function delContact($id_contact)
		{
			return $this->contact->delContact($id_contact);
		}

	}



 ?>