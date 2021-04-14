<?php 
	// import config
	include_once 'configs/myConfig.php';

	/**
	 * 
	 */
	class contact_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/*-------------------------------
					Get Contact 
		--------------------------------*/
		
		public function getContact()
		{
			$sql = "SELECT tbl_contacts.id_contact, tbl_contacts.name, tbl_contacts.phone, tbl_contacts.email, tbl_contacts.description
					 FROM tbl_contacts
					 ORDER BY tbl_contacts.id_contact DESC";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		

		

	}


 ?>