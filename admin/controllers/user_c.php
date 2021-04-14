<?php  

	// import models.
	include_once '../../models/user_m.php';

	
	class user_c extends user_m
	{
	    
	    private $user;

	    function __construct()
	    {
	        $this->user = new  user_m();
	    }


	    /*-------------------------
	    	login account.
	    -------------------------*/
	    public function loginAccount($user, $passw)
	    {
	    	return $this->user->loginAccount($user, $passw);
	    }

	    public function checkEmail($email)
	    {
	    	return $this->user->checkEmail($email);
	    }

	    public function checkPhone($phone)
	    {
	    	return $this->user->checkPhone($phone);
	    }

	    public function Register($name, $email, $phone, $password)
	    {
	    	return $this->user->Register($name, $email, $phone, $password);
	    }
	}

?>