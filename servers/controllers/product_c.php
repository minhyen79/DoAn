<?php  
	
	// import model.
	include '../models/product_m.php';

	
	class product_c extends product_m
	{
	    
	    private $product;

	    function __construct()
	    {
	        $this->product = new product_m();
	    }


	    //  lấy ra thông tin sp để thêm vào giỏ.
	    public function getPro_ID($id)
	    {
	    	return $this->product->getPro_ID($id);
	    }

	    // lấy ra thông tin sp để thêm vào modals.
	    public function modalPro_ID($id)
	    {
	    	return $this->product->modalPro_ID($id);
	    }

	    // ảnh liên quan sản phẩm.
	    public function product_Img_Related($id)
	    {
	    	return $this->product->product_Img_Related($id);
	    }

	    // kiểm tra số lượng tồn kho của sp.
		public function checkQuantity($id)
		{
			return $this->product->checkQuantity($id);
		}
	
		// Trả về. Giảm số lượng khi mua sản phẩm nào đó.
		public function reductQuantity($id,$qty)
		{
			return $this->product->reductQuantity($id,$qty);
		}
	}

?>