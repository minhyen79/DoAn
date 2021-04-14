<?php  
		
	/*--------------Unset combo accounts-----------------*/
	
	unset($_SESSION['id_member']);
	unset($_SESSION['member_name']);
	unset($_SESSION['member_email']);
	unset($_SESSION['member_phone']);
	unset($_SESSION['point']);
	unset($_SESSION['member_address']);
	unset($_SESSION['usePoint']);
	unset($_SESSION['pointAfter']);
	unset($_SESSION['id_Gift']);
	unset($_SESSION['giftCODE']);
	
	header("Location: dang-nhap");

?>	