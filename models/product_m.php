<?php

	// import connect database.
	include_once 'config/myConfig.php';

	class product_m extends Connect
	{

		function __construct()
		{
			parent::__construct();
		}

		// lấy 3 danh mục.
		public function getCate()
		{
			$sql = "SELECT id_category, name_cate FROM tbl_category_products LIMIT 3";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Lẩy tất cả danh mục.
		public function getAllCate()
		{
			$sql = "SELECT id_category, name_cate FROM tbl_category_products";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Tìm kiếm sản phẩm theo danh mục.
		public function shop_by_cate($id)
		{
			$sql = "
				SELECT
					tbl_products.id_product, tbl_products.product_name, tbl_products.origin, tbl_products.main_image, tbl_products.second_image, 		         tbl_products.price, tbl_products.quantity, tbl_products.mass, tbl_products.description, tbl_products.classify, tbl_products.sale,      	tbl_products.price_sale,
				    tbl_category_products.id_category, tbl_category_products.name_cate
				FROM
					tbl_products,tbl_category_products
				WHERE
					tbl_products.id_category = tbl_category_products.id_category
				AND
					tbl_products.id_category = :id
				ORDER BY id_product DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang của tìm kiếm theo danh mục.
		public function productShop_Cate_Pagi($id,$from,$row)
		{
			$sql ="
				SELECT
					tbl_products.id_product, tbl_products.product_name, tbl_products.origin, tbl_products.main_image, tbl_products.second_image, 		         tbl_products.price, tbl_products.quantity, tbl_products.mass, tbl_products.description, tbl_products.classify, tbl_products.sale,      	tbl_products.price_sale,
				    tbl_category_products.id_category, tbl_category_products.name_cate
				FROM
					tbl_products,tbl_category_products
				WHERE
					tbl_products.id_category = tbl_category_products.id_category
				AND
					tbl_products.id_category = :id
				ORDER BY id_product DESC LIMIT :from,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->bindParam(':from', $from, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}


		// Sản phẩm mới là trái cây.
		public function newPro_Fruit()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
				   	mass, description, classify, sale, price_sale
				FROM
					tbl_products
				WHERE
					status = 1
				AND
					id_category = 1
				ORDER BY id_product DESC LIMIT 10
				";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}


		// Sản phẩm mới là rau
		public function newPro_Vegetable()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
				   	mass, description, classify, sale, price_sale
				FROM
					tbl_products
				WHERE
					status = 1
				AND
					id_category = 2
				ORDER BY id_product DESC LIMIT 10
				";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}


		// Sản phẩm mới là Hạt
		public function newPro_Seed()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
				   	mass, description, classify, sale, price_sale
				FROM
					tbl_products
				WHERE
					status = 1
				AND
					id_category = 3
				ORDER BY id_product DESC LIMIT 10
				";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// chi tiết sản phẩm.
		public function proDetail($id)
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

	    // Sản phẩm liên quan.
	    public function getPro_Related($classify, $id)
		{
			$sql = 'SELECT * FROM tbl_products WHERE classify = :classify AND id_product != :id  ORDER BY id_product DESC LIMIT 10';

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->bindParam(':classify', $classify, PDO::PARAM_STR);

			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Hiển thị lượt đánh giá bằng id.
		public function getRating_ID($id)
	    {
	    	$sql = "SELECT id_product, AVG(rate) AS 'topRating' FROM tbl_ratings WHERE id_product = :id";

	    	$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);

	    	$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
	    }

	    // Tất cả sản phẩm có trong cửa hàng.
	    public function productShop()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY id_product DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}	

		// Tìm kiếm theo tên sản phẩm.
		public function productShop_ByName($name)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM 
					tbl_products
				WHERE
					product_name LIKE :name
				ORDER BY id_product DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':name', $name, PDO::PARAM_STR);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang Tìm kiếm theo tên sản phẩm.
		public function productShop_ByName_Pagi($name,$from,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM 
					tbl_products
				WHERE
					product_name LIKE :name
				ORDER BY id_product DESC LIMIT :from, :row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':name', $name, PDO::PARAM_STR);
			$pre->bindParam(':from', $from, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}


		// Tìm kiếm theo danh mục và tên sản phẩm.
		public function productShop_Cate_AND_Name($cate,$name)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM 
					tbl_products
				WHERE
					id_category = :cate 
				AND 
					product_name LIKE :name
				ORDER BY id_product DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':cate', $cate, PDO::PARAM_INT);
			$pre->bindParam(':name', $name, PDO::PARAM_STR);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phẩn trang Tìm kiếm theo danh mục và tên sản phẩm.
		public function productShop_Cate_AND_Name_Pagi($cate,$name,$from,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM 
					tbl_products
				WHERE
					id_category = :cate 
				AND 
					product_name LIKE :name
				ORDER BY id_product DESC LIMIT :from, :row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':cate', $cate, PDO::PARAM_INT);
			$pre->bindParam(':name', $name, PDO::PARAM_STR);
			$pre->bindParam(':from', $from, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang Tất cả sản phẩm có trong cửa hàng.
		public function productShop_Pagi($from,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY id_product DESC LIMIT :from, :row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':from', $from, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Tìm kiếm sản phẩm dựa vào đơn giá.
		public function shop_by_price($fromt, $to)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				WHERE price BETWEEN :fromt AND :to
				ORDER BY id_product DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':to', $to, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang sản phẩm dựa vào đơn giá.
		public function productShop_Price_Pagi($fromt, $to, $from, $row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				WHERE price BETWEEN :fromt AND :to
				ORDER BY id_product DESC LIMIT :from,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':to', $to, PDO::PARAM_INT);
			$pre->bindParam(':from', $from, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Hiển thị tất cả thương hiệu sản phẩm ra.
	    function getBrand()
		{
			$sql = "SELECT id_brand, brand_name FROM tbl_brands";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Tìm kiểm sản phẩm theo thương hiệu.
		public function shop_by_brands($id)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				WHERE id_brand = :id
				ORDER BY id_product DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// phân trang Tìm kiểm sản phẩm theo thương hiệu.
		public function productShop_brand_Pagi($id,$fromt,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				WHERE id_brand = :id
				ORDER BY id_product DESC LIMIT :fromt,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// sắp xếp theo độ mới nhất.
		public function productSortNew()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY id_product DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang sắp xếp theo độ mới nhất.
		public function productShop_SortNew_Pagi($fromt,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY id_product DESC LIMIT :fromt,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// sắp xếp theo độ cũ nhất.
		public function productSortOld()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY id_product ASC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân Trang sắp xếp theo độ cũ nhất.
		public function productShop_SortOld_Pagi($fromt,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY id_product ASC LIMIT :fromt,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Sắp xếp theo tên A-Z
		public function productSort_A_Z()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY product_name ASC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân Trang Sắp xếp theo tên A-Z.
		public function productShop_SortAZ_Pagi($fromt,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY product_name ASC LIMIT :fromt,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Sắp xếp theo tên Z-A
		public function productSort_Z_A()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY product_name DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
		
		// Phân Trang Sắp xếp theo tên Z-A.
		public function productShop_SortZA_Pagi($fromt,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY product_name DESC LIMIT :fromt,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Sắp xếp theo độ thấp -> cao.
		public function productSortPrice_Min_Max()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY price ASC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang Sắp xếp theo độ thấp -> cao.
		public function productShop_SortMin_Max_Pagi($fromt,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY price ASC LIMIT :fromt,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Sắp xếp theo độ cao -> thấp.
		public function productSortPrice_Max_Min()
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY price DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang Sắp xếp theo độ cao -> thấp.
		public function productShop_SortMax_Min_Pagi($fromt,$row)
		{
			$sql = "
				SELECT
					id_product, product_name, origin, main_image, second_image, price, quantity,
					mass, description, classify, sale, price_sale
				FROM tbl_products
				ORDER BY price DESC LIMIT :fromt,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

	}

?>
