<?php 
	// import config
	include_once '../config/myConfig.php';


	/**
	 * 
	 */
	class contact_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/*-------------------------------------------------------
							Delete Contact
		---------------------------------------------------------*/

		public function delContact($id_contact)
		{
			$sql = "DELETE FROM tbl_contacts WHERE id_contact = :id_contact";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id_contact', $id_contact);

			return $pre->execute();
		}

	}


 ?>