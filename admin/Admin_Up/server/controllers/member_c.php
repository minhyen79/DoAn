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


	    /*-------------add User---------------*/
	    public function addMember($name, $email, $phone, $password, $address)
	    {
	    	return $this->member->addMember($name, $email, $phone, $password, $address);
	    }

	    /*-------------select User---------------*/
	    public function getMember($id)
	    {
	    	return $this->member->getMember($id);
	    }

	    /*-------------update Member---------------*/
	    public function updateMember($id, $name, $email, $phone, $point, $status, $address)
	    {
	    	return $this->member->updateMember($id, $name, $email, $phone, $point, $status, $address);
	    }

	    /*-------------delete Member---------------*/
	    public function deleteMember($id)
	    {
	    	return $this->member->deleteMember($id);
	    }
	}
?>