<?php

	// import config.
	include_once 'models/rating_m.php';


	class rating_c extends rating_m
	{

	   	private $rating;

	    function __construct()
	    {
	        $this->rating = new rating_m();
	    }

	 	public function showRating()
	 	{
	 		
	 		$rate = $this->rating->top5_rating();
				$myArr = array();
				if (is_array($rate) && !empty($rate)) {
					foreach ($rate as $key => $item) {
							$id = $item['id_product'];
							$myArr[] = $id;
					}
					$id1 = $myArr[0];
					$id2 = $myArr[1];
					$id3 = $myArr[2];
					$id4 = $myArr[3];
					$id5 = $myArr[4];

					$rs1 =  $this->rating->proDetail($id1);
					$rs2 =  $this->rating->proDetail($id2);
					$rs3 =  $this->rating->proDetail($id3);
					$rs4 =  $this->rating->proDetail($id4);
					$rs5 =  $this->rating->proDetail($id5);

					// Kết quả cuối cùng. | Vì hàm top5_rating() trả về các id của sp ratings
					// Nên ta phải phân tách các id đó ra và chuyển chúng vào getId_Product_Detail()
					// Và cuối cùng sử dụng array_merge() để gộp các mảng lại.
					$rating = array_merge($rs1, $rs2, $rs3, $rs4, $rs5);
				}

	 		include_once 'views/ratings/rating.php';
	 	}

	}

?>
