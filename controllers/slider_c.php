<?php  
	
	include_once 'models/slider_m.php';
	
	class slider_c extends slider_m
	{
	    
	    private $slider;

	    function __construct()
	    {
	        $this->slider = new slider_m();
	    }

	    // Hiển thị băng chuyển ra.
	    public function show()
	    {
	    	$arr_slider = $this->slider->getSlider();
	    	include_once 'layouts/slider.php';
	    }
	}

?>