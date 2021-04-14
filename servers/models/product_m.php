<?php  
	
	// import config.
	include '../config/myConfig.php';

	
	class product_m extends Connect
	{
	    
	    function __construct()
	    {
	        parent::__construct();
	    }


	    // lấy ra thông tin sp để thêm vào giỏ.
	    public function getPro_ID($id)
	    {
	    	$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				WHERE id_product = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);
	    }


	    // lấy ra thông tin sp để thêm vào modals.
	    public function modalPro_ID($id)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				WHERE id_product = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// ảnh liên quan sản phẩm.
		public function product_Img_Related($id)
		{
			$sql = "
				SELECT
					id_detail_image,sub_image
				FROM
					tbl_detail_images
				WHERE
					tbl_detail_images.id_product = :id
				ORDER BY
					id_detail_image DESC LIMIT 3";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// kiểm tra số lượng tồn kho của sp.
		public function checkQuantity($id)
		{
			$sql = "SELECT
						tbl_products.id_product, tbl_products.product_name, tbl_products.quantity
					FROM
						tbl_products
					WHERE
						tbl_products.id_product = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Giảm số lượng khi mua sản phẩm nào đó.
		public function reductQuantity($id,$qty)
		{
			$sql = "UPDATE tbl_products SET quantity = quantity - :qty WHERE id_product = :id AND quantity > 0";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->bindParam(':qty', $qty, PDO::PARAM_INT);

			return $pre->execute();
		}

	}
?>