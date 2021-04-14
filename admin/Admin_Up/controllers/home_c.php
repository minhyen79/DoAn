<?php  

	// import model.
	include_once 'models/home_m.php';

	
	class home_c extends home_m
	{

	    private $home;

	    function __construct()
	    {
	        $this->home = new home_m();
	    }

	    
	    /*---------------getHome-----------------*/
	    public function getHome()
	    {
	    	// Sản phẩm
	    	$arr_pro 		= $this->home->countProduct();
	    	$countPro     	= $arr_pro['count'];
	    	// khách hang
	    	$arr_mem 		= $this->home->countMember();
	    	$countMem     	= $arr_mem['count'];
	    	// đơn hàng.
	    	$arr_order 		= $this->home->countOrder();
	    	$countOrder     = $arr_order['count'];

	    	// lấy id order trong 1 ngày.
	    	$arr_date       = $this->home->nowDate_Id();

	    	if (!empty($arr_date)) {
	    		foreach ($arr_date as $key => $date) {
	    			if ($date['Ngay'] == 0) {
	    				// đây là id của đơn hàng trong ngày hôm nay.
	    				$id_order_now = $date['id_order'];
	    				// echo "<pre>";
	    				// print_r($id_order_now);
	    				// echo "</pre>";
	    				if ($id_order_now != "" || $id_order_now != null) {
	    					$arr = $this->home->nowDate_TotalPrice($id_order_now);
	    					
	    					
	    					// echo "<pre>";
	    					// print_r($arr);
	    					// echo "</pre>";
	    				}
	    			}
	    		}
	    	}

	    	// $nowDate = $this->home->nowDate();
	    	// echo "<pre>";
	    	// print_r($nowDate);
	    	// echo "</pre>";

	    	$nowDate = $this->home->nowDate();
	    	// echo "<pre>";
	    	// print_r($nowDate);
	    	// echo "</pre>";
	    	$sum = 0;
	    	$i = 0;
	    	$last_key = count($nowDate);
	    	foreach ($nowDate as $key => $value) {
	    		$sum += $value['total'];
	    		if (++$i === $last_key) {
	    			 $sum;
	    		}
	    	}


	    	include 'views/home.php';
	    }
	}

?>