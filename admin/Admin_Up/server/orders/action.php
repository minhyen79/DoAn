<?php 
	// import controllers.
	include '../controllers/order_c.php';
	$order = new order_c();

	/*------------------Detail Order------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Detail_Order') {
		$id = $_POST['id'];
		$result = $order->detailOrder($id);
		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		echo json_encode($result);
	}


	/*--------------------Change State----------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Change_State') {
		$id = $_POST['id'];
		$value = $_POST['value'];
		$result = $order->changeStateOrder_Done($id,$value);

		if ($result) {
		 	echo "1";
		 }
	}

	/*-----------------------Order Order------------------------*/
	if (isset($_POST['action']) && $_POST['action'] == 'Delete_Order') {
		$id = $_POST['id'];

		$result = $order->delOrder($id);

		if ($result) {
			echo "1";
		}else {
			echo "0";
		}
	}


 ?>

