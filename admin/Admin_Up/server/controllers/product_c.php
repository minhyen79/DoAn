<?php 
	// import model.
	include_once '../models/product_m.php';


	/**
	 * 
	 */
	class product_c extends product_m
	{

		private $product;

		function __construct()
		{
			$this->product = new product_m();
		}

		/*------------------------------------
					Add Product
		--------------------------------------*/
		public function addProduct($product_name,$id_category,$id_brand,$origin,$main_image,$second_image,$price,$quantity,
	    							$mass,$description,$classify,$sale,$price_sale)
		{
			return $this->product->addProduct($product_name,$id_category,$id_brand,$origin,$main_image,$second_image,$price,
											$quantity,$mass,$description,$classify,$sale,$price_sale);
		}

		 /*------------------------------------------
	    			Return Get Product Id
	    --------------------------------------------*/

	    public function getProductId($id_product)
	    {
	    	return $this->product->getProductId($id_product);
	    }

	    /*------------------------------------------
	    			Return Update Product 
	    --------------------------------------------*/

	    public function updateProduct($id_product,$id_category,$id_brand,$product_name,$origin,$main_image,$second_image,$price,$quantity,$mass,$description,$classify,$sale,$price_sale)
	    {
	    	return $this->product->updateProduct($id_product,$id_category,$id_brand,$product_name,$origin,$main_image,$second_image,$price,$quantity,$mass,$description,$classify,$sale,$price_sale);
	    }

	    public function updateProductNoImage($id_product, $id_category, $id_brand, $product_name, $origin, $price, $quantity, $mass, $description, $classify, $sale, $price_sale)
	    {
	    	return $this->product->updateProductNoImage($id_product, $id_category, $id_brand, $product_name, $origin, $price, $quantity, $mass, $description, $classify, $sale, $price_sale);
	    }

	     /*------------------------------------------
	    			Return Delete Product 
	    --------------------------------------------*/

	    public function delProduct($id_product)
	    {
	    	return $this->product->delProduct($id_product);
	    }

	}

 ?>