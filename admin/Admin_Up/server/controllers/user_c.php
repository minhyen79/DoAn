<?php  

	// import model.
	include_once '../models/user_m.php';

	
	class user_c extends user_m
	{

	    private $user;

	    function __construct()
	    {
	        $this->user = new user_m();
	    }


	    /*-------------add User---------------*/
	    public function addUser($name, $role, $email, $phone, $password, $address) 
	    {
	    	return $this->user->addUser($name, $role, $email, $phone, $password, $address);
	    }

	    /*-------------select User---------------*/
	    public function getUser($id)
	    {
	    	return $this->user->getUser($id);
	    }

	    /*-------------update User---------------*/
	    public function updateUser($id, $name, $role, $email, $phone, $password, $status, $address)
	    {
	    	return $this->user->updateUser($id, $name, $role, $email, $phone, $password, $status, $address);
	    }

	    /*-------------delete User---------------*/
	    public function deleteUser($id)
	    {
	    	return $this->user->deleteUser($id);
	    }
	}
?>