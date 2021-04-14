<?php
	


	// import model.
	include_once 'models/product_m.php';

	class product_c extends product_m
	{

		private $product;

		function __construct()
		{
			$this->product = new product_m();
		}


		// sản phẩm mới hiển thị ở trang chủ.
		public function newProduct()
		{
								// Danh mục.
			$cate 			= $this->product->getCate();
			$cateFruit 		= $cate[0]['name_cate'];
			$IDFruit 		= $cate[0]['id_category'];
			$cateVegetable 	= $cate[1]['name_cate'];
			$IDVegetable 	= $cate[1]['id_category'];
			$cateSeed		= $cate[2]['name_cate'];
			$IDSeed			= $cate[2]['id_category'];

								// Sản phẩm.
			// trái cây.
			$fruit 			= $this->product->newPro_Fruit();
			// Rau.
			$vegetable  	= $this->product->newPro_Vegetable();		
			// hạt.
			$seed  			= $this->product->newPro_Seed();		

			include_once 'views/products/newProduct.php';
		}

		// Trang chi tiết sản phẩm.
		public function productDetail()
		{	

			if (isset($_GET['id'])) {
				$id 				= (int)$_GET['id'];
				// chi tiết sản phẩm.
				$result 			= $this->product->proDetail($id);
				// hình ảnh liên quan của sp đó.
				$imgRelated 		= $this->product->product_Img_Related($id);
				// lấy ra thông tin của 1 đối tượng. (thông tin muốn lấy ở đây là( tính phân loại sp.))
				$arr_classify   	= $this->product->getPro_ID($id);
				$classify			= $arr_classify['classify'];
				// => từ đó ta lấy được sản phẩm liên quan.
				$product_related 	= $this->product->getPro_Related($classify, $id);
				// tính lượt đánh giá / sản phẩm.
				$arr_rating 			= $this->product->getRating_ID($id);
				foreach ($arr_rating as $key => $item) {
					$rating = $item['topRating'];
				}
			}

			include_once 'views/products/product-detail.php';
		}

		// Hiển thị trang cửa hàng sp.
		public function productShop()
		{

			// danh mục sản phẩm.
			$arr_cate 	 = $this->product->getAllCate();
			// thương hiệu sản phẩm.
			$arr_brand   = $this->product->getBrand();

			if (isset($_GET['act'])) {
				$act = $_GET['act'];
			} else {
				$act = 'index';
			}

			// Phân trang.
			if (isset($_GET['pages'])) {
				$pages 	= (int)$_GET['pages'];
				$abc 	= (int)$_GET['pages'];
			} else {
				// Mặc định sẽ là trang 1.
				$pages 	= 1;
				// biến abc sẽ giúp ta biết hiện tại đang ở trang nào.
				$abc    = 1;
			}
			$row 		= 6; // số tin 1 trang
			$from 		= ($pages - 1) * $row; // lấy bản ghi từ vị trí nào | mặc định lấy từ vị trí 0.

			switch ($act) {
				// Tìm kiếm theo tên và danh mục tại trang chủ.(search form)
				case 'tim-kiem':
					if (isset($_POST['btn-seach-home'])) {
						$key_cate = $_POST['select-seach-home']; // tk theo danh mục.
						$key_inpx  = $_POST['inp-seach-home']; // từ khóa tk theo tên.
						$key_inp    = '%'.$key_inpx.'%';
						$index      = 5;
						// TH1: người dùng không chọn danh mục mà chỉ tìm kiếm nhập ô inp.
						if ($key_cate == 0) {
							$number 	= count($this->product->productShop_ByName($key_inp)); // tổng số bản ghi
							$pagination = ceil($number / $row); // số trang				
							$shop 		= $this->product->productShop_ByName_Pagi($key_inp,$from,$row);
							// Độ dài của mảng.
							$numb 		= count($shop);
							// lấy chỉ số để quyết định trang hiện tại là ở đâu.
						} else {
							// TH2: người dùng chọn cả 2 (danh mục & ô input).
							$number 	= count($this->product->productShop_Cate_AND_Name($key_cate,$key_inp)); // tổng số bản ghi
							$pagination = ceil($number / $row); // số trang				
							$shop 		= $this->product->productShop_Cate_AND_Name_Pagi($key_cate,$key_inp,$from,$row);
							// Độ dài của mảng.
							$numb 		= count($shop);
						}
					} else {
						$key_cate = $_GET['key_cate']; // tk theo danh mục.
						$key_inpx  = $_GET['key_inp']; // từ khóa tk theo tên.
						$key_inp    = '%'.$key_inpx.'%';
						$index      = 5;

						// TH1: người dùng không chọn danh mục mà chỉ tìm kiếm nhập ô inp.
						if ($key_cate == 0) {
							$number 	= count($this->product->productShop_ByName($key_inp)); // tổng số bản ghi
							$pagination = ceil($number / $row); // số trang				
							$shop 		= $this->product->productShop_ByName_Pagi($key_inp,$from,$row);
							// Độ dài của mảng.
							$numb 		= count($shop);
							// lấy chỉ số để quyết định trang hiện tại là ở đâu.
						} else {
							// TH2: người dùng chọn cả 2 (danh mục & ô input).
							$number 	= count($this->product->productShop_Cate_AND_Name($key_cate,$key_inp)); // tổng số bản ghi
							$pagination = ceil($number / $row); // số trang				
							$shop 		= $this->product->productShop_Cate_AND_Name_Pagi($key_cate,$key_inp,$from,$row);
							// Độ dài của mảng.
							$numb 		= count($shop);
						}
					}
					break;

				// Tìm kiếm sản phẩm theo danh mục.
				// case 'cate':
				case 'danh-muc':
					$id = (int)$_GET['id'];
					$number 	= count($this->product->shop_by_cate($id)); // tổng số bản ghi
					$pagination = ceil($number / $row); // số trang				
					$shop 		= $this->product->productShop_Cate_Pagi($id,$from,$row);
					// Độ dài của mảng.
					$numb 		= count($shop);
					// lấy chỉ số để quyết định trang hiện tại là ở đâu.
					$index      = 1;
					break;

				// Tìm kiếm sản phẩm theo đơn giá.
				case 'don-gia':
					if (isset($_POST['sm_price'])) {

						// Ta tiến hành lọc dữ liệu qua từng bước.
						$price 	= $_POST['name_price'];
						$priceP  = explode('-', $price);

						$price_From  = $priceP[0];
						$price_To  	 = $priceP[1];

						// tiền số.
						$price_From1 	= explode('đ', $price_From);
						$price_From2  	= $price_From1[0];
						$price_From3 	= explode('.', $price_From2);
						
						if (count($price_From3) == 1) {
							$priceFrom 	= 0;
						} else {
							$price_From4    = $price_From3[0].$price_From3[1];
							$priceFrom      = (int)$price_From4; // Dữ liệu cuối cùng.
						}


						// Hậu tố.
						$price_To1 	= explode('đ', $price_To);
						$price_To2  	= $price_To1[0];
						$price_To3 	= explode('.', $price_To2);
						
						if (count($price_To3) == 1) {
							$priceTo 	= 0;
						} else {
							$price_To4    = $price_To3[0].$price_To3[1];
							$priceTo      = (int)$price_To4;  // Dữ liệu cuối cùng.
						}

						$number 	= count($this->product->shop_by_price($priceFrom, $priceTo)); // tổng số bản ghi
						$pagination = ceil($number / $row); // số trang					
						$shop 		= $this->product->productShop_Price_Pagi($priceFrom, $priceTo, $from, $row);
						// Độ dài của mảng.
						$numb 		= count($shop);
						// lấy chỉ số để quyết định trang hiện tại là ở đâu.
						$index      = 2;
					
					// Đây là khi lọc kết quả bằng Pagination.
					} elseif (isset($_GET['a'])) { 

						$priceFrom  = $_GET['a'];
						$priceTo  	= $_GET['b'];

						$number 	= count($this->product->shop_by_price($priceFrom, $priceTo)); // tổng số bản ghi
						$pagination = ceil($number / $row); // số trang					
						$shop 		= $this->product->productShop_Price_Pagi($priceFrom, $priceTo, $from, $row);
						// Độ dài của mảng.
						$numb 		= count($shop);
						// lấy chỉ số để quyết định trang hiện tại là ở đâu.
						$index      = 2;
					}
					break;

				// Tìm kiếm sản phẩm theo thương hiệu
				case 'thuong-hieu':

					$id 		= (int)$_GET['id'];
					$number 	= count($this->product->shop_by_brands($id)); // tổng số bản ghi
					$pagination = ceil($number / $row); // số trang				
					$shop 		= $this->product->productShop_brand_Pagi($id,$from,$row);
					// Độ dài của mảng.
					$numb 		= count($shop);
					// lấy chỉ số để quyết định trang hiện tại là ở đâu.
					$index      = 3;
					break;

				// tìm kiếm sản phẩm dựa qua sắp xếp (Tăng,Giảm,A-Z...)
				case 'sap-xep':
					if (isset($_POST['sm_sort'])) {

						$keyw = $_POST['orderby'];
						
						switch ($keyw) {
							// Sắp xếp theo độ mới nhất.
							case 'moi-nhat':
								$number 	= count($this->product->productSortNew()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortNew_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;

							// Sắp xếp theo độ cũ nhất.
							case 'cu-nhat':
								$number 	= count($this->product->productSortOld()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortOld_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;
							// Sắp xếp theo tên từ A-Z
							case 'theo-a-z':
								$number 	= count($this->product->productSort_A_Z()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortAZ_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;

							// Sắp xếp theo tên từ Z-A
							case 'theo-z-a':
								$number 	= count($this->product->productSort_Z_A()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortZA_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;

							// Sắp xếp theo độ thấp -> cao.
							case 'thap-cao':
								$number 	= count($this->product->productSortPrice_Min_Max()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortMin_Max_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;

							// Sắp xếp theo độ cao -> thấp.
							case 'cao-thap':
								$number 	= count($this->product->productSortPrice_Max_Min()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortMax_Min_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;
							
							default:
								// code...
								break;
						}

					// Đây là khi lọc kết quả bằng Pagination.
					} elseif (isset($_GET['keyw'])) { 
						
						$keyw = $_GET['keyw'];

						switch ($keyw) {
							// Sắp xếp theo độ mới nhất.
							case 'moi-nhat':
								$number 	= count($this->product->productSortNew()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortNew_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;

							// Sắp xếp theo độ cũ nhất.
							case 'cu-nhat':
								$number 	= count($this->product->productSortOld()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortOld_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;
							
							// Sắp xếp theo tên từ A-Z
							case 'theo-a-z':
								$number 	= count($this->product->productSort_A_Z()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortAZ_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;

							// Sắp xếp theo tên từ Z-A
							case 'theo-z-a':
								$number 	= count($this->product->productSort_Z_A()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortZA_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;

							// Sắp xếp theo độ thấp -> cao.
							case 'thap-cao':
								$number 	= count($this->product->productSortPrice_Min_Max()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortMin_Max_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;

							// Sắp xếp theo độ cao -> thấp.
							case 'cao-thap':
								$number 	= count($this->product->productSortPrice_Max_Min()); // tổng số bản ghi
								$pagination = ceil($number / $row); // số trang				
								$shop 		= $this->product->productShop_SortMax_Min_Pagi($from,$row);
								// Độ dài của mảng.
								$numb 		= count($shop);
								// lấy chỉ số để quyết định trang hiện tại là ở đâu.
								$index      = 4;
								break;

							default:
								// code...
								break;
						}
					}
					break;

				
				default:
					// Mặc định là trang cửa hàng chính.
					$number 	= count($this->product->productShop()); // tổng số bản ghi
					$pagination = ceil($number / $row); // số trang					
					$shop 		= $this->product->productShop_Pagi($from,$row);
					// Độ dài của mảng.
					$numb 		= count($shop);
					// lấy chỉ số để quyết định trang hiện tại là ở đâu.
					$index      = 0;
					$id 		= 0;
					break;
			}

			include_once 'views/products/product-shop.php';
		}


		// Hiển thị trang sản phẩm yêu thích.
		public function productWishlist()
		{
			include_once 'views/products/wishlist.php';
		}


		// Hiển thị trang giỏ hàng.
		public function pageCart()
		{

			include_once 'views/products/cart.php';
		}

		// Hiển thị trang thanh toán.
		public function pagePayl()
		{

			include_once 'views/products/payl.php';
		}

		// Hiển thị trang gửi mail.
		public function pagesentMailler()
		{

			include_once 'views/products/sentMailler.php';
		}
	}
?>
