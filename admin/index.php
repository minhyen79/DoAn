<?php
	// session initialization | khởi tạo session.
	session_start();
	
	if (isset($_GET['mod'])) {
		$mod = $_GET['mod'];	
	} else {
		$mod = 'login';
	}

	// nếu phiên session['id_user'] đã tồn tại chuyển thẳng đến trang admin.
	if (isset($_SESSION['id_user']) ) {

		if (isset($_SESSION['role'])) {

			if ($_SESSION['role'] != 0) {
				header("Location: Admin_Up/index.php");
			}
		}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<!-- Head -->
	<?php include_once 'layouts/head.php'; ?>
	<!-- ./Head -->
<body>
	<!-- main -->
	<main>
		<!-- PHP -->
		<?php  
			if (file_exists('views/users/'.$mod.'.php')) {
				include_once 'views/users/'.$mod.'.php';
			}
		?>
		<!-- ./PHP -->
	</main>
	<!-- ./main -->

	<!-- Footer -->
	<?php include_once 'layouts/java.php'; ?>
	<!-- ./Footer -->
</body>
</html>