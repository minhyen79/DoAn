<?php  
	
	include_once 'models/cateProduct_m.php';
	
	class cateProduct_c extends cateProduct_m
	{
	    
	    private $cate;

	    function __construct()
	    {
	        $this->cate = new cateProduct_m();
	    }

	    // Hiển thị danh mục sản phảm & header trang chủ ra.
	    public function show()
	    {
	    	$arr_cate = $this->cate->getAllCate();
	    	include_once 'layouts/canvars.php';
	    	include_once 'layouts/header.php';
	    }
	}

?>