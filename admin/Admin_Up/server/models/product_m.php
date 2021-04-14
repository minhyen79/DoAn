<?php 
	// import config.
	include '../config/myConfig.php';

	/**
	 * 
	 */
	class product_m extends Connect
	{
		
		function __construct()
	    {
	        parent::__construct();
	    }


	    /*---------------------------------------
	    			Add Product
	    -----------------------------------------*/
	    public function addProduct($product_name,$id_category,$id_brand,$origin,$main_image,$second_image,$price,$quantity,
	    							$mass,$description,$classify,$sale,$price_sale)
	    {
	    	$sql = "INSERT INTO tbl_products( id_category, id_brand, product_name, origin, main_image, second_image, price, quantity, mass, description, classify, sale, price_sale) VALUES (:id_category, :id_brand, :product_name, :origin, :main_image, :second_image, :price, :quantity, :mass, :description, :classify, :sale, :price_sale)";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':id_category',$id_category);
	    	$pre->bindParam(':id_brand',$id_brand);
	    	$pre->bindParam(':product_name',$product_name);
	    	$pre->bindParam(':origin',$origin);
	    	$pre->bindParam(':main_image',$main_image);
	    	$pre->bindParam(':second_image',$second_image);
	    	$pre->bindParam(':price',$price);
	    	$pre->bindParam(':quantity',$quantity);
	    	$pre->bindParam(':mass',$mass);
	    	$pre->bindParam(':description',$description);
	    	$pre->bindParam(':classify',$classify);
	    	$pre->bindParam(':sale',$sale);
	    	$pre->bindParam(':price_sale',$price_sale);

	    	return $pre->execute();
	    }

	    /*------------------------------------------
	    				Get Product Id
	    --------------------------------------------*/

	    public function getProductId($id_product)
	    {
	    	$sql = "SELECT * FROM tbl_products WHERE id_product = :id_product";

	    	$pre = $this->pdo->prepare($sql);
	    	$pre->bindParam(':id_product', $id_product);

	    	$pre->execute();
	    	return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }


	    /*----------------------------------------
	    			Update Product
	    ------------------------------------------*/
	    public function updateProduct($id_product,$id_category,$id_brand,$product_name,$origin,$main_image,$second_image,$price,$quantity,$mass,$description,$classify,$sale,$price_sale)
	    {
	    	$sql = "UPDATE tbl_products SET id_category = :id_category, id_brand = :id_brand, product_name = :product_name, origin = :origin, main_image = :main_image, second_image = :second_image, price = :price, quantity = :quantity, mass = :mass, description = :description, classify = :classify, sale = :sale, price_sale = :price_sale WHERE id_product = :id_product"; 

	    	$pre = $this->pdo->prepare($sql);
	    	
	    	$pre->bindParam(':id_product', $id_product);
	    	$pre->bindParam(':id_category', $id_category);
	    	$pre->bindParam(':id_brand', $id_brand);
	    	$pre->bindParam(':product_name', $product_name);
	    	$pre->bindParam(':origin', $origin);
	    	$pre->bindParam(':main_image', $main_image);
	    	$pre->bindParam(':second_image', $second_image);
	    	$pre->bindParam(':price', $price);
	    	$pre->bindParam(':quantity', $quantity);
	    	$pre->bindParam(':mass', $mass);
	    	$pre->bindParam(':description', $description);
	    	$pre->bindParam(':classify', $classify);
	    	$pre->bindParam(':sale', $sale);
	    	$pre->bindParam(':price_sale', $price_sale);

	    	return $pre->execute();
	    }

	    public function updateProductNoImage($id_product, $id_category, $id_brand, $product_name, $origin, $price, $quantity, $mass, $description, $classify, $sale, $price_sale)
	    {
	    	$sql = "UPDATE tbl_products SET id_category = :id_category, id_brand = :id_brand, product_name = :product_name, origin = :origin, price = :price, quantity = :quantity, mass = :mass, description = :description, classify = :classify, sale = :sale, price_sale = :price_sale WHERE id_product = :id_product"; 

	    	$pre = $this->pdo->prepare($sql);
	    	
	    	$pre->bindParam(':id_product', $id_product);
	    	$pre->bindParam(':id_category', $id_category);
	    	$pre->bindParam(':id_brand', $id_brand);
	    	$pre->bindParam(':product_name', $product_name);
	    	$pre->bindParam(':origin', $origin);
	    	$pre->bindParam(':price', $price);
	    	$pre->bindParam(':quantity', $quantity);
	    	$pre->bindParam(':mass', $mass);
	    	$pre->bindParam(':description', $description);
	    	$pre->bindParam(':classify', $classify);
	    	$pre->bindParam(':sale', $sale);
	    	$pre->bindParam(':price_sale', $price_sale);

	    	return $pre->execute();
	    }


	    /*----------------------------------------
	    			Delete Product
	    ------------------------------------------*/

	    public function delProduct($id_product)
	    {
	    	$sql = 'DELETE FROM tbl_products WHERE id_product = :id_product';
	    	$pre = $this->pdo->prepare($sql);

	    	$pre->bindParam(':id_product' , $id_product);

	    	return $pre->execute();
	    }

	   

	    


	}



 ?>